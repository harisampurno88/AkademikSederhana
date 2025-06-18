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
        Schema::create('nilai', function (Blueprint $table) {
            $table->integer('id_nilai')->primary();
            $table->integer('id_mahasiswa');
            $table->foreign('id_mahasiswa')
                ->references('id_mahasiswa')
                ->on('mahasiswa')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('id_mk');
            $table->foreign('id_mk')
                ->references('id_mk')
                ->on('matakuliah')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('nilai_quiz');
            $table->string('nilai_uts');
            $table->string('nilai_uas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};
