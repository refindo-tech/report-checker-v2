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
        Schema::create('final_reports', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('reviewer_id')->nullable();
            $table->string('status')->nullable();
            $table->string('laprak')->nullable();
            $table->string('sertifikat')->nullable();
            $table->string('dokumentasi')->nullable();
            $table->string('feedback')->nullable();
            $table->boolean('laprak_status')->nullable();
            $table->boolean('sertifikat_status')->nullable();
            $table->boolean('dokumentasi_status')->nullable();
            $table->boolean('mikroskill_status')->nullable();
            $table->integer('nilai_sertifikat')->nullable();
            $table->integer('nilai_mikroskill')->nullable();
            $table->integer('maks_sks')->nullable();
            $table->string('mitra')->nullable();
            $table->string('addressMitra')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('JenisKegiatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('final_reports');
    }
};
