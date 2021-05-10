<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    //
    function index(){
        return view('dashboard.staffs.index');
    }

    function profile(){
        return view('dashboard.staffs.profile');
    }

    function settings(){
        return view('dashboard.staffs.settings');
    }
}
