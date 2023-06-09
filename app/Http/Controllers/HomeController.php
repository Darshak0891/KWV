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

            $userSociety = EmployeeHouse::join('users', 'users.id', '=', 'employee_houses.user_id')
                ->join('houses', 'houses.society_id', '=', 'employee_houses.society_id')
                ->join('house_rents', 'house_rents.house_id', '=', 'houses.id')
                ->selectRaw('users.name, count(houses.id) as totalHouses, sum(house_rents.rent) as totalRents, sum(house_rents.baki) as totalBaki, sum(house_rents.jama) as totalJama')
                ->groupBy('users.id')
                ->get();

            $userSocietyData = EmployeeHouse::join('users', 'users.id', '=', 'employee_houses.user_id')

                ->selectRaw('users.name, count(employee_houses.society_id) as totalSociety')
                ->groupBy('users.id')
                ->get();
            $todayCollection = HouseRent::whereRaw('updated_at >= DATE(NOW()) - INTERVAL 1 DAY')->sum('jama');

            return view('admin_dashboard', compact('totalEmp', 'totalSoc', 'totalHouse', 'userSociety', 'userSocietyData', 'todayCollection'));
        } catch (Exception $e) {
            dd($e);
            return redirect()->back();
        }
    }

    public function userDashboard()
    {
        try {
            $auth = auth()->user();
            $societyData = EmployeeHouse::where('user_id', $auth->id)->get();
            $societyDataPluck = $societyData->pluck('society_id');
            $currentDate = date('Y-d-m');
            $contractDateBegin = date('Y-m-d', strtotime("01/" . date('m') . "/" . date('y')));
            $contractDateEnd = date('Y-m-d', strtotime("08/" . date('m') . "/" . date('y')));
            // dd($contractDateBegin, $contractDateEnd);
            if (($currentDate >= $contractDateBegin) && ($currentDate <= $contractDateEnd)) {
                $from = Carbon::now()->startOfMonth()->subMonthsNoOverflow();
                $to = Carbon::now()->endOfMonth()->subMonthsNoOverflow()->addDay(9);
                // dd($from, $to);
            } else {
                $from = Carbon::now()->startOfMonth();
                $to = Carbon::now()->endOfMonth()->addDay(9);
            }
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
            return redirect()->back();
        }
    }
}
