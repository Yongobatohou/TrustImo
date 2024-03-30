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
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->text('description');
            $table->double('surface');
            $table->string('ville');
            $table->string('quartier');
            $table->integer('loyé');
            $table->integer('avance');
            $table->boolean('status')->default(false);
            $table->integer('rooms');
            $table->integer('bedrooms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
