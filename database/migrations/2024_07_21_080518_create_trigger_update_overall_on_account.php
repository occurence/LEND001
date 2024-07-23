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
        // Schema::create('trigger_update_overall_on_account', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
        DB::unprepared('
        DROP TRIGGER IF EXISTS `UPDATEOVERALL`;
        CREATE TRIGGER `UPDATEOVERALL` AFTER INSERT ON `TRANSACTS` FOR EACH ROW
            BEGIN  
                UPDATE `ACCOUNTS`
                SET overall = overall + NEW.COMPUTED
                WHERE ID = NEW.USER;
            END');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('trigger_update_overall_on_account');
        DB::unprepared('DROP TRIGGER IF EXISTS `UPDATEOVERALL`');
    }
};
