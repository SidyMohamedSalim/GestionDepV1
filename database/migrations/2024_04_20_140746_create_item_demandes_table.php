<?php

use App\Models\Demande;
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
        Schema::create('item_demandes', function (Blueprint $table) {
            $table->id();
            $table->string('designation');
            $table->integer('quantite');
            $table->longText('description')->nullable();
            $table->string('prix_unitaire')->nullable();

            $table->foreignIdFor(Demande::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_demandes');
    }
};
