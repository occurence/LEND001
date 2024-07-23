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
        Schema::create('transacts', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('category')->nullable()->default('1');
            $table->integer('user');
            $table->integer('amount');
            $table->decimal('interest', 5,2)->nullable()->default('0.1');
            $table->integer('computed')->nullable();
            $table->string('reference')->default('');//->unique()
            $table->integer('request')->nullable();
            $table->integer('mode')->default('1');
            $table->integer('status')->default('5');
            $table->dateTime('time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transacts');
    }
};
