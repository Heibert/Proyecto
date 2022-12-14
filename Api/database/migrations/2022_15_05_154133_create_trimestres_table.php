<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trimestres', function (Blueprint $table) {
            $table->id();
            $table->string('numTrimestre');
            $table->foreignId('id_ficha')
                            ->nullable()
                            ->constrained('fichas')
                            ->cascadeOnUpdate()
                            ->nullOnDelete();
            $table->integer('id_tematica');
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
        Schema::dropIfExists('trimestres');
    }
};
