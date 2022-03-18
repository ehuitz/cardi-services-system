<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('content');
            $table->foreignId('country_id');
            $table->foreignId('department_id')->nullable();
            $table->foreignId('author_id');
            $table->foreignId('category_id');
            $table->foreignId('status_id');
            $table->string('phone')->nullable();
            $table->string('position')->nullable();
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->string('activities')->nullable();
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
        Schema::dropIfExists('tickets');
    }
}
