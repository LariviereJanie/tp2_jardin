<?php

namespace App\Controllers;

use App\Models\Plante;
use App\Providers\View;
use App\Models\Espece;
use App\Models\Utilisateur;
use App\Providers\Validator;



class PlanteController
{
    public function index()
    {
        $plante = new Plante;
        $plantes = $plante->select();

        return View::render('plante/index', [
            'plantes' => $plantes
        ]);
    }
    public function create()
{
    $modeleEspece = new Espece;
    $especes = $modeleEspece->select('nom');

    $modeleUtilisateur = new Utilisateur;
    $utilisateurs = $modeleUtilisateur->select('nom');

    return View::render('plante/create', [
        'especes' => $especes,
        'utilisateurs' => $utilisateurs
    ]);
}

    public function store(array $data)
{
    $nom = trim($data['nom'] ?? '');
    $date = $data['date_acquisition'] ?? '';

    $idEspece = filter_var(
        $data['id_espece'] ?? '',
        FILTER_VALIDATE_INT,
        ['options' => ['min_range' => 1]]
    );

    $idUtilisateur = filter_var(
        $data['id_utilisateur'] ?? '',
        FILTER_VALIDATE_INT,
        ['options' => ['min_range' => 1]]
    );

    $val = new Validator;

$val->field('nom', $nom, 'Nom de la plante')
    ->required();

$val->field('date_acquisition', $date, 'Date d’acquisition')
    ->required();

$val->field(
    'id_espece',
    (string) ($data['id_espece'] ?? ''),
    'Espèce'
)->required()->int();

$val->field(
    'id_utilisateur',
    (string) ($data['id_utilisateur'] ?? ''),
    'Propriétaire'
)->required()->int();

$erreurs = $val->isSuccess() ? [] : $val->getErrors();

    $dateValide = \DateTimeImmutable::createFromFormat('!Y-m-d', $date);

    if (!$dateValide || $dateValide->format('Y-m-d') !== $date) {
        $erreurs[] = 'La date d’acquisition est invalide.';
    }

    $modeleEspece = new Espece;

    if (!$idEspece || !$modeleEspece->selectId($idEspece)) {
        $erreurs[] = 'Choisissez une espèce existante.';
    }

    $modeleUtilisateur = new Utilisateur;

    if (!$idUtilisateur || !$modeleUtilisateur->selectId($idUtilisateur)) {
        $erreurs[] = 'Choisissez un propriétaire existant.';
    }

    if ($erreurs) {
        return View::render('error', [
            'msg' => implode(' ', $erreurs)
        ]);
    }

    $modele = new Plante;

    $id = $modele->insert([
        'nom' => $nom,
        'date_acquisition' => $date,
        'id_espece' => $idEspece,
        'id_utilisateur' => $idUtilisateur
    ]);

    if ($id === false) {
        return View::render('error', [
            'msg' => 'Impossible d’enregistrer la plante.'
        ]);
    }

    $_SESSION['succes'] = 'La plante a été ajoutée avec succès.';
    return View::redirect('plante/show?id=' . $id);
}

