<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('driver');
            $table->string('owner')->nullable();
            $table->string('tel_d');
            $table->string('tel_o')->nullable();
            $table->unsignedInteger('car_id')->nullable();
            $table->string('car_number');
            $table->unsignedInteger('branch_id')->nullable();
            $table->date('c_start');
            $table->date('c_end');
            $table->unsignedInteger('l_cost')->nullable();
            $table->date('l_start');
            $table->date('l_end');
            $table->json('status')->nullable();
            $table->integer('index')->default(0);
            $table->date('expire_date')->nullable();
//            oylik to'lov
            $table->unsignedInteger('payment');
            $table->integer('account')->default(0);
            $table->string('inn')->nullable();
            $table->string('inps')->nullable();
            $table->string('inn_o')->nullable();
            $table->string('inps_o')->nullable();
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('set null');
            $table->softDeletes();
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
        Schema::dropIfExists('drivers');
    }
}
