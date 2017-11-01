<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('vNo')->unique()->unsigned();
            $table->date('vDate');
            $table->string('vType');
            $table->integer('accCode')->unsigned();
            $table->string('PrepBy');
            $table->string('AuthBy');

            $table->foreign('PrepBy')
                  ->references('EmpID')
                  ->on('employees');
            $table->foreign('AuthBy')
                ->references('EmpID')
                ->on('employees');
            $table->foreign('accCode')
                  ->references('Code')
                  ->on('accounts')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vouchers');
    }
}
