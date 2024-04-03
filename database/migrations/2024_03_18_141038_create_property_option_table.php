<?php

use App\Models\House;
use App\Models\HouseOption;
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
        Schema::create('property_option', function (Blueprint $table) {
            $table->foreignIdFor(House::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(HouseOption::class)->constrained()->cascadeOnDelete();
            $table->primary(['house_option_id', 'house_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_option');
    }
};
