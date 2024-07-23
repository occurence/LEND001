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
        // Schema::create('trigger_update_principal_on_account', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
        DB::unprepared('
        DROP TRIGGER IF EXISTS `UPDATEPRINCIPAL`;
        CREATE TRIGGER `UPDATEPRINCIPAL` AFTER INSERT ON `TRANSACTS` FOR EACH ROW
            BEGIN  
                UPDATE `ACCOUNTS`
                SET principal = principal + NEW.AMOUNT
                WHERE ID = NEW.USER;
            END');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('trigger_update_principal_on_account');
        DB::unprepared('DROP TRIGGER IF EXISTS `UPDATEPRINCIPAL`');
    }
};
