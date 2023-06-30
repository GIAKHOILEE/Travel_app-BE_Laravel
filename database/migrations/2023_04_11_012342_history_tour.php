<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HistoryTour extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('history_tour', function (Blueprint $table) {
            $table->id();
            $table->integer('tour_id');
            $table->integer('user_id');
            $table->string('tour_name');
            $table->date('date_history');
            $table->integer('price');
            $table->string('status_tour');
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
        Schema::dropIfExists('history_tour');
    }
}
