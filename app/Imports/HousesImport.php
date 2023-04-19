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
        $isExists = Society::where('society_name', '=', $row[2])->first();
        if ($isExists) {

            return new House([
                'house_no'     => $row[0],
                'name'         => $row[1],
                'society_id'   => $isExists->id,
                'mobile_no'    => $row[3],
                'box_no'       => $row[4],
                'rent'         => $row[5],
            ]);
        }
    }
}
