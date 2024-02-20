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
        Schema::create('fournitures', function (Blueprint $table) {
            $table->id();

            $table->boolean('active')->default(true);
            $table->string("commentaire")->nullable();
            $table->enum('type', ['Bureau', 'Informatique']);
            $table->date("date_acquisition")->nullable();

            $table->foreignIdFor(Reference::class)->constrained()->cascadeOnUpdate();

            $table->foreignIdFor(Materiel::class)->constrained()->cascadeOnUpdate();

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
