<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFeildScoreSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('score_settings', function (Blueprint $table) {
            $table->string('value_award')->nullable();
            $table->string('text_value_award')->nullable();
            $table->string('price')->nullable();
            $table->string('text_price')->nullable();
            $table->string('price_award')->nullable();
            $table->string('text_price_award')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('score_settings', function (Blueprint $table) {
            $table->dropColumn('value_award');
            $table->dropColumn('text_value_award');
            $table->dropColumn('price');
            $table->dropColumn('text_price');
            $table->dropColumn('price_award');
            $table->dropColumn('text_price_award');
        });
    }
}
