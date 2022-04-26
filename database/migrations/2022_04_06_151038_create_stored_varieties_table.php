<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoredVarietiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stored_varieties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('storage_id')->nullable();
            $table->foreignId('variety_field_id')->nullable();
            $table->foreignId('variety_id')->nullable();
            $table->string('quantity')->unique();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('stored_varieties');
    }
}
