<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('EmpID')->unique();
            $table->string('FName');
            $table->string('LName');
            $table->string('Address');
            $table->string('PhoneNo');
            $table->string('SuperID');
            $table->rememberToken();
            $table->timestamps();

//            $table->foreign('SuperID')
//                  ->references('EmpID')
//                  ->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employees');
    }
}
