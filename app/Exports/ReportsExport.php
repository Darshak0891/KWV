<?php

namespace App\Exports;

use App\Models\House;
use App\Models\HouseRent;
//use App\Models\Report;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportsExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //return House::join()->all();
        return HouseRent::join('houses', 'houses.id', '=', 'house_rents.house_id')
            ->join('societies', 'societies.id', '=', 'houses.society_id')
            ->select('houses.house_no', 'societies.society_name', 'houses.name', 'houses.mobile_no', 'houses.box_no', 'house_rents.baki', 'house_rents.rent', 'house_rents.jama', 'house_rents.date')->get();
    }
}
