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
        Schema::table('transaksi', function (Blueprint $table) {
            $table->string('kendaraan_no_pol')->after('pelanggan_id')->required();
            $table->foreign('kendaraan_no_pol')->references('no_pol')->on('kendaraan')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropForeign(['kendaraan_no_pol']);
            $table->dropColumn('kendaraan_no_pol');
        });
    }
};
