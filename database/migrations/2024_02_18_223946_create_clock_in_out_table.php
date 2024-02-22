<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('control_points', function (Blueprint $table) {
            $table->id();
            $table->date('DtHr');
            $table->time('ClockIn')->nullable();
            $table->time('LunchTimeIn')->nullable();
            $table->time('LunchTimeOut')->nullable();
            $table->time('ClockOut')->nullable();
            $table->integer('UserId')->default(0);
            $table->boolean('Status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clock_in_out');
    }
};
