{{ include('layouts/header.php', {title: 'Ajouter une plante — Mon Jardin'}) }}
<section class="contenu">

<h2>Ajouter une plante</h2>

<form class="formulaire-plante"action="{{ base }}/plante/store" method="post">
    <div>
        <label for="nom">Nom de la plante</label>
        <input type="text" id="nom" name="nom" required>
    </div>

    <div>
        <label for="date_acquisition">Date d’acquisition</label>
        <input type="date" id="date_acquisition"
               name="date_acquisition" required>
    </div>

    <div>
        <label for="id_espece">Espèce</label>
        <select id="id_espece" name="id_espece" required>
            <option value="">Choisir une espèce</option>

            {% for espece in especes %}
                <option value="{{ espece.id_espece }}">
                    {{ espece.nom }}
                </option>
            {% endfor %}
        </select>
    </div>
    <div>
    <label for="id_utilisateur">Propriétaire</label>
    <select id="id_utilisateur" name="id_utilisateur" required>
        <option value="">Choisir un propriétaire</option>

        {% for utilisateur in utilisateurs %}
            <option value="{{ utilisateur.id_utilisateur }}">
                {{ utilisateur.nom }}
            </option>
        {% endfor %}
    </select>
</div>
    <button class="bouton" type="submit">Enregistrer</button>
</form>

<p>
    <a class="retour" href="{{ base }}/plantes">Retour à mes plantes</a></p>
</section>

{{ include('layouts/footer.php') }}