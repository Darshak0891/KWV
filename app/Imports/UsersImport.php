<?php

namespace App\Imports;

use App\Models\Society;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    /* {
        return new Society([
            'society_name'     => $row[0],
        ]);
    } */

    {
        if (!Society::where('society_name', '=', $row[0])->exists()) {

            return new Society([
                'society_name' => $row[0],
            ]);
        }
    }
}
