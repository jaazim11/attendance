<?php
/*
* Workday - A time clock application for employees
* Support: official.codefactor@gmail.com
* Version: 2.0
* Author: Brian Luna
* Copyright 2021 Codefactor
* 
*/
namespace App\Http\Controllers\personal;

use DB;
use App\Classes\Table;
use App\Classes\Permission;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SettingsController extends Controller
{
    public function index() 
    {
        return view('personal.settings');
    }
}

