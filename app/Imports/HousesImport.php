<?php

namespace App\Imports;

use App\Models\Society;
use App\Models\House;
use Maatwebsite\Excel\Concerns\ToModel;

class HousesImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (House::join('societies', 'societies.id', '=', 'houses.society_id')
            ->select('societies.society_name')->where('society_name', '=', $row[2])->exists()
        ) {

            return new House([
                'house_no'     => $row[0],
                'name'         => $row[1],
                'society_id'   => $row[2],
                'mobile_no'    => $row[3],
                'box_no'       => $row[4],
                'rent'         => $row[5],
            ]);
        } else {
            return back()->with('error', 'Society Not Found.');
        }
    }

    /* {
        $house = House::join('societies', 'societies.id', '=', 'houses.society_id')->select('societies.society_name')->get();

        if($house == $row[2])
        {
            return new House([
                'house_no'     => $row[0],
                'name'         => $row[1],
                'society_id'   => $row[2],
                'mobile_no'    => $row[3],
                'box_no'       => $row[4],
                'rent'         => $row[5],
            ]);
        }else
        {
            return back()->with('error', 'Society Not Found.');
        }
    } */
}