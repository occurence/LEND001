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
        Schema::create('collects', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('transact')->nullable();
            $table->integer('amount')->nullable();
            $table->date('due')->nullable();
            $table->string('comment', 1000)->nullable();
            $table->dateTime('time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collects');
    }
};
