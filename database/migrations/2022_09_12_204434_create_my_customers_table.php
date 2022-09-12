<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->nullable();
            $table->string('tell')->nullable();
            $table->string('tells')->nullable();
            $table->string('job')->nullable();
            $table->string('referal')->nullable();
            $table->string('domain')->nullable();
            $table->string('host')->nullable();
            $table->string('email')->nullable();
            $table->mediumText('text')->nullable();
            $table->string('customer_id');
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
        Schema::dropIfExists('my_customers');
    }
}
