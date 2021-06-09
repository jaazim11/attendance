<?php
/*
* Workday - A time clock application for employees
* Support: official.codefactor@gmail.com
* Version: 2.0
* Author: Brian Luna
* Copyright 2021 Codefactor
*/
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| Welcome Login Page
|--------------------------------------------------------------------------
*/
Route::get('/', 'Auth\LoginController@welcome_login')->name('login');


/*
|--------------------------------------------------------------------------
| Universal SmartClock has clock-in and clock-out functions 
|--------------------------------------------------------------------------
*/
Route::get('webclock', 'ClockController@index');
Route::post('webclock/clocking', 'ClockController@clocking');

/*
|--------------------------------------------------------------------------
| Protected Routes Requires Authentication, and User Account Approval
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'auth'], function () {

	Route::group(['middleware' => 'checkstatus'], function () {

		Route::group(['middleware' => 'admin'], function () {
			/*
			|--------------------------------------------------------------------------
			| Dashboard 
			|--------------------------------------------------------------------------
			*/
			Route::get('admin/dashboard', 'Admin\DashboardController@index')->name('dashboard');	

			/*
			|--------------------------------------------------------------------------
			| Employees 
			|--------------------------------------------------------------------------
			*/
			Route::get('admin/employee', 'Admin\EmployeeController@index')->name('admin-employee');
			Route::get('admin/employee/add', 'Admin\EmployeeController@add');
			Route::post('admin/employee/store', 'Admin\EmployeeController@store');
			Route::get('admin/employee/view/{id}', 'Admin\EmployeeController@view');
			Route::get('admin/employee/edit/{id}', 'Admin\EmployeeController@edit');
			Route::post('admin/employee/update', 'Admin\EmployeeController@update');
			Route::get('admin/employee/archive/{id}', 'Admin\EmployeeController@archive');
			Route::get('admin/employee/delete/{id}', 'Admin\EmployeeController@delete');

			/*
			|--------------------------------------------------------------------------
			| Employee Attendance 
			|--------------------------------------------------------------------------
			*/
			Route::get('admin/attendance', 'Admin\AttendanceController@index')->name('admin-attendance');
			Route::post('admin/attendance', 'Admin\AttendanceController@filter');
			Route::get('admin/attendance/manual-entry', 'Admin\AttendanceController@add');
			Route::post('admin/attendance/add-entry', 'Admin\AttendanceController@entry');
			Route::get('admin/attendance/delete/{id}', 'Admin\AttendanceController@delete');
			
			/*
			|--------------------------------------------------------------------------
			| Employee Schedules 
			|--------------------------------------------------------------------------
			*/
			Route::get('admin/schedule', 'Admin\ScheduleController@index')->name('admin-schedule');
			Route::get('admin/schedule/add', 'Admin\ScheduleController@add');
			Route::post('admin/schedule/store', 'Admin\ScheduleController@store');
			Route::get('admin/schedule/edit/{id}', 'Admin\ScheduleController@edit');
			Route::post('admin/schedule/update', 'Admin\ScheduleController@update');
			Route::get('admin/schedule/delete/{id}', 'Admin\ScheduleController@delete');
			Route::get('admin/schedule/archive/{id}', 'Admin\ScheduleController@archive');

			/*
			|--------------------------------------------------------------------------
			| Employee Leaves 
			|--------------------------------------------------------------------------
			*/
			Route::get('admin/leave', 'Admin\LeaveController@index')->name('admin-leave');
			Route::get('admin/leave/edit/{id}', 'Admin\LeaveController@edit');
			Route::post('admin/leave/update', 'Admin\LeaveController@update');
			Route::get('admin/leave/delete/{id}', 'Admin\LeaveController@delete');

			/*
			|--------------------------------------------------------------------------
			| Reports 
			|--------------------------------------------------------------------------
			*/
			Route::get('admin/reports', 'Admin\ReportController@index')->name('admin-reports');
			Route::get('admin/reports/company-overview', 'Admin\ReportController@overview');
			Route::get('admin/reports/employee-birthdays', 'Admin\ReportController@birthdays');
			Route::get('admin/reports/employee-list', 'Admin\ReportController@employees');
			Route::get('admin/reports/user-accounts', 'Admin\ReportController@users');

			/*
			|--------------------------------------------------------------------------
			| Export Reports 
			|--------------------------------------------------------------------------
			*/
			Route::get('export/report/employees', 'Admin\ExportController@employees');
			Route::get('export/report/birthdays', 'Admin\ExportController@birthdays');
			Route::get('export/report/accounts', 'Admin\ExportController@users');

			/*
			|--------------------------------------------------------------------------
			| Users 
			|--------------------------------------------------------------------------
			*/
			Route::get('admin/users', 'Admin\UserController@index')->name('admin-users');
			Route::get('admin/users/add', 'Admin\UserController@add');
			Route::post('admin/users/register', 'Admin\UserController@register');
			Route::get('admin/users/edit/{id}', 'Admin\UserController@edit');
			Route::post('admin/users/update', 'Admin\UserController@update');
			Route::get('admin/users/delete/{id}', 'Admin\UserController@delete');

			/*
			|--------------------------------------------------------------------------
			| User Roles 
			|--------------------------------------------------------------------------
			*/
			Route::get('admin/user/roles', 'Admin\RoleController@index')->name('admin-roles');
			Route::get('admin/user/roles/add', 'Admin\RoleController@add');
			Route::post('admin/user/roles/store', 'Admin\RoleController@store');
			Route::get('admin/user/roles/edit/{id}', 'Admin\RoleController@edit');
			Route::post('admin/user/roles/update', 'Admin\RoleController@update');
			Route::get('admin/user/roles/delete/{id}', 'Admin\RoleController@delete');
			Route::get('admin/user/roles/permission/edit/{id}', 'Admin\RoleController@editpermission');
			Route::post('admin/user/roles/permission/update', 'Admin\RoleController@updatepermission');

			/*
			|--------------------------------------------------------------------------
			| User Account 
			|--------------------------------------------------------------------------
			*/
			Route::get('admin/account', 'Admin\AccountController@account')->name('account');
			Route::post('admin/update/user', 'Admin\AccountController@updateUser');
			Route::post('admin/update/password', 'Admin\AccountController@updatePassword');

			/*
			|--------------------------------------------------------------------------
			| Settings 
			|--------------------------------------------------------------------------
			*/
			Route::get('admin/settings', 'Admin\SettingsController@settings')->name('settings');
			Route::post('admin/settings/update', 'Admin\SettingsController@update');

			/*
			|--------------------------------------------------------------------------
			| Form Options 
			|--------------------------------------------------------------------------
			*/
			# Company
			Route::get('admin/company/', 'Admin\FormOptionsController@company')->name('company');
			Route::post('admin/company/add', 'Admin\FormOptionsController@addCompany');
			Route::get('admin/company/delete/{id}', 'Admin\FormOptionsController@deleteCompany');

			# Department
			Route::get('admin/department', 'Admin\FormOptionsController@department')->name('department');
			Route::post('admin/department/add', 'Admin\FormOptionsController@addDepartment');
			Route::get('admin/department/delete/{id}', 'Admin\FormOptionsController@deleteDepartment');

			# Job Title
			Route::get('admin/jobtitle', 'Admin\FormOptionsController@jobtitle')->name('jobtitle');
			Route::post('admin/jobtitle/add', 'Admin\FormOptionsController@addJobtitle');
			Route::get('admin/jobtitle/delete/{id}', 'Admin\FormOptionsController@deleteJobtitle');

			# Leave Types
			Route::get('admin/leavetype', 'Admin\FormOptionsController@leavetype')->name('leavetype');
			Route::post('admin/leavetype/add', 'Admin\FormOptionsController@addLeavetype');
			Route::get('admin/leavetype/delete/{id}', 'Admin\FormOptionsController@deleteLeavetype');

			# Leave Group
			Route::get('admin/leavegroups',  'Admin\FormOptionsController@leaveGroups')->name('leavegroup');
			Route::get('admin/leavegroups/add',  'Admin\FormOptionsController@addLeaveGroups');
			Route::post('admin/leavegroups/store',  'Admin\FormOptionsController@storeLeaveGroups');
			Route::get('admin/leavegroups/edit/{id}',  'Admin\FormOptionsController@editLeaveGroups');
			Route::post('admin/leavegroups/update',  'Admin\FormOptionsController@updateLeaveGroups');
			Route::get('admin/leavegroups/delete/{id}',  'Admin\FormOptionsController@deleteLeaveGroups');

		});

		Route::group(['middleware' => 'employee'], function () {
			/*
			|--------------------------------------------------------------------------
			| Employee Portal : Dashboard, Profile, Attendance, Schedules, Leaves, Settings
			|--------------------------------------------------------------------------
			*/
			# attendance 
			Route::get('personal/attendance', 'Personal\AttendanceController@index')->name('personal-attendance');
			Route::post('personal/attendance', 'Personal\AttendanceController@filter');

			# schedule 
			Route::get('personal/schedule', 'Personal\ScheduleController@index')->name('personal-schedule');
			Route::post('personal/schedule', 'Personal\ScheduleController@filter');

			# leave 
			Route::get('personal/leave', 'Personal\LeaveController@index')->name('personal-leave');
			Route::post('personal/leave', 'Personal\LeaveController@filter');
			Route::get('personal/leave/add', 'Personal\LeaveController@add');
			Route::post('personal/leave/request', 'Personal\LeaveController@request');
			Route::get('personal/leave/edit/{id}', 'Personal\LeaveController@edit');
			Route::post('personal/leave/update', 'Personal\LeaveController@update');
			Route::get('personal/leave/view/{id}', 'Personal\LeaveController@view');
			Route::get('personal/leave/delete/{id}', 'Personal\LeaveController@delete');

			# profile 
			Route::get('personal/profile', 'Personal\ProfileController@index')->name('personal-profile');
			Route::get('personal/profile/edit/', 'Personal\ProfileController@edit');
			Route::post('personal/profile/update', 'Personal\ProfileController@update');

			# user 
			Route::get('personal/account', 'Personal\AccountController@account')->name('personal-account');
			Route::post('personal/update/user', 'Personal\AccountController@updateUser');
			Route::post('personal/update/password', 'Personal\AccountController@updatePassword');

			# settings 
			Route::get('personal/settings', 'Personal\SettingsController@index')->name('personal-settings');
		});

	});

});


Auth::routes();
Route::get('lang/{locale}', 'LanguageController@lang');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::view('permission-denied', 'errors.permission-denied')->name('denied');
Route::view('account-disabled', 'errors.account-disabled')->name('disabled');
Route::view('account-not-found', 'errors.account-not-found')->name('notfound');