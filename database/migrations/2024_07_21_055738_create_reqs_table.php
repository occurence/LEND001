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
        Schema::create('reqs', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('type')->nullable()->default('5');
            $table->integer('amount');
            $table->integer('status')->nullable()->default('2');
            $table->dateTime('time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reqs');
    }
};
