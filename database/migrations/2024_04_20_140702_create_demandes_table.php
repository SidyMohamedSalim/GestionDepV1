<?php

use App\utils\DataGenerator;
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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->string("titre");
            $table->date('date_demande')->nullable();
            $table->enum('status', ['pending', 'finish', 'reset'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }

    public function getDateDemandeAttribute($value)
    {
        return DataGenerator::FormateDate($value);
    }
};
