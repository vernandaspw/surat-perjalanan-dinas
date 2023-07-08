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
        Schema::create('arsips', function (Blueprint $table) {
            $table->id();
            $table->string('No', 10);
            $table->date('Tanggal');
            $table->string('Perihal', 60);
            $table->string('No_Rak', 5);
            $table->text('Foto');
            $table->foreignId('kantor_id')->constrained('kantors')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('bidang_id')->constrained('bidangs')->onUpdate('cascade')->onDelete('cascade');
            // $table->unsigenedBigInteger('bidang');
            // $table->foregin('bidang')->references('Id')->on('bidangs')->onDelete('cascade');
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
        Schema::dropIfExists('arsips');
    }
};
