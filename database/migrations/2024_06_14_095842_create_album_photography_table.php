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
        Schema::create('album_photography', function (Blueprint $table) {
            $table->unsignedBigInteger('album_id');
            $table->foreign('album_id')->references('id')->on('albums')->cascadeOnDelete();




            $table->unsignedBigInteger('photography_id');
            $table->foreign('photography_id')->references('id')->on('photographies')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('album_photography');
    }
};
