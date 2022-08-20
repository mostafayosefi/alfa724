<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('start_date');
            $table->date('finish_date');
            $table->longText('description')->nullable();  
            $table->string('customer_name')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('customer_mobile')->nullable();
            $table->string('customer_job')->nullable();
            $table->string('customer_provider')->nullable();
            $table->string('customer_service')->nullable();
            $table->string('price')->nullable();
            $table->string('counter')->nullable();
            $table->string('employer')->nullable(); 
            $table->string('employer_money')->nullable();  
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
        Schema::dropIfExists('projects');
    }
}
