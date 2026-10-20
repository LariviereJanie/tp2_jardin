<?php

namespace App\Models;

class Plante extends CRUD
{
    protected $table = 'plante';

    protected $primaryKey = 'id_plante';

    protected $fillable = [
        'nom',
        'date_acquisition',
        'id_utilisateur',
        'id_espece'
    ];
}