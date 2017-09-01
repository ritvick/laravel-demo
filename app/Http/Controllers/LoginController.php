<?php

namespace laravel\Http\Controllers;

use Illuminate\Http\Request;
use laravel\Http\Requests;
use laravel\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display login page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		return view('login/index');
    }

    /**
     * Check User Login
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function doLogin(Request $request)
    {
        $response = array('status'=>'fail','msg'=>"Invalid login credentials.");
		$user = $request->input("username");
		$pass = $request->input("password");
		
		if(!empty($user) && !empty($pass )){
			if (Auth::attempt(['email' => $user, 'password' => $pass])) {
				// Authentication passed...
				$user = Auth::user();
				$response = array('status'=>'success','msg'=>"Login Success.","user"=>$user);
			}
		}
		return response()->json($response);
    }

    /**
     * User Logout
     *
     * @return \Illuminate\Http\Response
     */
    public function doLogout()
    {
        Auth::logout();
		return redirect()->intended('login');
    }

}
