<?php

namespace laravel\Http\Controllers;

use Illuminate\Http\Request;

use laravel\Http\Requests;
use laravel\Http\Controllers\Controller;
use JWTAuth;
use Mail;
use laravel\User;
use JWTAuthException;
use laravel\Models\Employee;


class ApiController extends Controller
{
    private $user;
	
	
	public function __construct(User $user){
        $this->user = $user;
    }
	
	/**
     * Check User Login
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response, Generate token and return to user for other api call
     */
	public function login(Request $request){
        $credentials = $request->only('email', 'password');
        $token = null;
        try {
           if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['invalid_email_or_password'], 422);
           }
        } catch (JWTAuthException $e) {
            return response()->json(['failed_to_create_token'], 500);
        }
        return response()->json(array('token' => $token, 'valid' => true));
    }
	
	/**
     * Check User Login
     *
     * @param  \Illuminate\Http\Request  $request, token for authorisation
     * @return \Illuminate\Http\Response
     */
	public function get_employee(Request $request){
		$emp_modal = new Employee();
		if(!empty($request->input('id'))){
			$employee = $emp_modal->fetch_single($request->input('id'));
		}else{
			$employee = $emp_modal->fetch_all();
		}        
        return response()->json(['status'=>true,'message'=>'Employee List','data'=>$employee]);
    }
	
	/**
     * Check User Login
     *
     * @param  \Illuminate\Http\Request  $request, token for authorisation
     * @return \Illuminate\Http\Response
     */
	public function delete_employee(Request $request){
		$emp_modal = new Employee();
		$response = array();
		if(!empty($request->input('id'))){
			$action = $emp_modal->delete_user($request->input('id'));
			if($action){
				$response = array('status'=>true,'message'=>"Employee deleted successfully.");
			}else{
				$response = array('status'=>false,'message'=>"Problem in employee deletion. Please try after some time.");
			}
		}else{
			$response = array('status'=>false,'message'=>"Invalid argument.");
		}        
        return response()->json($response);
    }
	
	/**
     * Check User Login
     *
     * @param  \Illuminate\Http\Request  $request, token for authorisation
     * @return \Illuminate\Http\Response
     */
	public function addupdate_employee(Request $request){
		$emp_modal = new Employee();
		$sqlData=array(
			"emp_name"=>$request->input('emp_name'),
			"emp_email"=>$request->input('emp_email'),
			"emp_dob"=>$request->input('emp_dob'),
			"emp_address"=>$request->input('emp_address'),
			"emp_city"=>$request->input('emp_city'),
			"emp_state"=>$request->input('emp_state'),
			"emp_country"=>$request->input('emp_country'),
			"emp_pincode"=>$request->input('emp_pincode')
		);
		$response = array();
		if(!empty($request->input('employee_id'))){
			$action = $emp_modal->update_user($request->input('employee_id'),$sqlData);
			if($action){
				$response = array('status'=>true,'message'=>'Employee updated successfully.');
			}else{
				$response = array('status'=>false,'message'=>'Problem in updating employee. Please try after some time.');
			}
		}else{
			$action = $emp_modal->insert_user($sqlData);
			if($action){
				$data = array(
					'name' => $request->input('emp_name'),
				);
				/*Send Mail to New Employee*/
				// Mail::send('emails.welcome', $data, function ($message) {
				// 	$message->from('patel.tejas.mca@gmail.com', 'Tejas Patel');
				// 	$message->to('ritvick.paliwal@gmail.com@gmail.com')->subject('Employee Added');
				// });
				$response = array('status'=>true,'message'=>"Employee added successfully.");
			}else{
				$response = array('status'=>false,'message'=>'Problem in adding employee. Please try after some time.');
			}
		}
        return response()->json($response);
    }
	
	/**
     * Get Authorised User Information 
     *
     * @param  \Illuminate\Http\Request  $request, token for authorisation
     * @return \Illuminate\Http\Response
     */
	public function getAuthUser(Request $request){
    	$input = $request->all();
    	$user = JWTAuth::toUser($input['token']);
        return response()->json(['result' => $user]);
    }
}
