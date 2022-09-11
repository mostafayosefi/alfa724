<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCleanderDayPhasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cleander_day_phases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('phase_id')->constrained('phases')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('cleander_day_id')->constrained('cleander_days')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('cleander_day_phases');
    }
}
