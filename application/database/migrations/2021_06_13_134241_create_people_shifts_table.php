<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people_shifts', function (Blueprint $table) {
            $table->id();
            $table->integer('reference');
            $table->integer('sunday_shift')->nullable();
            $table->integer('monday_shift')->nullable();
            $table->integer('tuesday_shift')->nullable();
            $table->integer('wednesday_shift')->nullable();
            $table->integer('thursday_shift')->nullable();
            $table->integer('friday_shift')->nullable();
            $table->integer('saturday_shift')->nullable();
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
        Schema::dropIfExists('people_shifts');
    }
}
