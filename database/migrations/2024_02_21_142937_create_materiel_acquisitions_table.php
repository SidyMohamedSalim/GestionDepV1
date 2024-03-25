<?php

use App\Models\Materiel;
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
        Schema::create('materiel_acquisitions', function (Blueprint $table) {
            $table->id();
            $table->float('quantite')->default(1);
            $table->float('base_quantite')->default(1);
            $table->date('date_acquisition');
            $table->integer('nbre_restitution')->default(0);
            $table->string('carateristiques')->nullable();
            $table->boolean('share')->default(false); //partager entre enseignant
            $table->enum('destination', ['informatique', 'laboratoire']);

            //Parent materiel pour un materiel utilise dans un materiel detenant un materiel

            $table->foreignIdFor(MaterielAcquisition::class)->nullable();

            $table->string("numero_inventaire")->nullable();
            $table->foreignIdFor(Materiel::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiel_acquisitions');
    }
};
