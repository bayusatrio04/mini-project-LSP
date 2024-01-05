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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('gender')->nullable();
            $table->string('no_telp')->nullable();
            $table->text('alamat_lengkap');
            $table->unsignedBigInteger('id_provinsi');
            $table->unsignedBigInteger('id_kabupaten_kota');
            $table->unsignedBigInteger('id_agama');
            $table->integer('ages')->nullable();
            $table->boolean('isAdmin')->default(false);

            $table->text('user_picture')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_provinsi')->references('id')->on('provinsi');
            $table->foreign('id_kabupaten_kota')->references('id')->on('kabupaten_kota');
            $table->foreign('id_agama')->references('id')->on('agama');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
