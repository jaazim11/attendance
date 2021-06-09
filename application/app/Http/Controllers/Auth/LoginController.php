<?php
/*
* Workday - A time clock application for employees
* Support: official.codefactor@gmail.com
* Version: 2.0
* Author: Brian Luna
* Copyright 2021 Codefactor
* 
*/
namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    
    protected function authenticated(Request $request) 
    {
        $type = \Auth::user()->acc_type;

        if ($type == 1) 
        {
            return redirect('personal/attendance');
        } 

        if($type == 2) 
        {
            return redirect('admin/dashboard');
        } 

        if($type == null || $type == 0) 
        {
            return redirect('login');
        }
    }

    /**
     * Include status as credential.
     *
    */
    protected function credentials(\Illuminate\Http\Request $request) 
    {
         return ["email" => $request->{$this->username()}, "password" => $request->password, "status" => 1];
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Auth logout user.
     *
     */
    public function logout() 
    {
        Auth::logout();
        return redirect('login'); 
    }

    /**
     * Auth show login page
     *
     */
    public function welcome_login() 
    {
        return redirect('login');
    }
}
