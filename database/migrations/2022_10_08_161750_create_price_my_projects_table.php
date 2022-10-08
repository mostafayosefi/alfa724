<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceMyProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_my_projects', function (Blueprint $table) {
            $table->id();
            $table->string('price')->default('0')->nullable();
            $table->string('text')->nullable();
            $table->string('date')->nullable();
            $table->string('miladi')->nullable();
            $table->string('type')->default('deposit');
            $table->string('status')->default('active');
            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('price_my_projects');
    }
}
