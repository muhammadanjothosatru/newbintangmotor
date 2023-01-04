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
        Schema::table('foto_landing', function (Blueprint $table) {
            //
            $table->string('no_pol')->after('id')->required();
            $table->foreign('no_pol')->references('no_pol')->on('kendaraan')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('foto_landing', function (Blueprint $table) {
            //
            $table->dropForeign(['no_pol']);
            $table->dropColumn('no_pol');
        });
    }
};
