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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');

            $table->string('category_events')->nullable();
            $table->string('subCategory_events')->nullable();

            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('location');
            $table->integer('ticket_price');
            $table->integer('total_tickets');
            $table->integer('sold_tickets')->default(0);
            $table->string('image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
