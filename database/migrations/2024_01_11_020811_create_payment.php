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
        Schema::create('payment', function (Blueprint $table) {
            $table->id();
            $table->string('invoice');
            $table->bigInteger('kodeImage')->unsigned();
            $table->bigInteger('buyer')->unsigned()->default(null);
            $table->bigInteger('seller')->unsigned()->default(null);
            $table->integer('price')->default(null);
            $table->integer('status')->default(null);
            $table->timestamps();

            $table->foreign('buyer')->references('idUser')->on('users')->onDelete('cascade');
            $table->foreign('seller')->references('idUser')->on('users')->onDelete('cascade');
            $table->foreign('kodeImage')->references('idPost')->on('post')->onDelete('cascade');
            // $table->foreign('postCategory')->references('kodeKategori')->on('kategori');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};
