<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\HouseRent;
use Illuminate\Http\Request;
use App\Exports\ReportsExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        if ($request['from'] && $request['to']) {
            //dd($request);
            $report = HouseRent::join('houses', 'houses.id', '=', 'house_rents.house_id')
                ->join('societies', 'societies.id', '=', 'houses.society_id')
                ->select('houses.id', 'houses.house_no', 'societies.society_name', 'houses.name', 'houses.mobile_no', 'houses.box_no', 'house_rents.baki', 'house_rents.rent', 'house_rents.jama', 'house_rents.date')
                ->whereBetween('house_rents.created_at', [$request['from'], $request['to']])->get();
            //dd($report);
        } else {
            $report = [];
        }
        //dd($request);
        return view('reports.index', compact('report'));
    }

    public function fileExport()
    {
        return Excel::download(new ReportsExport, 'reports.xlsx');
    }
}
