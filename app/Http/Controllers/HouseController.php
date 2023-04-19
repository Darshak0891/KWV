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

class HouseController extends Controller
{
    public function index(Request $request)
    {
        $from = Carbon::now()->startOfMonth();
        $to = Carbon::now()->endOfMonth()->addDay(9);
        $house = House::join('societies', 'societies.id', '=', 'houses.society_id')
            ->join('house_rents', 'house_rents.house_id', '=', 'houses.id')
            ->select('houses.id', 'houses.house_no', 'houses.name', 'houses.mobile_no', 'houses.box_no', 'house_rents.rent', 'societies.society_name')
            ->where(function ($query) use ($request) {
                if ($request->search) {
                    $query->where('society_name', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('house_no', 'LIKE', '%' . $request->search . '%');
                }
            })
            ->whereBetween('house_rents.date', [$from, $to])
            ->paginate(10);

        return view('houses.index', compact('house'));
    }

    public function create()
    {
        $society = Society::get();
        return view('houses.create', compact('society'));
    }

    public function store(Request $request)
    {
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
    }

    public function show(House $house)
    {
        $house = House::get();
        return view('houses.show', compact('house'));
    }

    public function edit($id)
    {
        $house = House::findOrFail($id);
        $society = Society::get();
        return view('houses.edit', compact('house', 'society'));
    }

    public function update(Request $request, $id)
    {
        $user = auth()->user();

        $updateData = $request->validate([
            'society_id' => 'required',
            'house_no' => 'required',
            'mobile_no' => 'required|numeric',
            'box_no' => 'required',
            'rent' => 'required',
        ]);
        $old_data = House::get()->first();
        House::whereId($id)->update($updateData);
        Admin_log::create([
            'user_id' => $user->id, 'type_id' => 3, 'action_type_id' => 2, 'request_id' => $id,
            'message' => 'House Updated.', 'edit_old_data' => json_encode($old_data), 'edit_new_data' => json_encode($updateData)
        ]);
        return redirect()->route('houses.index')->with('success', 'House has been updated.');
    }

    public function delete($id)
    {
        $user = auth()->user();

        $house = House::where('id', $id);
        $house->delete();
        Admin_log::create([
            'user_id' => $user->id, 'type_id' => 3, 'action_type_id' => 3,
            'request_id' => $id, 'message' => 'House Deleted.'
        ]);
        return redirect()->route('houses.index')->with('success', 'House has been deleted.');
    }

    public function fileImportExport()
    {
        return view('houses.file_import');
    }

    public function fileImport(Request $request)
    {
        $dad = Excel::import(new HousesImport, $request->file('file')->store('temp'));
        // dd($dad);
        return redirect()->route('houses.index')->with('success', 'Import Successfully!.');
    }
}
