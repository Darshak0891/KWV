<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\House;
use Validator;
use App\Models\Society;
use App\Http\Resources\House as HouseResources;

class HouseController extends Controller
{
    public function index()
    {
      
        $house = House::join('societies','societies.id','=','houses.society_id')
        ->select('houses.house_no', 'houses.mobile_no', 'houses.box_no', 'houses.rent', 'houses.credit', 'houses.debit', 'societies.society_name')
        ->get();

        return view('houses.index', compact('house'));
    }

    public function create()
    {
        $society = Society::get();
        return view('houses.create',compact('society'));
    }

    public function store(Request $request)
    {
        $storeData = $request->validate([
            'society_id' => 'required|exists:societies,id',
            'house_no' => 'required',
            'mobile_no' => 'required|numeric',
            'box_no' => 'required',
            'rent' => 'required',
            'credit' => 'required',
            'debit' => 'required'
        ]);

        $house = House::create($storeData);
        return redirect()->route('houses.index')->with('completed','House has been saved');
    }

    public function show(House $house)
    {
        $house = House::get();
        return view('houses.show',compact('house'));
    }

    public function edit($id)
    {
        $house = House::findOrFail($id);
        return view('houses.edit', compact('house'));
    }

    public function update(Request $request,$id)
    {
        $updateData = $request->validate([
            'society_id' => 'required',
            'house_no' => 'required',
            'mobile_no' => 'required|numeric',
            'box_no' => 'required',
            'rent' => 'required',
            'credit' => 'required',
            'debit' => 'required'
        ]);

        House::whereId($id)->update($updateData);
        return redirect()->route('houses.index')->with('completed', 'House has been updated.');
    }

    public function delete($id)
    {
        $house = House::findOrFail($id);
        $house->delete();
        return redirect()->route('houses.index')->with('completed', 'House has been deleted.');
    }
}
