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
        Schema::create('rincian_biayas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sppd_id')->constrained('surat_perintah_perjalanan_dinas')->onUpdate('cascade')->onDelete('cascade');
            $table->text('keterangan');
            $table->decimal('biaya', 13,2)->default(0);
            $table->string('struk', 80)->nullable();
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
        Schema::dropIfExists('rincian_biayas');
    }
};
