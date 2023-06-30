<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tour extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tour', function (Blueprint $table) {
            $table->id();
            $table->string('tour_name')->unique();
            $table->string('img');
            $table->string('description');
            $table->date('date_start');
            $table->date('date_end');
            $table->string('max_people');
            $table->integer('price');
            $table->string('detail');
            $table->string('type_tour');
            $table->string('location');
            $table->rememberToken();
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
        //
        Schema::dropIfExists('tour');
    }
}
