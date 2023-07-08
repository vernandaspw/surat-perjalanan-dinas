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
        Schema::create('nota_permintaan_perjalanan_dinas', function (Blueprint $table) {
            $table->id();
            $table->text('tempat_tujuan');
            $table->text('perihal');
            $table->enum('status', ['menunggu', 'disetujui', 'ditolak']);
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
        Schema::dropIfExists('nota_permintaan_perjalanan_dinas');
    }
};
