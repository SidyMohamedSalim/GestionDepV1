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
        Schema::create('materiel_acquisitions', function (Blueprint $table) {
            $table->id();
            $table->float('quantite')->default(1);
            $table->date('date_acquisition');
            $table->string('carateristiques');
            $table->enum('destination', ['informatique', 'laboratoire']);
            $table->string("numero_inventaire")->unique()->nullable();
            $table->foreignIdFor(Materiel::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
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
