<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduledSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scheduled_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('phone', 12);
            $table->enum('service', ['Basic Polish', 'Shellac', 'Acrylic']);
            $table->dateTime('scheduled_time');
            $table->timestamps(); # created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scheduled_sessions');
    }
}