    public function show($data = [])
    
{
    if (!isset($data['id'])) {
        http_response_code(404);

        return View::render('error', [
            'msg' => 'Identifiant de plante manquant.'
        ]);
    }

    $modele = new Plante;
    $plante = $modele->selectId($data['id']);

    if (!$plante) {
        http_response_code(404);

        return View::render('error', [
            'msg' => 'Plante introuvable.'
        ]);
    }

    $modeleEspece = new Espece;
    $espece = $modeleEspece->selectId($plante['id_espece']);

    return View::render('plante/show', [
        'plante' => $plante,
        'espece' => $espece
    ]);
}

public function edit($data = [])
{
    if (!isset($data['id'])) {
        http_response_code(404);

        return View::render('error', [
            'msg' => 'Identifiant de plante manquant.'
        ]);
    }

    $modele = new Plante;
    $plante = $modele->selectId($data['id']);

    if (!$plante) {
        http_response_code(404);

        return View::render('error', [
            'msg' => 'Plante introuvable.'
        ]);
    }

    $modeleEspece = new Espece;
    $especes = $modeleEspece->select('nom');

    $modeleUtilisateur = new Utilisateur;
    $utilisateurs = $modeleUtilisateur->select('nom');

    return View::render('plante/edit', [
        'plante' => $plante,
        'especes' => $especes,
        'utilisateurs' => $utilisateurs
    ]);
}

public function update(array $data, $get = [])
{
    $id = filter_var(
        $get['id'] ?? '',
        FILTER_VALIDATE_INT,
        ['options' => ['min_range' => 1]]
    );

    $modele = new Plante;

    if (!$id || !$modele->selectId($id)) {
        http_response_code(404);

        return View::render('error', [
            'msg' => 'Plante introuvable.'
        ]);
    }

    $nom = trim($data['nom'] ?? '');
    $date = $data['date_acquisition'] ?? '';

    $idEspece = filter_var(
        $data['id_espece'] ?? '',
        FILTER_VALIDATE_INT,
        ['options' => ['min_range' => 1]]
    );

    $idUtilisateur = filter_var(
        $data['id_utilisateur'] ?? '',
        FILTER_VALIDATE_INT,
        ['options' => ['min_range' => 1]]
    );

   $val = new Validator;

$val->field('nom', $nom, 'Nom de la plante')
    ->required();

$val->field('date_acquisition', $date, 'Date d’acquisition')
    ->required();

$val->field(
    'id_espece',
    (string) ($data['id_espece'] ?? ''),
    'Espèce'
)->required()->int();

$val->field(
    'id_utilisateur',
    (string) ($data['id_utilisateur'] ?? ''),
    'Propriétaire'
)->required()->int();

$erreurs = $val->isSuccess() ? [] : $val->getErrors();
    $dateValide = \DateTimeImmutable::createFromFormat('!Y-m-d', $date);

    if (!$dateValide || $dateValide->format('Y-m-d') !== $date) {
        $erreurs[] = 'La date d’acquisition est invalide.';
    }

    $modeleEspece = new Espece;

    if (!$idEspece || !$modeleEspece->selectId($idEspece)) {
        $erreurs[] = 'Choisissez une espèce existante.';
    }

    $modeleUtilisateur = new Utilisateur;

    if (!$idUtilisateur || !$modeleUtilisateur->selectId($idUtilisateur)) {
        $erreurs[] = 'Choisissez un propriétaire existant.';
    }

    if ($erreurs) {
        return View::render('error', [
            'msg' => implode(' ', $erreurs)
        ]);
    }

    $resultat = $modele->update([
        'nom' => $nom,
        'date_acquisition' => $date,
        'id_espece' => $idEspece,
        'id_utilisateur' => $idUtilisateur
    ], $id);

    if (!$resultat) {
        return View::render('error', [
            'msg' => 'Impossible de modifier la plante.'
        ]);
    }

    $_SESSION['succes'] = 'Les modifications ont été enregistrées.';
    return View::redirect('plante/show?id=' . $id);
}

public function delete(array $data)
{
    $id = filter_var(
        $data['id'] ?? '',
        FILTER_VALIDATE_INT,
        ['options' => ['min_range' => 1]]
    );

    $modele = new Plante;

    if (!$id || !$modele->selectId($id)) {
        http_response_code(404);

        return View::render('error', [
            'msg' => 'Plante introuvable.'
        ]);
    }

    try {
        $resultat = $modele->delete($id);
    } catch (\PDOException $e) {
        if ($e->getCode() !== '23000') {
            throw $e;
        }

        return View::render('error', [
            'msg' => 'Cette plante est liée à d’autres données, notamment des soins. Retirez ces liens avant de la supprimer.'
        ]);
    }

    if (!$resultat) {
        return View::render('error', [
            'msg' => 'Impossible de supprimer la plante.'
        ]);
    }

    $_SESSION['succes'] = 'La plante a été supprimée avec succès.';
    return View::redirect('plantes');
}
}