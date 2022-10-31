<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_systems', function (Blueprint $table) {
            $table->id();
            $table->string('price')->default('0')->nullable(); 
            $table->string('date')->nullable();
            $table->string('miladi')->nullable();
            $table->string('type')->default('deposit');
            $table->string('status')->default('active');
            $table->string('for')->nullable();
            $table->longText('description')->nullable();
            $table->string('name_send')->nullable();
            $table->string('name_recv')->nullable();
            $table->string('intype')->nullable();
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
        Schema::dropIfExists('price_systems');
    }
}
