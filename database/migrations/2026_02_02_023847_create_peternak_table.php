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
        Schema::create('peternak', function (Blueprint $table) {

            $table->id('id_peternak');
            $table->unsignedBigInteger('id_user');
            $table->text('alamat');
            $table->string('no_hp', 15);
            $table->date('tanggal_gabung');
            $table->tinyInteger('status_peternak')->default(1);

            $table->foreign('id_user')
                  ->references('id_user')
                  ->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peternak');
    }
};
