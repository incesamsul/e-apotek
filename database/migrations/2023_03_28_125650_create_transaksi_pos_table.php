<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiPosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_pos', function (Blueprint $table) {
            $table->increments('id_transaksi_pos');
            $table->unsignedBigInteger('id_user');
            $table->date('tgl_transaksi');
            $table->time('jam_transaksi');
            $table->integer('pembayaran');
            // $table->integer('subtotal');
            // $table->integer('tax');
            // $table->integer('total');
            // $table->enum('status', ['complete', 'cancel', 'refund']);
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_pos');
    }
}
