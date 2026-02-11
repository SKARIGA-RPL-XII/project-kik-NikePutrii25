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
        Schema::create('pembayaran', function (Blueprint $table) {

            $table->id('id_transaksi');

            $table->unsignedBigInteger('id_rekap');

            $table->decimal('potongan', 12, 2)->default(0);
            $table->decimal('total_bersih', 15, 2);
            $table->date('tanggal_pembayaran');

            $table->foreign('id_rekap')
                  ->references('id_rekap')
                  ->on('rekap_setoran')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
