<?php

use App\Models\Fourniture;
use App\Models\Materiels\MaterielAcquisition;
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
        Schema::create('fourniture_acquisition_materiel_acquisition', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MaterielAcquisition::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(Fourniture::class)->constrained()->cascadeOnUpdate();
            $table->string("quantite");
            $table->date("date_affectation");
            $table->unique(['id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fourniture_acquisition_materiel_acquisition');
    }
};
