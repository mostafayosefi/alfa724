<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFeildsToCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->string('job')->nullable()->after('id');
            $table->string('code')->nullable()->after('id');
            $table->string('tell')->nullable()->after('id');
            $table->string('tells')->nullable()->after('id');
            $table->string('referal')->nullable()->after('id');
            $table->string('name')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('tell');
            $table->dropColumn('tells');
            $table->dropColumn('referal');
            $table->dropColumn('code');
            $table->dropColumn('job');

        });
    }
}
