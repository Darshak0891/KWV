<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\House;
use App\Models\HouseRent;
use Illuminate\Http\Request;
use App\Exports\ReportsExport;
use Maatwebsite\Excel\Facades\Excel;
use \Exception;
use \Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        if ($request['month']) {
            //dd($request);
            $data = explode('-', $request['month']);
            //dd($data);
            $report = HouseRent::join('houses', 'houses.id', '=', 'house_rents.house_id')
                ->join('societies', 'societies.id', '=', 'houses.society_id')
                ->join('employee_houses', 'employee_houses.society_id', '=', 'societies.id')
                ->join('users', 'users.id', '=', 'employee_houses.user_id')
                ->select('houses.id', 'houses.house_no', 'societies.society_name', 'houses.name', 'houses.mobile_no', 'houses.box_no', 'house_rents.baki', 'house_rents.rent', 'house_rents.jama', 'house_rents.date', 'users.id as uID')->where(function ($query) use ($request) {

                    if (isset($request->report) && $request->report) {
                        $query->where('users.id', $request->report);
                    }
                })
                ->whereMonth('house_rents.created_at', '=', $data[1])
                ->whereYear('house_rents.created_at', '=', $data[0])
                ->get();

            //dd($report);
        } else {
            $report = [];
        }
        $user = User::where('is_admin', 0)->get();
        return view('reports.index', compact('report', 'user'));
    }

    public function fileExport()
    {
        return Excel::download(new ReportsExport, 'reports.xlsx');
    }
}
