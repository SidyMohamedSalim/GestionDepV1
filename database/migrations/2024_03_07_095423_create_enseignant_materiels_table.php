<?php

use App\Models\Enseignant;
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
        Schema::create('enseignant_materiel_acquisition', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Enseignant::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(MaterielAcquisition::class)->constrained()->cascadeOnUpdate();
            $table->string("quantite");
            $table->date("date_affectation");

            $table->enum('signature', ['not-concerned', 'pending', 'signed'])->default('not-concerned');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enseignant_materiel_acquisition');
    }
};
