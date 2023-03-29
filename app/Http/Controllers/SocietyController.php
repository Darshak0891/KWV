<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Society;

class SocietyController extends Controller
{
    public function index()
    {
        $society = Society::all();
        return view('societies.index',compact('society'));
    }
    public function create()
    {
        return view('societies.create');
    }

    public function store(Request $request)
    {
        $storeData = $request->validate([
            'society_name' =>'required|max:255',

        ]);
        $society = Society::create($storeData);
        return redirect()->route('societies.index')->with('completed','Society has been saved!');
    }

    public function show(Society $society)
    {
        return view('societies.show',compact('society'));
    }

    public function edit($id)
    {
        $society = Society::findOrFail($id);
        return view('societies.edit',compact('society'));
    }

    public function update(Request $request,$id)
    {
        $updateData = $request->validate([
            'society_name' => 'required|max:255',
        ]);

        Society::whereId($id)->update($updateData);
        return redirect()->route('societies.index')->with('completed', 'Society has been updated');
    }

    public function delete($id)
    {
        $society = Society::findOrFail($id);
        $society->delete();
        return redirect()->route('societies.index')->with('completed', 'Society has been deleted');
    }
}
