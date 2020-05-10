<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStreamSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stream_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('publishing_point_type')->nullable();
            $table->string('publishing_point_primary')->nullable();
            $table->string('publishing_point_backup')->nullable();
            $table->string('stream_name')->nullable();
            $table->string('login')->nullable();
            $table->string('password')->nullable();
            $table->string('live_transcoding')->nullable();
            $table->string('region')->nullable();
            $table->unsignedBigInteger('organisor_id')->nullable();
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
        Schema::dropIfExists('stream_settings');
    }
}
