<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_lists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('status')->default('inactive');
            $table->string('link');
            $table->mediumText('text_default')->nullable();
            $table->foreignId('notification_service_id')->constrained('notification_services')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('notification_type_id')->constrained('notification_types')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('notification_lists');
    }
}
