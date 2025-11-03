<?php

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
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('geostatistical_key'); // Clave geoestadística (cvegeo)
            $table->string('state_code'); // Clave de la entidad federativa (cve_agee)
            $table->string('state_name'); // Nombre de la entidad federativa (nom_agee)
            $table->string('state_abbreviation', 10); // Abreviatura del nombre de la entidad (nom_abrev)
            $table->unsignedBigInteger('total_population'); // Población total (pob)
            $table->unsignedBigInteger('female_population'); // Población femenina (pob_fem)
            $table->unsignedBigInteger('male_population'); // Población masculina (pob_mas)
            $table->unsignedBigInteger('total_houses'); // Total de viviendas particulares habitadas (viv)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('states');
    }
};
