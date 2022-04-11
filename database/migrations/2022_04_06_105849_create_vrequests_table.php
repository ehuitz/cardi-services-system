<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVrequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vrequests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->nullable();
            $table->decimal('days');
            $table->datetime('date_start');
            $table->datetime('date_end');
            $table->string('notes')->nullable();
            $table->boolean('eligible')->nullable();
            $table->decimal('year_eligible')->nullable();
            $table->decimal('brought_forward')->nullable();
            $table->decimal('previously_taken')->nullable();
            $table->decimal('current_eligible')->nullable();
            $table->decimal('balance_forward')->nullable();
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
        Schema::dropIfExists('vrequests');
    }
}
