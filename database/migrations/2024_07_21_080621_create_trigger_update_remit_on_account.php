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
        // Schema::create('trigger_update_remit_on_account', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
        DB::unprepared('
        DROP TRIGGER IF EXISTS `UPDATEREMIT`;
        CREATE TRIGGER `UPDATEREMIT` AFTER INSERT ON `REMITS` FOR EACH ROW
            BEGIN  
                UPDATE `ACCOUNTS`
                SET remit = remit + NEW.AMOUNT
                WHERE ID = NEW.USER;
            END');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('trigger_update_remit_on_account');
        DB::unprepared('DROP TRIGGER IF EXISTS `UPDATEREMIT`');
    }
};
