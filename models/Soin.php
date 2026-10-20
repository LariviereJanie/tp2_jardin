<?php

namespace App\Models;

class Soin extends CRUD
{
    protected $table = 'soin';

    protected $primaryKey = 'id_soin';

    protected $fillable = [
        'type_soin',
        'description'
    ];
}