<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_id');
            $table->foreign('store_id')->reference('id')->on('stores');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->reference('id')->on('categories');
            $table->string('nama_produk');
            $table->integer('harga_produk');
            $table->text('deskripsi_produk');
            $table->string('foto_produk');
            $table->enum('tampilkan_produk', ['ya', 'tidak']);
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
        Schema::dropIfExists('products');
    }
}
