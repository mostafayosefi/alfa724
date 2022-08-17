<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name')->nullable();
            $table->string('customer_code')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('customer_mobile')->nullable();
            $table->string('customer_job')->nullable();
            $table->string('customer_provider')->nullable();
            $table->string('domain')->nullable();
            $table->string('host')->nullable();
            $table->string('email')->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
