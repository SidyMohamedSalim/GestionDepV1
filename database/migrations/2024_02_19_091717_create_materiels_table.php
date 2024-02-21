<?php

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
        Schema::create('materiels', function (Blueprint $table) {
            $table->id();

            $table->string('designation')->unique();

            $table->boolean('active')->default(true);
            $table->string("commentaire")->nullable();
            $table->string("numero_inventaire")->unique()->nullable();
            $table->enum('categorie', ['Equipement', 'Fourniture']);
            $table->enum('type', ['Bureau', 'Informatique']);

            $table->string("reference")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiels');
    }
};
