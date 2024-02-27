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
        Schema::create('post', function (Blueprint $table) {
            $table->id('idPost')->index();
            $table->string('postTitle', 255);
            $table->bigInteger('kodeUser')->unsigned();
            $table->bigInteger('postCategory')->unsigned();
            $table->string('postImage', 255);
            $table->mediumText('postUrl')->nullable();
            $table->integer('price')->nullable();
            $table->integer('status');
            $table->timestamps();

            $table->foreign('kodeUser')->references('idUser')->on('users')->onDelete('cascade');
            $table->foreign('postCategory')->references('idKategori')->on('kategori')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
