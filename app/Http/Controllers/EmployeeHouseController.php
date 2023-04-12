<?php

namespace App\Http\Controllers;
use App\Models\EmployeeHouse;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Society;
use App\Models\House;

class EmployeeHouseController extends Controller
{
    /* public function index()
    {
        
        $emp = EmployeeHouse::join('users', 'users.id', '=', 'employee_houses.user_id')
        ->select('users.id', 'users.name')->groupBy('users.name')->get();
               
        return view('employee_houses.index', compact('emp'));
    } */
    public function index()
    {
        $emp_name = EmployeeHouse::join('users', 'users.id', '=', 'employee_houses.user_id')
        ->select('users.id', 'users.name')->groupBy('users.name')->get();
        return view('employee_houses.index', compact('emp_name'));
    }

    public function fetchSociety(Request $request)
    {
       // return($request);
        $data = EmployeeHouse::where('user_id', $request->user_id)->pluck('society_id');
        //return $data;
        $emp_soc['societies'] = Society::whereNotIn('id', $data)->get();
        return response()->json($emp_soc);
    }

    public function create()
    {
        
        $employee_name = User::where('is_admin', 0)->get();
        /* $employee_society = Society::join('employee_houses', 'employee_houses.society_id', '!=', 'societies.id')
        ->get(); */
       // dd($employee_society);
        return view('employee_houses.create',compact('employee_name'));
    } 

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'society_id' => 'required',
        ]);

        //dd($request);
        EmployeeHouse::create(['user_id' => $request->user_id, 'society_id' => $request->society_id ]);
        
        return redirect()->route('employee_houses.index')->with('success','Data Has Been Added.'); 
    }

    public function show($id)
    {
        $show = EmployeeHouse::join('societies', 'societies.id', '=', 'employee_houses.society_id')
        ->select('employee_houses.id', 'societies.society_name')->where('employee_houses.user_id', $id)->get();
        

        return view('employee_houses.show',compact('show'));
    }

    /* public function showHouse($house)
    {
        //dd($id);
         $show = EmployeeHouse::join('houses', 'houses.id', '=', 'employee_houses.house_id')
        ->select('employee_houses.id', 'houses.house_no')->where('employee_houses.society_id', $house)->get(); 
       
        return view('employee_houses.show_house', compact('show'));

    } */
}
