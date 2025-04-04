<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); // Nom de la destination
            $table->string('image')->nullable(); // Image (stockage du chemin de l'image)
            $table->string('ville'); // Ville de la destination
            $table->string('adresse'); // Adresse complète
            $table->text('description')->nullable(); // Description optionnelle
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
};
