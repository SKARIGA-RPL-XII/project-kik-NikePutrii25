<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('verifikasi_setoran', function (Blueprint $table) {

            $table->id('id_verif');

            $table->unsignedBigInteger('id_setoran');
            $table->unsignedBigInteger('id_user');

            $table->enum('status_verif', ['diterima', 'ditolak']);
            $table->dateTime('tgl_verif');
            $table->text('catatan')->nullable();

            $table->foreign('id_setoran')
                  ->references('id_setoran')
                  ->on('setoran_susu')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');

            $table->foreign('id_user')
                  ->references('id_user')
                  ->on('users')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verifikasi_setoran');
    }
};
