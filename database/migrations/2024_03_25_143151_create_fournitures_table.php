<?php

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
        Schema::create('fournitures', function (Blueprint $table) {
            $table->id();
            $table->float('quantite')->default(1);
            $table->float('base_quantite')->default(1);
            $table->date('date_acquisition');
            $table->string('carateristiques')->nullable();
            $table->boolean('share')->default(false); //partager entre enseignant
            $table->enum('destination', ['informatique', 'laboratoire']);
            $table->string("reference")->nullable();

            //Parent materiel pour un materiel utilise dans un materiel detenant un materiel
            // $table->foreignIdFor(Equipement::class)->nullable();

            $table->foreignIdFor(Materiel::class)->constrained()->cascadeOnDelete();
            $table->unique(['id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fournitures');
    }
};
