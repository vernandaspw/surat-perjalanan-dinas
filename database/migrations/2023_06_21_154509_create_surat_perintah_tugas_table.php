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
        Schema::create('surat_perintah_tugas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nppd_id')->constrained('nota_permintaan_perjalanan_dinas')->onUpdate('cascade')->onDelete('cascade');
            $table->string('no',20);
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
        Schema::dropIfExists('surat_perintah_tugas');
    }
};
