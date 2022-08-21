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
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_user');
            $table->string('nama_pemilik');
            $table->string('alamat');
            $table->string('merk');
            $table->string('tipe');
            $table->string('jenis');
            $table->string('model');
            $table->string('tahun_pembuatan');
            $table->string('daya_listrik');
            $table->string('no_rangka');
            $table->string('no_mesin');
            $table->string('warna');
            $table->string('tahun_registrasi');
            $table->string('no_bpkb');
            $table->string('status_kendaraan');
            $table->string('cabang');
            $table->string('harga_beli');
            $table->string('tanggal_masuk');
            $table->string('supplier');
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
        Schema::dropIfExists('kendaraan');
    }
};
