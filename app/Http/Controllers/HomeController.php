<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Exception;

use App\Models\EmployeeHouse;
use App\Models\User;
use App\Models\Society;
use App\Models\House;
use App\Models\HouseRent;
use \Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        try {
            $this->middleware('auth');
        } catch (Exception $e) {
            return redirect()->back();
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try {
            return view('home');
        } catch (Exception $e) {
            return redirect()->back();
        }
    }

    public function adminDashboard()
    {
        try {
            $totalEmp = User::count();
            $totalSoc = Society::count();
            $totalHouse = House::count();

            /*  $user = User::where('is_admin', 0)->get();
            // dd($user); */
            $userSociety = EmployeeHouse::join('users', 'users.id', '=', 'employee_houses.user_id')
                //->join('societies', 'societies.id', '=', 'employee_houses.society_id')
                ->select('users.name')->groupBy('users.name')
                //->where('employee_houses.user_id', 'users.id')->pluck('society_id')
                ->get();
            //dd($userSociety);
            $data = EmployeeHouse::pluck('society_id');
            $ttlSoc = $data->count();
            // dd($data);

            $hData = House::select('id')->whereIn('society_id', $data)->get();
            //join('societies', 'societies.id', '=', 'houses.society_id')
            //dd($hData);
            $ttlHouse = $hData->count();

            // $array = array_merge($userSociety, $ttlSoc, $ttlHouse);
            // dd($ttlHouse);
            //->get();
            return view('admin_dashboard', compact('totalEmp', 'totalSoc', 'totalHouse', 'userSociety', 'ttlSoc', 'ttlHouse'));
        } catch (Exception $e) {
            //dd($e);
            return redirect()->back();
        }
    }

    public function userDashboard()
    {
        try {
            $auth = auth()->user();
            $societyData = EmployeeHouse::where('user_id', $auth->id)->get();
            $societyDataPluck = $societyData->pluck('society_id');
            $from = Carbon::now()->startOfMonth();
            $to = Carbon::now()->endOfMonth()->addDay(9);
            $housesData = House::join('house_rents', 'house_rents.house_id', '=', 'houses.id')
                ->whereIn('society_id', $societyDataPluck)->whereBetween('house_rents.date', [$from, $to])
                ->where(['house_rents.dc' => 0, 'nod' => 0])
                ->get();
            $houseDataPluck = $housesData->pluck('id');
            $totalSociety = $societyData->count();
            $totalHouses = $housesData->count();
            $remainingCollection = HouseRent::whereIn('house_id', $houseDataPluck)->sum('baki');

            $collected = HouseRent::whereIn('house_id', $houseDataPluck)->sum('jama');
            return view('user_dashboard', compact('totalSociety', 'totalHouses', 'remainingCollection', 'collected'));
        } catch (Exception $e) {
            //dd($e);
            return redirect()->back();
        }
    }
}