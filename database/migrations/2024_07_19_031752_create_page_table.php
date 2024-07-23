<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('page', function (Blueprint $table) {
            $table->id();
            $table->string('judul'); // Tambahkan tanda kutip di sini
            $table->string('subjudul'); // Tambahkan tanda kutip di sini
            $table->string('foto'); // Tambahkan tanda kutip di sini
            $table->enum('role', ['hilmi', 'erlangga']); // Menggunakan tipe enum dengan opsi 'hilmi' dan 'erlangga'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('page');
    }
}
