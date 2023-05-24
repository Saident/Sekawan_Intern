<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->string('admin');
            $table->string('kendaraan');
            $table->unsignedBigInteger('kendaraan_id');
            $table->string('lokasi');
            $table->unsignedBigInteger('pemesanan_id');
            $table->dateTime('tanggal_pemesanan')->nullable();
            $table->dateTime('tanggal_pengembalian')->nullable();
            $table->dateTime('tanggal_ditolak')->nullable();
            $table->timestamps();   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
};
