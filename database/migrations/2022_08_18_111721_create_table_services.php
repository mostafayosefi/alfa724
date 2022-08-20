<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); 
            $table->string('description')->nullable(); 
            $table->string('start_date')->nullable(); 
            $table->string('end_date')->nullable();  
            $table->bigInteger('customer_id')->unsigned()->index()->nullable();           
            $table->bigInteger('lead')->unsigned()->index()->nullable();
            $table->string('status')->nullable(); 
            $table->integer('count')->nullable(); 
            $table->string('time')->nullable(); 
            $table->string('price')->nullable();   
            $table->string('customer_job')->nullable(); 
            $table->string('salary')->nullable(); 
            $table->string('final_date')->nullable();  
            $table->string('purchase_date')->nullable();  
            $table->bigInteger('deposit')->nullable();  
            $table->string('deposit_date')->nullable();  
            $table->string('deposit2')->nullable();  
            $table->string('deposit_date2')->nullable();  
            $table->string('deposit3')->nullable();  
            $table->string('deposit_date3')->nullable();  
            $table->string('deposit4')->nullable();  
            $table->string('deposit_date4')->nullable();  
            $table->string('deposit5')->nullable();  
            $table->string('deposit_date5')->nullable();   
            $table->string('deposit6')->nullable();  
            $table->string('deposit_date6')->nullable();  
            $table->string('deposit7')->nullable();  
            $table->string('deposit_date7')->nullable();  
            $table->string('deposit8')->nullable();  
            $table->string('deposit_date8')->nullable();  
            $table->string('deposit9')->nullable();  
            $table->string('deposit_date9')->nullable();    
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
        Schema::dropIfExists('services');
    }
}
