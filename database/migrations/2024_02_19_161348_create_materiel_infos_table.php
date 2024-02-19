<?php

use App\Models\Materiel;
use App\Models\Reference;
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
        Schema::create('materiel_infos', function (Blueprint $table) {
            $table->id();
            $table->string("commentaire")->nullable();
            $table->enum('categorie', ['Equipement', 'Fourniture']);
            $table->enum('type', ['Bureau', 'Informatique']);
            $table->string("numero_inventaire")->nullable();
            $table->date("date_acquisition")->nullable();

            $table->foreignIdFor(Materiel::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignIdFor(Reference::class)->constrained()->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiel_infos');
    }
};
