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
            $table->integer('pelanggan_id');
            $table->string('no_pol');
            $table->integer('user_id');
            $table->string('metode_pembayaran');
            $table->string('diskon');
            $table->string('harga_akhir');
            $table->string('no_kontrak');
            $table->string('uang_dp');
            $table->string('bulan_angsuran');
            $table->string('keterangan');
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
