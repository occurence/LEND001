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
        // Schema::create('procedure_acc', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
        DB::unprepared('
        DROP PROCEDURE IF EXISTS `ACC`;
        CREATE PROCEDURE `ACC`()
            BEGIN  
                SELECT r.name, u.name, u.overall FROM `ACCOUNTS` u, `ROLES` r
                WHERE u.role = r.id;
            END');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('procedure_acc');
        DB::unprepared('DROP PROCEDURE IF EXISTS `ACC`');
    }
};
