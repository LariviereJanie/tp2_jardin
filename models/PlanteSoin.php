<?php

namespace App\Models;

class PlanteSoin extends CRUD
{
    protected $table = 'plante_soin';

    protected $fillable = [
        'id_plante',
        'id_soin',
        'date_soin',
        'notes'
    ];

    public function lireLien(
        int $idPlante,
        int $idSoin,
        string $dateSoin
    ): array|false {
        $sql = "SELECT * FROM plante_soin
                WHERE id_plante = :id_plante
                AND id_soin = :id_soin
                AND date_soin = :date_soin";

        $stmt = $this->prepare($sql);

        $stmt->execute([
            'id_plante' => $idPlante,
            'id_soin' => $idSoin,
            'date_soin' => $dateSoin
        ]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}