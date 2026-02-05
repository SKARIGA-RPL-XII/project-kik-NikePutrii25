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
        Schema::create('rekap_setoran', function (Blueprint $table) {

            $table->id('id_rekap');

            $table->unsignedBigInteger('id_peternak');

            $table->tinyInteger('periode_bulan'); // 1–12
            $table->year('periode_tahun');

            $table->decimal('total_liter', 12, 2);
            $table->decimal('total_nilai', 15, 2);

            $table->dateTime('created_at');

            $table->foreign('id_peternak')
                  ->references('id_peternak')
                  ->on('peternak')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekap_setoran');
    }
};
