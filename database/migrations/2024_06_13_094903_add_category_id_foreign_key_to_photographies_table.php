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
        Schema::table('photographies', function (Blueprint $table) {

            //cre1amo la colonna dove aggiungiamo la foreign key
            $table->unsignedBigInteger('category_id')->nullable()->after('id');

            //assegniamo la foreign key alla colonna creata sopra
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('photographies', function (Blueprint $table) {
            //droppiamo la foreign  key
            $table->dropForeign('photographies_category_id_foreign');
            //droppiamo la colonna
            $table->dropColumn('category_id');
        });
    }
};
