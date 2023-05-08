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
            $data = EmployeeHouse::pluck('society_id');
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

    public function showHouse(Request $request, $id)
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
                ->where('society_id', $id)->get();
            //dd($show_house);
            return view('employee_houses.show_house', compact('show_house', 'id'));
        } catch (Exception $e) {
            return redirect()->back();
        }
    }
    public function actionpost(Request $request, $id)
    {
        try {
            //dd($request);
            $user = auth()->user();

            $old_data = House::where('id', $id)->first();
            $from = Carbon::now()->startOfMonth();
            $to = Carbon::now()->endOfMonth()->addDay(9);
            $houseRentData = HouseRent::where('id', $id)->whereBetween('date', [$from, $to])->select('house_rents.rent', 'house_rents.dc', 'house_rents.nod')->first();
            $old_data['rent'] = $houseRentData->rent;
            $old_data['dc'] = $houseRentData->dc;
            $old_data['nod'] = $houseRentData->nod;

            House::where('id', $id)->update(['house_no' => $request['house_no'], 'name' => $request['name'], 'mobile_no' => $request['mobile_no'], 'box_no' => $request['box_no']]);

            $data = HouseRent::where('id', $request['actionid'])->first();
            //dd($data);
            HouseRent::where('id', $request['actionid'])->update(['jama' => $request['jama'], 'baki' => $request['baki'] + $request['rent'] - $request['jama'], 'remark' => $request['remark'], 'rent' => $request['rent'], 'dc' => $request['dc'], 'nod' => $request['nod']]);

            Admin_log::create([
                'user_id' => $user->id, 'type_id' => 3, 'action_type_id' => 2, 'request_id' => $id,
                'message' => 'House Updated.', 'edit_old_data' => json_encode($old_data), 'edit_new_data' => json_encode($request->all())
            ]);


            return redirect()->back()->with('success', 'Successfully Taken.');
        } catch (Exception $e) {
            //dd($e);
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