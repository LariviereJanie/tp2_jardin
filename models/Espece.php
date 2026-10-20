<?php

namespace App\Models;

class Espece extends CRUD
{
    protected $table = 'espece';

    protected $primaryKey = 'id_espece';

    protected $fillable = [
        'nom',
        'description'
    ];
}