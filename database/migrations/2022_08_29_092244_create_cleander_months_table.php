<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCleanderMonthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cleander_months', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('month');
            $table->string('weekdayfirst');
            $table->string('datefirst');
            $table->string('countdayprev');
            $table->string('countdaymonth');
            $table->foreignId('cleander_year_id')->constrained('cleander_years')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('cleander_months');
    }
}
