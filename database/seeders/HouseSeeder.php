<?php

namespace Database\Seeders;

use App\Models\House;
use Illuminate\Database\Seeder;

class HouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        House::create(['house_no' => 'A-101', 'society_id' => '1',  'mobile_no' => '1234567891', 'box_no' => 123456, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
        House::create(['house_no' => 'A-102', 'society_id' => '1',  'mobile_no' => '1234567892', 'box_no' => 123451, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
        House::create(['house_no' => 'A-103', 'society_id' => '1',  'mobile_no' => '1234567893', 'box_no' => 123452, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
        House::create(['house_no' => 'A-104', 'society_id' => '1',  'mobile_no' => '1234567894', 'box_no' => 123453, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
        House::create(['house_no' => 'A-105', 'society_id' => '1',  'mobile_no' => '1234567895', 'box_no' => 123454, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
        House::create(['house_no' => 'A-106', 'society_id' => '1',  'mobile_no' => '1234567896', 'box_no' => 123455, 'rent' => 350, 'credit' => 0, 'debit' => 350]);

        House::create(['house_no' => 'B-101', 'society_id' => '2',  'mobile_no' => '1234567891', 'box_no' => 123456, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
        House::create(['house_no' => 'B-102', 'society_id' => '2',  'mobile_no' => '1234567892', 'box_no' => 123451, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
        House::create(['house_no' => 'B-103', 'society_id' => '2',  'mobile_no' => '1234567893', 'box_no' => 123452, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
        House::create(['house_no' => 'B-104', 'society_id' => '2',  'mobile_no' => '1234567894', 'box_no' => 123453, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
        House::create(['house_no' => 'B-105', 'society_id' => '2',  'mobile_no' => '1234567895', 'box_no' => 123454, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
        House::create(['house_no' => 'B-106', 'society_id' => '2',  'mobile_no' => '1234567896', 'box_no' => 123455, 'rent' => 350, 'credit' => 0, 'debit' => 350]);

        House::create(['house_no' => 'C-101', 'society_id' => '3',  'mobile_no' => '1234567891', 'box_no' => 123456, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
        House::create(['house_no' => 'C-102', 'society_id' => '3',  'mobile_no' => '1234567892', 'box_no' => 123451, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
        House::create(['house_no' => 'C-103', 'society_id' => '3',  'mobile_no' => '1234567893', 'box_no' => 123452, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
        House::create(['house_no' => 'C-104', 'society_id' => '3',  'mobile_no' => '1234567894', 'box_no' => 123453, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
        House::create(['house_no' => 'C-105', 'society_id' => '3',  'mobile_no' => '1234567895', 'box_no' => 123454, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
        House::create(['house_no' => 'C-106', 'society_id' => '3',  'mobile_no' => '1234567896', 'box_no' => 123455, 'rent' => 350, 'credit' => 0, 'debit' => 350]);

        House::create(['house_no' => 'D-101', 'society_id' => '4',  'mobile_no' => '1234567891', 'box_no' => 123456, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
        House::create(['house_no' => 'D-102', 'society_id' => '4',  'mobile_no' => '1234567892', 'box_no' => 123451, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
        House::create(['house_no' => 'D-103', 'society_id' => '4',  'mobile_no' => '1234567893', 'box_no' => 123452, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
        House::create(['house_no' => 'D-104', 'society_id' => '4',  'mobile_no' => '1234567894', 'box_no' => 123453, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
        House::create(['house_no' => 'D-105', 'society_id' => '4',  'mobile_no' => '1234567895', 'box_no' => 123454, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
        House::create(['house_no' => 'D-106', 'society_id' => '4',  'mobile_no' => '1234567896', 'box_no' => 123455, 'rent' => 350, 'credit' => 0, 'debit' => 350]);

        House::create(['house_no' => 'E-101', 'society_id' => '5',  'mobile_no' => '1234567891', 'box_no' => 123456, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
        House::create(['house_no' => 'E-102', 'society_id' => '5',  'mobile_no' => '1234567892', 'box_no' => 123451, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
        House::create(['house_no' => 'E-103', 'society_id' => '5',  'mobile_no' => '1234567893', 'box_no' => 123452, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
        House::create(['house_no' => 'E-104', 'society_id' => '5',  'mobile_no' => '1234567894', 'box_no' => 123453, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
        House::create(['house_no' => 'E-105', 'society_id' => '5',  'mobile_no' => '1234567895', 'box_no' => 123454, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
        House::create(['house_no' => 'E-106', 'society_id' => '5',  'mobile_no' => '1234567896', 'box_no' => 123455, 'rent' => 350, 'credit' => 0, 'debit' => 350]);

        House::create(['house_no' => 'F-101', 'society_id' => '6',  'mobile_no' => '1234567891', 'box_no' => 123456, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
        House::create(['house_no' => 'F-102', 'society_id' => '6',  'mobile_no' => '1234567892', 'box_no' => 123451, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
        House::create(['house_no' => 'F-103', 'society_id' => '6',  'mobile_no' => '1234567893', 'box_no' => 123452, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
        House::create(['house_no' => 'F-104', 'society_id' => '6',  'mobile_no' => '1234567894', 'box_no' => 123453, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
        House::create(['house_no' => 'F-105', 'society_id' => '6',  'mobile_no' => '1234567895', 'box_no' => 123454, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
        House::create(['house_no' => 'F-106', 'society_id' => '6',  'mobile_no' => '1234567896', 'box_no' => 123455, 'rent' => 350, 'credit' => 0, 'debit' => 350]);

        House::create(['house_no' => 'G-101', 'society_id' => '7',  'mobile_no' => '1234567891', 'box_no' => 123456, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
        House::create(['house_no' => 'G-102', 'society_id' => '7',  'mobile_no' => '1234567892', 'box_no' => 123451, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
        House::create(['house_no' => 'G-103', 'society_id' => '7',  'mobile_no' => '1234567893', 'box_no' => 123452, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
        House::create(['house_no' => 'G-104', 'society_id' => '7',  'mobile_no' => '1234567894', 'box_no' => 123453, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
        House::create(['house_no' => 'G-105', 'society_id' => '7',  'mobile_no' => '1234567895', 'box_no' => 123454, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
        House::create(['house_no' => 'G-106', 'society_id' => '7',  'mobile_no' => '1234567896', 'box_no' => 123455, 'rent' => 350, 'credit' => 0, 'debit' => 350]);
    }
}
