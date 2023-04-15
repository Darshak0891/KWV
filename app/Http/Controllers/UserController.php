<?php

namespace App\Http\Controllers;

use App\Models\EmployeeHouse;
use App\Models\Society;
use App\Models\House;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $society_id = EmployeeHouse::where('user_id', $user->id)->pluck('society_id');

        $society = Society::whereIn('id', $society_id)->get();

        //dd($society);
        return view('allocatesocieties.index', compact('society'));
    }

    public function show($id)
    {
        $show_house = House::where('society_id', $id)->get();
        //dd($show_house);
        return view('allocatesocieties.show', compact('show_house'));
    }

    public function profile()
    {
        return view('profiles.index');
    }



    public function profileUpdate(Request $request)
    {
        $user = auth()->user();
        $updateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            // 'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|numeric'
        ]);

        User::where('id', auth()->user()->id)->update($updateData);
        if ($user->is_admin == 1) {
            return redirect()->route('admin.dashboard')->with('success', 'Profile Detail updated successfully');
        } else {
            return redirect()->route('user.dashboard')->with('success', 'Profile Detail updated successfully');
        }
    }

    public function changePassword()
    {
        return view('profiles.change-password');
    }

    public function updatePassword(Request $request)
    {
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
    }
}
