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
        Schema::create('surat_perintah_perjalanan_dinas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('spt_id')->constrained('surat_perintah_tugas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('data_pegawai_id')->constrained('data_pegawais')->onUpdate('cascade')->onDelete('cascade');
            $table->string('no',20);
            $table->string('pejabat_pemberi_perintah', 40);
            $table->date('tgl_berangkat');
            $table->date('tgl_kembali');
            $table->decimal('total',13,2)->default(0);
            $table->longText('keterangan')->nullable();
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
        Schema::dropIfExists('surat_perintah_perjalanan_dinas');
    }
};
