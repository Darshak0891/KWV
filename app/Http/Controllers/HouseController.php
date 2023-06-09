<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use Validator;
use App\Models\Society;
use App\Models\Admin_log;
use \Carbon\Carbon;

use App\Models\HouseRent;
use App\Http\Resources\House as HouseResources;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\HousesImport;
use App\Models\Notification;
use \Exception;

class HouseController extends Controller
{
    public function index(Request $request)
    {
        try {
            $house = House::join('societies', 'societies.id', '=', 'houses.society_id')
                ->join('house_rents', 'house_rents.house_id', '=', 'houses.id')
                ->select('houses.id', 'houses.house_no', 'houses.name', 'houses.mobile_no', 'houses.box_no', 'house_rents.rent', 'societies.society_name')
                ->where(function ($query) use ($request) {
                    if ($request->search) {
                        $query->where('society_name', 'LIKE', '%' . $request->search . '%')
                            ->orWhere('house_no', 'LIKE', '%' . $request->search . '%');
                    }
                })->orderBy('house_no', 'ASC')
                ->paginate(100);
            return view('houses.index', compact('house'));
        } catch (Exception $e) {
            return redirect()->back();
        }
    }

    public function create()
    {
        try {
            $society = Society::get();
            return view('houses.create', compact('society'));
        } catch (Exception $e) {
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        try {
            $user = auth()->user();

            $storeData = $request->validate([
                'society_id' => 'required|exists:societies,id',
                'house_no' => 'required',
                'name' => 'required',
                'mobile_no' => 'required|numeric',
                'box_no' => 'required',
                'rent' => 'required',
            ]);


            $house = House::create($storeData);
            HouseRent::create([
                'house_id' => $house->id, 'rent' => $request['rent'], 'baki' => $request['rent'],
                'date' => Carbon::now()
            ]);
            Admin_log::create([
                'user_id' => $user->id, 'type_id' => 3, 'action_type_id' => 1,
                'request_id' => $house->id, 'message' => 'House Added.'
            ]);
            return redirect()->route('houses.index')->with('success', 'House has been added');
        } catch (Exception $e) {
            return redirect()->back();
        }
    }

    public function show(House $house)
    {
        try {
            return view('houses.show', compact('house'));
        } catch (Exception $e) {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        try {
            $house = House::join('house_rents', 'house_rents.house_id', '=', 'houses.id')
                ->select('houses.id', 'houses.society_id', 'houses.house_no', 'houses.name', 'houses.mobile_no', 'houses.box_no', 'house_rents.rent', 'house_rents.dc', 'house_rents.nod')
                ->where('houses.id', $id)
                ->first();
            $society = Society::get();
            return view('houses.edit', compact('house', 'society'));
        } catch (Exception $e) {
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = auth()->user();

            $request->validate([
                'society_id' => 'required',
                'house_no' => 'required',
                'mobile_no' => 'required',
                'box_no' => 'required',
                'rent' => 'required',
            ]);
            $old_data = House::where('id', $id)->first();
            $from = Carbon::now()->startOfMonth();
            $to = Carbon::now()->endOfMonth()->addDay(9);
            $houseRentData = HouseRent::where('id', $id)->whereBetween('date', [$from, $to])->select('house_rents.rent', 'house_rents.dc', 'house_rents.nod')->first();
            $old_data['rent'] = $houseRentData->rent;
            $old_data['dc'] = $houseRentData->dc;
            $old_data['nod'] = $houseRentData->nod;

            House::where('id', $id)->update(['society_id' => $request['society_id'], 'house_no' => $request['house_no'], 'mobile_no' => $request['mobile_no'], 'box_no' => $request['box_no']]);

            HouseRent::where('house_id', $id)->whereBetween('date', [$from, $to])->update(['rent' => $request['rent'], 'baki' => $request['rent'] - $request['jama'], 'dc' => $request['dc'], 'nod' => $request['nod']]);
            Admin_log::create([
                'user_id' => $user->id, 'type_id' => 3, 'action_type_id' => 2, 'request_id' => $id,
                'message' => 'House Updated.', 'edit_old_data' => json_encode($old_data), 'edit_new_data' => json_encode($request->all())
            ]);
            return redirect()->route('houses.index')->with('success', 'House has been updated.');
        } catch (Exception $e) {
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        try {
            $user = auth()->user();

            $house = House::where('id', $id);
            $house->delete();
            Admin_log::create([
                'user_id' => $user->id, 'type_id' => 3, 'action_type_id' => 3,
                'request_id' => $id, 'message' => 'House Deleted.'
            ]);
            return redirect()->route('houses.index')->with('success', 'House has been deleted.');
        } catch (Exception $e) {
            return redirect()->back();
        }
    }

    public function fileImportExport()
    {
        try {
            return view('houses.file_import');
        } catch (Exception $e) {
            return redirect()->back();
        }
    }

    public function fileImport(Request $request)
    {
        try {
            $dad = Excel::import(new HousesImport, $request->file('file')->store('temp'));
            return redirect()->route('houses.index')->with('success', 'Import Successfully!.');
        } catch (Exception $e) {
            return redirect()->back()->with("Error", "Something went wrong");
        }
    }
}
