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
        Schema::create('foto_landing', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('foto');
            $table->string('harga_jual');
            $table->text('deskripsi');
            $table->string('kilometer');
            $table->integer('bulan');
            $table->string('dp');
            $table->string('angsuran');
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
        Schema::dropIfExists('foto_landing');
    }
};
