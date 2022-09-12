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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('metode_pembayaran');
            $table->string('diskon');
            $table->string('harga_akhir');
            $table->string('no_kontrak')->default('-');
            $table->string('uang_dp')->default('-');
            $table->string('bulan_angsuran')->default('-');
            $table->string('keterangan')->default('Belum ACC');
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
        Schema::dropIfExists('transaksi');
    }
};
