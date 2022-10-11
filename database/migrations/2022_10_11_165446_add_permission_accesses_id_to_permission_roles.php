<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPermissionAccessesIdToPermissionRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permission_roles', function (Blueprint $table) {

            $table->unsignedBigInteger('permission_accesse_id')->nullable();
            $table->foreign('permission_accesse_id')->references('id')->on('permission_accesses');        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permission_roles', function (Blueprint $table) {
            $table->dropColumn('permission_accesse_id');
        });
    }
}
