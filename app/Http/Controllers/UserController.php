<?php

namespace App\Http\Controllers;

use App\Models\EmployeeHouse;
use App\Models\Society;
use App\Models\House;
use App\Models\User;
use App\Models\HouseRent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use \Carbon\Carbon;
use \Exception;

class UserController extends Controller
{
    public function index()
    {
        try {
            $user = auth()->user();
            $society_id = EmployeeHouse::where('user_id', $user->id)->pluck('society_id');

            $society = Society::whereIn('id', $society_id)->get();

            return view('allocatesocieties.index', compact('society'));
        } catch (Exception $e) {
            return redirect()->back();
        }
    }

    public function show(Request $request, $id)
    {
        try {
            $from = Carbon::now()->startOfMonth();
            $to = Carbon::now()->endOfMonth()->addDay(9);
            $show_house = House::join('house_rents', 'house_rents.house_id', '=', 'houses.id')
                ->select(
                    'houses.id',
                    'houses.house_no',
                    'houses.name',
                    'houses.mobile_no',
                    'houses.box_no',
                    'house_rents.baki',
                    'house_rents.rent',
                    'house_rents.jama',
                    'house_rents.date',
                    'house_rents.remark',
                    'house_rents.dc',
                    'house_rents.nod',
                    'house_rents.id as hId',
                )->where(function ($query) use ($request) {
                    if ($request->search) {
                        $query->where('house_no', 'LIKE', '%' . $request->search . '%')
                            ->orWhere('name', 'LIKE', '%' . $request->search . '%');
                    }
                })
                ->whereBetween('house_rents.date', [$from, $to])
                ->where('society_id', $id)->where('dc', 0)->where('nod', 0)->get();

            return view('allocatesocieties.show', compact('show_house', 'id'));
        } catch (Exception $e) {
            return redirect()->back();
        }
    }



    public function action($id)
    {
        try {
            $action = HouseRent::where('id', $id)->first();
            return view('allocatesocieties.action', compact('action'));
        } catch (Exception $e) {
            return redirect()->back();
        }
    }

    public function actionpost(Request $request)
    {
        try {
            $data = HouseRent::where('id', $request['actionid'])->first();
            HouseRent::where('id', $request['actionid'])->update(['jama' => $request['jama'], 'baki' => $data->baki - $request['jama'], 'remark' => $request['remark'], 'dc' => $request['dc']]);
            return redirect()->route('allocatesocieties.show')->with('success', 'Successfully Taken.');
        } catch (Exception $e) {
            return redirect()->back();
        }
    }

    public function profile()
    {
        try {
            return view('profiles.index');
        } catch (Exception $e) {
            return redirect()->back();
        }
    }



    public function profileUpdate(Request $request)
    {
        try {
            $user = auth()->user();
            $updateData = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|max:255',
                'phone' => 'required|numeric'
            ]);

            User::where('id', auth()->user()->id)->update($updateData);
            if ($user->is_admin == 1) {
                return redirect()->route('admin.dashboard')->with('success', 'Profile Detail updated successfully');
            } else {
                return redirect()->route('user.dashboard')->with('success', 'Profile Detail updated successfully');
            }
        } catch (Exception $e) {
            return redirect()->back();
        }
    }

    public function changePassword()
    {
        try {
            return view('profiles.change-password');
        } catch (Exception $e) {
            return redirect()->back();
        }
    }

    public function updatePassword(Request $request)
    {
        try {
            # Validation
            $request->validate([
                'old_password' => 'required',
                'new_password' => 'required|confirmed',
            ]);


            #Match The Old Password
            if (!Hash::check($request->old_password, auth()->user()->password)) {
                return back()->with("error", "Old Password Doesn't match!");
            }


            #Update the new Password
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);

            return back()->with("status", "Password changed successfully!");
        } catch (Exception $e) {
            return redirect()->back();
        }
    }
}
