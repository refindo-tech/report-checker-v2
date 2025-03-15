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
        Schema::create('laprak_has_mikroskill', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_laprak')->nullable();
            $table->bigInteger('id_mikroskill')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laprak_has_mikroskill');
    }
};
