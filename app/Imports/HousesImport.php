<?php

namespace App\Imports;

use App\Models\Society;
use App\Models\House;
use App\Models\HouseRent;
use Maatwebsite\Excel\Concerns\ToModel;
use \Carbon\Carbon;

class HousesImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $isExists = Society::where('society_name', '=', $row[2])->first();
        if ($isExists) {

            $insertData  = House::create([
                'house_no'     => $row[0],
                'name'         => $row[1],
                'society_id'   => $isExists->id,
                'mobile_no'    => $row[3],
                'box_no'       => $row[4],
                'rent'         => $row[5],
            ]);
            HouseRent::create([
                'house_id' => $insertData->id, 'rent' => $row[5], 'baki' => $row[5],
                'date' => Carbon::now()
            ]);
        }
    }
}
