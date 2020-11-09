<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('alamat_id')->unsigned();
            $table->foreign('alamat_id')->references('id')->on('alamats');
            $table->integer('diskon_id')->unsigned();
            $table->foreign('diskon_id')->references('id')->on('diskon');

            $table->integer('kode_verifikasi')->nullable();
            $table->integer('total_harga')->nullable();
            $table->string('status')->nullable();
            $table->string('status_pesan')->nullable();
            $table->string('status_publish')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanans');
    }
}
