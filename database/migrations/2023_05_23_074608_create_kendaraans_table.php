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
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis');
            $table->string('status');
            $table->string('kepemilikan');
            $table->integer('bbm')->nullable();
            $table->dateTime('jadwal_service')->nullable();
            $table->dateTime('riwayat_pemakaian')->nullable();

            $table->unsignedBigInteger('tambang_id');

            //FK
            $table->foreign('tambang_id')->references('id')->on('tambangs');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
