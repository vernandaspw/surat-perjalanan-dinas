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
        Schema::create('data_pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('img', 80)->nullable();
            $table->string('nama', 40);
            $table->string('nip', 20)->nullable();
            $table->enum('jk', ['l', 'p']);
            $table->string('no_hp', 17)->nullable();
            $table->string('email', 50)->nullable();
            $table->longText('alamat')->nullable();
            $table->string('jabatan', 30)->nullable();
            $table->string('bidang', 30)->nullable();
            $table->boolean('status_aktif')->default(true);
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
        Schema::dropIfExists('data_pegawais');
    }
};
