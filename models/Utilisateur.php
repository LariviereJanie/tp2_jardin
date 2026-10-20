<?php
namespace App\Models;

class Utilisateur extends CRUD
{
    protected $table = 'utilisateur';
    protected $primaryKey = 'id_utilisateur';
    protected $fillable = ['nom', 'courriel', 'mot_de_passe'];
}