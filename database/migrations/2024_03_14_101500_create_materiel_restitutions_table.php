<?php

use App\Models\Bureau;
use App\Models\Enseignant;
use App\Models\Equipement;
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
            $table->foreignIdFor(Equipement::class);
            $table->foreignIdFor(Bureau::class)->nullable();
            $table->foreignIdFor(Enseignant::class)->nullable();
            $table->string("quantite")->default("1");
            $table->date("date_restitution");
            $table->enum('signature', ['not-concerned', 'pending', 'signed'])->default('pending');
            $table->timestamps();
            $table->unique(['id']);
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
