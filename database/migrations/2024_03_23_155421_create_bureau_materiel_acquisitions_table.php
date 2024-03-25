<?php

use App\Models\Bureau;
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
        Schema::create('bureau_materiel_acquisition', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Bureau::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(MaterielAcquisition::class)->constrained()->cascadeOnDelete();
            $table->string("quantite")->default('1');
            $table->date("date_affectation");
            $table->enum('signature', ['pending', 'signed'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bureau_materiel_acquisition');
    }
};
