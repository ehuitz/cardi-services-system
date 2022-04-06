<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->primary('asset_tag');
            $table->string('asset_tag')->unique();
            $table->date('acquired_at')->nullable();
            $table->string('model_no')->nullable();
            $table->foreignId('project_id')->nullable();
            $table->string('room_no')->nullable();
            $table->string('type')->nullable();
            $table->foreignId('department_id')->nullable();
            $table->string('serial_number')->unique()->nullable();
            $table->string('mac_address')->unique()->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('devices');
    }
}
