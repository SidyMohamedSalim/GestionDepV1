<?php

use App\Models\Enseignant;
use App\Models\EnseignantMaterielAcquisition;
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
        Schema::create('materiel_restitutions', function (Blueprint $table) {
            $table->id();
            $table->string("designation")->nullable();
            $table->string("numero_inventaire")->nullable();
            $table->foreignIdFor(MaterielAcquisition::class);
            $table->foreignIdFor(Enseignant::class);
            $table->string("quantite")->default("1");
            $table->date("date_restitution");
            $table->enum('signature', ['not-concerned', 'pending', 'signed'])->default('pending');
            $table->timestamps();
            $table->unique(['id', 'materiel_acquisition_id', 'enseignant_id', 'date_restitution']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiel_restitutions');
    }
};
