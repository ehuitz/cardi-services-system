<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStorageMaintenanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storage_maintenance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('storage_id')->nullable();
            $table->string('treatment_type')->nullable();
            $table->string('treatment')->nullable();
            $table->string('dosage')->nullable();
            $table->date('date')->nullable();
            $table->string('reentry_date')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('storage_maintenance');
    }
}
