<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCleanderDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cleander_days', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('day');
            $table->enum('holiday', ['true', 'false' ])->default('false');
            $table->foreignId('cleander_month_id')->constrained('cleander_months')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('cleander_days');
    }
}
