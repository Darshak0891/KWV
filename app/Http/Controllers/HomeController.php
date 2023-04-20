<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Exception;

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
            return view('admin_dashboard');
        } catch (Exception $e) {
            return redirect()->back();
        }
    }

    public function userDashboard()
    {
        try {
            return view('user_dashboard');
        } catch (Exception $e) {
            return redirect()->back();
        }
    }
}
