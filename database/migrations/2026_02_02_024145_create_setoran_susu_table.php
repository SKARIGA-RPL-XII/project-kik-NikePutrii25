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
        Schema::create('setoran_susu', function (Blueprint $table) {

            $table->id('id_setoran');
            $table->unsignedBigInteger('id_peternak');
            $table->unsignedBigInteger('id_kelompok');

            $table->date('tgl_setor');
            $table->decimal('jumlah_setor', 10, 2);
            $table->enum('status_setor', [
                'menunggu',
                'diterima',
                'ditolak'
            ])->default('menunggu');
            $table->timestamp('created_at')->useCurrent();
            $table->foreign('id_peternak')
                  ->references('id_peternak')
                  ->on('peternak')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');

            $table->foreign('id_kelompok')
                  ->references('id_kelompok')
                  ->on('kelompok_susu')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setoran_susu');
    }
};
