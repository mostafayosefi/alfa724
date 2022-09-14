<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingSmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_sms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('api')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('token')->nullable();
            $table->string('url')->nullable();
            $table->string('status')->default('inactive');
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
        Schema::dropIfExists('setting_sms');
    }
}
