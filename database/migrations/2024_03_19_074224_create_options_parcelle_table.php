<?php

use App\Models\Parcelle;
use App\Models\ParcelleOption;
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
        Schema::create('options_parcelle', function (Blueprint $table) {
            $table->foreignIdFor(Parcelle::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(ParcelleOption::class)->constrained()->cascadeOnDelete();
            $table->primary(['parcelle_id', 'parcelle_option_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('options_parcelle');
    }
};
