<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class EmployeeController extends Controller
{
    public function index()
    {
        //$employee = User::all();
        $employee = User::where(['is_admin' => 0])->get();
        return view('employees.index',compact('employee'));
    }

    public function employee_fetch()
    {
        $employee = User::all();
        // dd($employee);
        return $employee;
        //return view('employees.index',compact('employee'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|max:255',
            'email' =>'required|max:255|unique:users',
            'password' => 'required|string|min:8',
            'phone' =>'required|numeric|unique:users',

        ]);
        $request['password'] = Hash::make($request['password']);
        $employee = User::create($request->all()); 
        return redirect()->route('employees.index')->with('completed','Employee has been saved!');
    }

    public function show(User $employee)
    {
        return view('employees.show',compact('employee'));
    }

    public function edit($id)
    {
        $employee = User::findOrFail($id);
        return view('employees.edit',compact('employee'));
    }

    public function update(Request $request,$id)
    {
        $updateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|numeric|unique:users'
        ]);

        Employee::whereId($id)->update($updateData);
        return redirect()->route('employees.index')->with('completed', 'Employee has been updated');
    }

    public function delete($id)
    {
        $employee = User::findOrFail($id);
        $employee->delete();
        return redirect()->route('employees.index')->with('completed', 'Employee has been deleted');
    }

    public function status(Request $request)
    {
        $employee = User::find($request->employee_id);
        $employee->status = $request->status;
        $employee->save();
        //$status = User::where('id', $id)->update(['is_active' => 1]);
    }
}
