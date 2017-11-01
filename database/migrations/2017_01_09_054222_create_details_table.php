<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('vNo')->unsigned();
            $table->integer('Sno');
            $table->integer('Code')->unsigned();
            $table->double('Amount');
            $table->string('Naration');

            $table->foreign('vNo')
                  ->references('vNo')
                  ->on('vouchers')
                  ->onDelete('cascade');
            $table->foreign('Code')
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
        Schema::dropIfExists('details');
    }
}
