<?php
/*
* Workday - A time clock application for employees
* Support: official.codefactor@gmail.com
* Version: 2.0
* Author: Brian Luna
* Copyright 2021 Codefactor
* 
*/
namespace App\Http\Controllers\admin;

use DB;
use App\Classes\Table;
use App\Classes\Permission;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() 
    {
        if (permission::permitted('dashboard')=='fail'){ return redirect()->route('denied'); }
        
        $reference = \Auth::user()->reference;

        $firstname = table::people()->where('id', $reference)->value('firstname');

        $total_employees = table::people()->where('employmentstatus', 'Active')->count();

        $total_attendances = table::attendance()->count();

        $total_schedules = table::schedules()->where('archive', '0')->count();

        $total_leave_request = table::leaves()->where('status', 'Approved')->count();

        return view('admin.dashboard', [
        	'total_employees' => $total_employees,
        	'total_attendances' => $total_attendances,
        	'total_schedules' => $total_schedules,
        	'total_leave_request' => $total_leave_request,
            'firstname' => $firstname,
        ]);
    }
}
