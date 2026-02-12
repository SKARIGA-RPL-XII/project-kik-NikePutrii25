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
        Schema::create('harga_susu', function (Blueprint $table) {

            $table->id('id_harga');

            $table->unsignedBigInteger('id_kelompok');

            $table->decimal('harga_per_liter', 10, 2);
            $table->date('tanggal_berlaku');

            $table->enum('status', ['aktif', 'nonaktif'])
                  ->default('aktif');

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
        Schema::dropIfExists('harga_susu');
    }
};
