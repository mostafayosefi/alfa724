<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFeil3dPriceMyProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('price_my_projects', function (Blueprint $table) {
            $table->string('for')->nullable();
            $table->longText('description')->nullable();
            $table->string('name_send')->nullable();
            $table->string('name_recv')->nullable();
            $table->string('intype')->nullable();
            $table->text('file')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('price_my_projects', function (Blueprint $table) {
            $table->dropColumn('for');
            $table->dropColumn('description');
            $table->dropColumn('name_send');
            $table->dropColumn('name_recv');
            $table->dropColumn('intype');
            $table->dropColumn('file');
        });
    }
}
