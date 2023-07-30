<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagihanPosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tagihan_pos', function (Blueprint $table) {
            $table->increments('id_tagihan_pos');
            $table->unsignedInteger('id_transaksi_pos');
            $table->unsignedInteger('id_barang');
            $table->integer('qty');
            $table->timestamps();
            $table->foreign('id_barang')->references('id_barang')->on('barang')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_transaksi_pos')->references('id_transaksi_pos')->on('transaksi_pos')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tagihan_pos');
    }
}
