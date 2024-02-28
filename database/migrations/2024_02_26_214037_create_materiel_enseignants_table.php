<?php

use App\Models\Enseignant;
use App\Models\Materiel;
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
        Schema::create('materiel_enseignants', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Enseignant::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(Materiel::class)->constrained()->cascadeOnUpdate();
            $table->string("quantite");
            $table->date("date_affectation")->default(new DateTime());

            $table->enum('signature', ['not-concerned', 'pending', 'signed'])->default('not-concerned');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiel_enseignants');
    }
};
