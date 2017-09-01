<?php

namespace laravel\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Employee extends Model
{
	function fetch_all(){
		return DB::select('select * from mst_employee');
	}
	
	function fetch_single($id){
		return DB::table('mst_employee')->where('employee_id', $id)->first();
	}
	
	function insert_user($sqlData){
		return DB::table('mst_employee')->insert($sqlData);
	}
	
	function update_user($id,$sqlData){
		return DB::table('mst_employee')->where('employee_id', $id)->update($sqlData);
	}
	
	function delete_user($id){
		return DB::table('mst_employee')->where('employee_id', $id)->delete();;
	}
}
