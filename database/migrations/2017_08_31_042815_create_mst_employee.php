<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstEmployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_employee', function (Blueprint $table) {
            $table->increments('employee_id')->unsigned();
			$table->string('emp_name');
			$table->date('emp_dob')->nullable();
			$table->text('emp_address')->nullable();
			$table->string('emp_city',30)->nullable();
			$table->string('emp_state',30)->nullable();
			$table->string('emp_country',30)->nullable();
			$table->string('emp_pincode',5)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mst_employee');
    }
}
