<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin_log;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public $search = '';

    public function index(Request $request)
    {

        //$employee = User::all();
        $employee = User::where(function ($query) use ($request) {
            if ($request->search) {
                $query->where('name', 'LIKE', '%' . $request->search . '%');
            }
        })->where(['is_admin' => 0])->paginate(5);

        /* $employee = User::where('name', 'LIKE', '%'.$request->search.'%')->orderBy('id', 'ASC')->where(['is_admin' => 0])->paginate(3);
        return view('employees.index',compact('employee')); */

        /* $employee = User::latest();
        if (request()->has('search')) {
            $employee->where('name', 'Like', '%' . request()->input('search') . '%');
        }
        $employee = $employee->paginate(5); */
        return view('employees.index', compact('employee'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
        $user = auth()->user();
        //dd($user);

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:users',
            'password' => 'required|string|min:8',
            'phone' => 'required|numeric|unique:users',

        ]);
        $request['password'] = Hash::make($request['password']);
        $employee = User::create($request->all());
        Admin_log::create([
            'user_id' => $user->id, 'type_id' => 1, 'action_type_id' => 1,
            'request_id' => $employee->id, 'message' => 'User Created.'
        ]);
        return redirect()->route('employees.index')->with('success', 'Employee has been saved!');
    }

    public function show(User $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit($id)
    {
        $employee = User::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $user = auth()->user();
        //dd($user);
        $updateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            // 'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|numeric'
        ]);

        $old_data = User::where('id', $id)->first();
        User::where('id', $id)->update($updateData);
        Admin_log::create([
            'user_id' => $user->id, 'type_id' => 1, 'action_type_id' => 2,
            'request_id' => $id, 'message' => 'User Updated.', 'edit_old_data' => json_encode($old_data),
            'edit_new_data' => json_encode($updateData)
        ]);
        return redirect()->route('employees.index')->with('success', 'Employee has been updated');
    }

    public function delete($id)
    {
        $user = auth()->user();

        $employee = User::where('id', $id);
        $employee->delete();
        Admin_log::create([
            'user_id' => $user->id, 'type_id' => 1, 'action_type_id' => 3,
            'request_id' => $id, 'message' => 'User Deleted.'
        ]);
        return redirect()->route('employees.index')->with('success', 'Employee has been deleted');
    }

    public function adminlog(Request $request)
    {
        //$admin_log = Admin_log::all();
        $admin_log = Admin_log::join('users', 'users.id', '=', 'admin_logs.user_id')
            ->select(
                'admin_logs.id',
                'admin_logs.type_id',
                'admin_logs.action_type_id',
                'admin_logs.request_id',
                'admin_logs.message',
                'admin_logs.edit_old_data',
                'admin_logs.edit_new_data',
                'users.name'
            )->orderBy('id', 'DESC')->where(function ($query) use ($request) {
                if ($request->search) {
                    $query->where('name', 'LIKE', '%' . $request->search . '%');
                }
            })->paginate(5);
        //  dd($admin_log);
        return view('adminlogs.index', compact('admin_log'));
    }

    public function showadminlog($id)
    {
        $show = Admin_log::where('id', $id)->first();
        // return(json_decode($show->edit_old_data)->name);
        $old_data = json_decode($show->edit_old_data);
        $new_data = json_decode($show->edit_new_data);
        return view('adminlogs.show', compact('show', 'old_data', 'new_data'));
    }

    public function status(Request $request)
    {
        $employee = User::find($request->employee_id);
        $employee->status = $request->status;
        $employee->save();
        //$status = User::where('id', $id)->update(['is_active' => 1]);
    }
}
