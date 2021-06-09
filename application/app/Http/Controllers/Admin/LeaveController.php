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
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;

class LeaveController extends Controller
{
    public function index() 
    {
        if (permission::permitted('leaves')=='fail'){ return redirect()->route('denied'); }

        $employee = table::people()->join('company_data', 'people.id', '=', 'company_data.reference')->get();

        $leaves = table::leaves()->get();

        $leave_types = table::leavetypes()->get();

        return view('admin.leave', [
            'employee' => $employee,
            'leaves' => $leaves,
            'leave_types' => $leave_types,
        ]);
    }

    public function edit($id, Request $request) 
    {
        if (permission::permitted('leave-edit')=='fail'){ return redirect()->route('denied'); }

        $leave = table::leaves()->where('id', $id)->first();

        $leave->leavefrom = date('M d, Y', strtotime($leave->leavefrom));

        $leave->leaveto = date('M d, Y', strtotime($leave->leaveto));

        $leave->returndate = date('M d, Y', strtotime($leave->returndate));

        $leave_types = table::leavetypes()->get();

        return view('admin.leave-edit', [
            'leave' => $leave,
            'leave_types' => $leave_types
        ]);
    }

    public function update(Request $request)
    {
        if (permission::permitted('leave-edit')=='fail'){ return redirect()->route('denied'); }

        $v = $request->validate([
            'id' => 'required|max:200',
            'status' => 'required|max:100',
            'comment' => 'max:255',
        ]);

        $id = $request->id;

        $status = $request->status;

        $comment = mb_strtoupper($request->comment);

        table::leaves()->where('id', $id)->update([
            'status' => $status,
            'comment' => $comment
        ]);

        return redirect('admin/leave')->with('success', trans("Employee leave has been updated"));
    }

    public function delete($id, Request $request)
    {
        if (permission::permitted('leave-delete')=='fail'){ return redirect()->route('denied'); }

        table::leaves()->where('id', $id)->delete();

        return redirect('admin/leave')->with('success', trans("A leave request is successfully deleted"));
    }

}
