<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterStatusFollowUpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('follow_up', function (Blueprint $table) {
            //
            $table->dropColumn('status');
        });
        Schema::table('follow_up', function (Blueprint $table) {
            $table->enum('status',['uncontacted','pending','qualified','lost'])->after('remarks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('follow_up', function (Blueprint $table) {
            //
        });
    }
}
