<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->reference('id')->on('users');
            $table->string('nama_toko', 50);
            $table->string('no_telp_toko', 15);
            $table->string('akun_instagram', 30)->nullable();
            $table->string('akun_facebook', 30)->nullable();
            $table->text('alamat_toko');
            $table->text('deskripsi_toko')->nullable();
            $table->string('foto_profile_toko')->nullable();
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
        Schema::dropIfExists('stores');
    }
}
