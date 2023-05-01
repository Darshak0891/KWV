<?php

namespace App\Http\Controllers;

use App\Models\EmployeeHouse;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Society;
use App\Models\House;
use App\Models\HouseRent;
use \Carbon\Carbon;
use App\Models\Admin_log;
use Exception;

class EmployeeHouseController extends Controller
{
    public function index()
    {
        try {
            $emp_name = EmployeeHouse::join('users', 'users.id', '=', 'employee_houses.user_id')
                ->select('users.id', 'users.name')->groupBy('users.name')->get();
            return view('employee_houses.index', compact('emp_name'));
        } catch (Exception $e) {
            return redirect()->back();
        }
    }

    public function fetchSociety(Request $request)
    {
        try {
            // return($request);
            $data = EmployeeHouse::pluck('society_id');
            //return $data;
            $emp_soc['societies'] = Society::whereNotIn('id', $data)->get();
            return response()->json($emp_soc);
        } catch (Exception $e) {
            return redirect()->back();
        }
    }

    public function create()
    {
        try {

            $employee_name = User::where('is_admin', 0)->get();
            /* $employee_society = Society::join('employee_houses', 'employee_houses.society_id', '!=', 'societies.id')
        ->get(); */
            // dd($employee_society);
            return view('employee_houses.create', compact('employee_name'));
        } catch (Exception $e) {
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        try {
            $user = auth()->user();

            $storeData = $request->validate([
                'user_id' => 'required',
                'society_id' => 'required',
            ]);

            // EmployeeHouse::create(['user_id' => $request->user_id, 'society_id' => $request->society_id ]);
            $emphouse = EmployeeHouse::create($storeData);
            Admin_log::create([
                'user_id' => $user->id, 'type_id' => 4, 'action_type_id' => 1,
                'request_id' => $emphouse->id, 'message' => 'User Created.'
            ]);

            return redirect()->route('employee_houses.index')->with('success', 'Data Has Been Added.');
        } catch (Exception $e) {
            return redirect()->back();
        }
    }

    public function show($id)
    {
        try {
            $show = EmployeeHouse::join('societies', 'societies.id', '=', 'employee_houses.society_id')
                ->select('employee_houses.id', 'societies.id as societyId', 'societies.society_name')->where('employee_houses.user_id', $id)->get();


            return view('employee_houses.show', compact('show'));
        } catch (Exception $e) {
            return redirect()->back();
        }
    }

    public function showHouse(Request $request, $house)
    {
        try {
            /* if (isset($request->system)) {
                dd($request);
            } */
            $from = Carbon::now()->startOfMonth();
            $to = Carbon::now()->endOfMonth()->addDay(9);
            $show_house = House::join('house_rents', 'house_rents.house_id', '=', 'houses.id')
                ->select(
                    'houses.id',
                    'houses.house_no',
                    'houses.name',
                    'houses.mobile_no',
                    'houses.box_no',
                    'house_rents.date',
                    'house_rents.rent',
                    'house_rents.baki',
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

                    if (isset($request->system)) {
                        if ($request->system == 'dc') {
                            $query->where('dc', 1);
                        } elseif ($request->system == 'nod') {
                            $query->where('nod', 1);
                        }
                    }
                })
                ->whereBetween('house_rents.date', [$from, $to])
                ->where('society_id', $house)->get();
            //dd($show_house);
            return view('employee_houses.show_house', compact('show_house', 'house'));
        } catch (Exception $e) {
            return redirect()->back();
        }
    }
    public function actionpost(Request $request)
    {
        try {
            $data = HouseRent::where('id', $request['actionid'])->first();
            HouseRent::where('id', $request['actionid'])->update(['jama' => $request['jama'], 'baki' => $data->baki - $request['jama'], 'remark' => $request['remark']]);
            return redirect()->route('allocatesocieties.show')->with('success', 'Successfully Taken.');
        } catch (Exception $e) {
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        try {
            $user = auth()->user();

            $employee_houses = EmployeeHouse::where('id', $id);
            $employee_houses->delete();
            Admin_log::create([
                'user_id' => $user->id, 'type_id' => 4, 'action_type_id' => 3,
                'request_id' => $id, 'message' => 'Society Deleted.'
            ]);

            return redirect()->route('employee_houses.index')->with('success', 'Society has been deleted');
        } catch (Exception $e) {
            return redirect()->back();
        }
    }
}
