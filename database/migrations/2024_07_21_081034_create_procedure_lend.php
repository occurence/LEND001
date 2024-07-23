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
        // Schema::create('procedure_lend', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
        DB::unprepared('
        DROP PROCEDURE IF EXISTS `LEND`;
        CREATE PROCEDURE `LEND`()
            BEGIN
                SELECT l.id lend, l.date, u.name, r.name, l.amount, u.overall, l.reference, l.timestamp
                FROM `transact` L LEFT JOIN `ACCOUNTS` u
                ON  l.user = u.id
                LEFT JOIN `ROLES` r
                ON u.role = r.id
                order by l.id desc;
            END');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('procedure_lend');
        DB::unprepared('DROP PROCEDURE IF EXISTS `LEND`');
    }
};
