<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_services', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('count')->nullable();
            $table->string('price')->default('0');
            $table->string('durday')->default('1');
            $table->string('startdate');
            $table->string('enddate');
            $table->string('recvdate')->nullable();
            $table->string('purdate')->nullable();
            $table->string('pricerecvsallary')->default('0')->nullable();
            $table->mediumText('text')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade')->onUpdate('cascade');
            $table->string('status')->default('active');
            $table->string('service_id')->nullable();
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
        Schema::dropIfExists('my_services');
    }
}
