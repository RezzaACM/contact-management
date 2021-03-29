<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowUpLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follow_up_logs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('follow_up');
            $table->bigInteger('user_id');
            $table->string('user_name', 50);
            $table->bigInteger('customer_id');
            $table->string('customer_name', 50);
            $table->string('status', 12);
            $table->text('remarks');
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
        Schema::dropIfExists('follow_up_logs');
    }
}
