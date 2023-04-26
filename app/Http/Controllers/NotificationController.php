<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\HouseRent;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $data = HouseRent::join('houses', 'houses.id', '=', 'house_rents.house_id')
            ->join('societies', 'societies.id', '=', 'houses.society_id')
            ->join('employee_houses', 'employee_houses.society_id', '=', 'societies.id')
            ->join('users', 'users.id', '=', 'employee_houses.user_id')
            ->select(
                'houses.id',
                'houses.house_no',
                'houses.name',
                'societies.society_name',
                'houses.mobile_no',
                'house_rents.jama',
                'users.id',
                'users.name'
            )->where('house_rents.jama', '>=', 1)->orderBy('users.id', 'DESC')->get();

        return view('notifications.index', compact('data'));
    }
}
