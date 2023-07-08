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
        Schema::create('nppd_pegawais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nppd_id')->constrained('nota_permintaan_perjalanan_dinas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('data_pegawai_id')->constrained('data_pegawais')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('nppd_pegawais');
    }
};
