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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_event')->nullable();
            $table->foreign('id_event')->references('id')->on('events')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->integer('qty')->nullable();
            $table->integer('total_transaction')->nullable();
            $table->integer('status_transaction')->default(0);
            $table->integer('refund')->default(0);
            $table->string('bukti_bayar')->nullable();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
