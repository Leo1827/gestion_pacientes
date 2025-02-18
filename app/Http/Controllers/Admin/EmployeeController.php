<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // view dashboard
    public function getEmployee(){
        return view('admin.employee.index');
    }
}
