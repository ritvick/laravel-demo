<?php

namespace laravel\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use laravel\Http\Requests;
use laravel\Http\Controllers\Controller;
use laravel\Models\Employee;

class EmployeeController extends Controller{
	
	public function get_list(){
		$emp_modal = new Employee();
		$employee = $emp_modal->fetch_all();
		//print_r($employee);
		return view('employee/list',['employee'=>$employee]);
	}
	public function get_all_employee(){
		$emp_modal = new Employee();
		$response = array('status'=>'fail','msg'=>"Operation failed. Please try after some time.");
		$employee = $emp_modal->fetch_all();
		$response = array('status'=>'success','data'=>$employee);
		return response()->json($response);
	}
	
	public function addedit($id=""){
		$emp_modal = new Employee();
		$employee = array();
		if(!empty($id)){
			$employee = $emp_modal->fetch_single($id);
		}
		return view('employee/addedit',['employee'=>$employee]);
	}
	
	public function get($id=""){
		$emp_modal = new Employee();
		$response = array('status'=>'fail','msg'=>"Operation failed. Please try after some time.");
		$employee = array();
		if(!empty($id)){
			$employee = $emp_modal->fetch_single($id);
			$response = array('status'=>'success','data'=>$employee);
		}
		return response()->json($response);
	}
	
	public function save(Request $request){
		$emp_modal = new Employee();
		$response = array('status'=>'fail','msg'=>"Operation failed. Please try after some time.");
		$id = $request->input('employee_id');
		$emp_email = $request->input('emp_email');
		$sqlData=array(
			"emp_name"=>$request->input('emp_name'),
			"emp_email"=>$emp_email,
			"emp_dob"=>$request->input('emp_dob'),
			"emp_address"=>$request->input('emp_address'),
			"emp_city"=>$request->input('emp_city'),
			"emp_state"=>$request->input('emp_state'),
			"emp_country"=>$request->input('emp_country'),
			"emp_pincode"=>$request->input('emp_pincode')
		);
		if(!empty($id)){
			// Edit Employee
			$action = $emp_modal->update_user($id,$sqlData);			
			if($action){
				$response = array('status'=>'success','msg'=>"Employee updated successfully.");
			}
		}else{
			// Add Employee
			$action = $emp_modal->insert_user($sqlData);
			if($action){
				$data = array(
					'name' => $request->input('emp_name'),
					'email' => $request->input('emp_name'),
				);
				/*Send Mail to New Employee*/
				Mail::send('emails.welcome', $data, function ($message) {
					$message->from('patel.tejas.mca@gmail.com', 'Tejas Patel');
					$message->to('patel.tejas.mca@gmail.com');
					$message->subject('Employee Added');
				});
				$response = array('status'=>'success','msg'=>"Employee added successfully.");
			}
		}
		return response()->json($response);
	}
	
	public function destroy($id){
		$emp_modal = new Employee();
		$response = array('status'=>'fail','msg'=>"Operation failed. Please try after some time.");
		if(!empty($id)){
			// Delete Employee
			$action = $emp_modal->delete_user($id);
			if($action){
				$response = array('status'=>'success','msg'=>"Employee deleted successfully.");
			}
		}
		return response()->json($response);
	}
}
