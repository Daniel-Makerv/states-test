<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'geostatistical_key',     // Clave geoestadística (cvegeo)
        'state_code',             // Clave de la entidad federativa (cve_agee)
        'state_name',             // Nombre de la entidad federativa (nom_agee)
        'state_abbreviation',     // Abreviatura del nombre de la entidad (nom_abrev)
        'total_population',       // Población total (pob)
        'female_population',      // Población femenina (pob_fem)
        'male_population',        // Población masculina (pob_mas)
        'total_houses',           // Total de viviendas habitadas (viv)
    ];
}
