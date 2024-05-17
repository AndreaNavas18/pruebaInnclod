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
        Schema::create('doc_documento', function (Blueprint $table) {
            $table->bigIncrements('doc_id');
            $table->string('doc_nombre', 60);
            $table->integer('doc_codigo');
            $table->text('doc_contenido');
            $table->integer('doc_id_tipo');
            $table->integer('doc_id_proceso');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doc_documento');
    }
};
