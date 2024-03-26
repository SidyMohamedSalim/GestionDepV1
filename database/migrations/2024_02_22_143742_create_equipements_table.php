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
        Schema::create('equipements', function (Blueprint $table) {
            $table->id();
            $table->float('quantite')->default(1);
            $table->float('base_quantite')->default(1);
            $table->date('date_acquisition');
            $table->integer('nbre_restitution')->default(0);
            $table->string('carateristiques')->nullable();
            $table->boolean('share')->default(false); //partager entre enseignant
            $table->enum('destination', ['informatique', 'laboratoire']);

            $table->string("numero_inventaire");
            $table->foreignIdFor(Materiel::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipements');
    }
};
