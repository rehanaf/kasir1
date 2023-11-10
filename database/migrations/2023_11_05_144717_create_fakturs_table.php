<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('faktur', function (Blueprint $table) {
            $table->string('faktur');
            $table->string('nama');
            $table->string('harga_beli');
            $table->string('harga_jual');
            $table->integer('jumlah');
        });
        
        DB::table('faktur')->insert(
            [
            'faktur'=>'1',
            'nama'=>'NULL',
            'harga_beli'=> '1','harga_jual'=> '1','jumlah'=> '1'
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faktur');
    }
};
