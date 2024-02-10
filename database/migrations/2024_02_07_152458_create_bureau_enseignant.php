<?php

use App\Models\Bureau;
use App\Models\Enseignant;
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
        Schema::create('bureau_enseignant', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Bureau::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Enseignant::class)->constrained()->cascadeOnDelete();
            $table->date('date_affectation')->default(date("Y-m-d H:i:s"));
            $table->timestamps();
            $table->unique(['bureau_id', 'enseignant_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bureau_enseignant');
    }
};
