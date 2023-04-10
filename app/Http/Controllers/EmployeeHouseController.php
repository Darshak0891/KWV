<?php

namespace App\Http\Controllers;
use App\Models\EmployeeHouse;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Society;
use App\Models\House;

class EmployeeHouseController extends Controller
{
    public function index()
    {
        /* $employee_house = EmployeeHouse::join('users','users_id','=','employee_house.user_id')
            ->select('users.name')->get();*/
       // $employee_name = User::where('is_admin',0)->get();
        // dd($employee_name);
       // $employee_society = Society::get();
        return view('employee_houses.index');
    }

    public function fetchHouse(Request $request)
    {
        $employee_house['houses'] = House::where("society_id",$request->society_id)->get();
        return response()->json($employee_house);
    }

    public function create()
    {
        $employee_name = User::where('is_admin',0)->get();
        $employee_society = Society::get();
        return view('employee_houses.create',compact('employee_name', 'employee_society'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'society_id' => 'required',
            'house_id' => 'required',
        ]);

        //dd($request);
        EmployeeHouse::create(['user_id' => $request->user_id, 'society_id' => $request->society_id,
                            'house_id' => $request->house_id]);
        
        return redirect()->route('employee_houses.index')->with('success','Data Has Been Added.'); 
    }
}
