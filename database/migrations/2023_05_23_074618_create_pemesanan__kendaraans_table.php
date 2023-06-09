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
        Schema::create('pemesanan_kendaraans', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('driver_id');
            $table->unsignedBigInteger('kendaraan_id');
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tambang_id');

            //FK
            $table->foreign('driver_id')->references('id')->on('drivers');
            $table->foreign('kendaraan_id')->references('id')->on('kendaraans');
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('tambang_id')->references('id')->on('tambangs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan_kendaraans');
    }
};
