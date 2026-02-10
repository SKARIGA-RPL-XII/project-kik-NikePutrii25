<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('setoran_susu', function (Blueprint $table) {
            $table->enum('waktu_setor', ['pagi', 'sore'])
                  ->after('tgl_setor');

            $table->decimal('kadar_air', 5, 2)
                  ->nullable()
                  ->after('jumlah_setor');
        });
    }

    public function down()
    {
        Schema::table('setoran_susu', function (Blueprint $table) {
            $table->dropColumn(['waktu_setor', 'kadar_air']);
        });
    }
};
