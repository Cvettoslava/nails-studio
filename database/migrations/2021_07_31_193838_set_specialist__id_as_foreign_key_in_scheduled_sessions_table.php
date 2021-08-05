<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetSpecialistIdAsForeignKeyInScheduledSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scheduled_sessions', function (Blueprint $table) {
            $table->foreign('specialist_id')->references('id')->on('specialists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scheduled_sessions', function (Blueprint $table) {
            $table->dropForeign(['specialist_id']);
        });
    }
}
