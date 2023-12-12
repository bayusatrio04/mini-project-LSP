<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Add a column 'update_done' to events table
        Schema::table('events', function (Blueprint $table) {
            $table->boolean('update_done')->default(false);
        });

        // Create or replace the scheduled event to run every 1 second
        DB::unprepared('
            CREATE OR REPLACE EVENT daily_update_transaction
            ON SCHEDULE EVERY 1 SECOND
            STARTS CURRENT_TIMESTAMP
            DO
              BEGIN
                -- Your SQL statements here
                UPDATE transactions
                SET status_transaction = 2
                WHERE status_transaction = 0 AND TIMESTAMPDIFF(DAY, created_at, NOW()) >= 1;

                -- Update events table only once
                UPDATE events
                SET total_tickets = total_tickets + (
                    SELECT SUM(qty) 
                    FROM transactions 
                    WHERE id_event = events.id
                ),
                update_done = true
                WHERE update_done = false;
              END
        ');
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop the scheduled event
        DB::unprepared('DROP EVENT IF EXISTS daily_update_transaction');

        // Remove the 'update_done' column from events table
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('update_done');
        });
    }
};
