<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    // view dashboard
    public function getDashboard(){
        return view('admin.dashboard.index');
    }

}
