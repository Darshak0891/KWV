<?php

namespace App\Http\Controllers;
use App\Models\EmployeeHouse;
use App\Models\Society;
use App\Models\House;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $society_id = EmployeeHouse::where('user_id', $user->id)->pluck('society_id');
        
        $society = Society::whereIn('id', $society_id)->get();
       
        //dd($society);
        return view('allocatesocieties.index',compact('society'));
    }

    public function show($id)
    {
        $show_house = House::where('society_id', $id)->get();
        //dd($show_house);
        return view('allocatesocieties.show', compact('show_house'));
    }
}
