{{ include('layouts/header.php', {title: 'Modifier une plante — Mon Jardin'}) }}
<section class="contenu">
<h2>Modifier une plante</h2>

<form class="formulaire-plante" action="{{ base }}/plante/update?id={{ plante.id_plante }}" method="post">
    <div>
        <label for="nom">Nom de la plante</label>
        <input type="text" id="nom" name="nom"
               value="{{ plante.nom }}" required>
    </div>

    <div>
        <label for="date_acquisition">Date d’acquisition</label>
        <input type="date" id="date_acquisition"
               name="date_acquisition"
               value="{{ plante.date_acquisition }}" required>
    </div>

    <div>
        <label for="id_espece">Espèce</label>
        <select id="id_espece" name="id_espece" required>
            <option value="">Choisir une espèce</option>

            {% for espece in especes %}
                <option value="{{ espece.id_espece }}"
                    {% if espece.id_espece == plante.id_espece %}selected{% endif %}>
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
                <option value="{{ utilisateur.id_utilisateur }}"
                    {% if utilisateur.id_utilisateur == plante.id_utilisateur %}selected{% endif %}>
                    {{ utilisateur.nom }}
                </option>
            {% endfor %}
        </select>
    </div>

    <button class="bouton" type="submit">Enregistrer les modifications</button>
</form>

<p>
    <a class="retour" href="{{ base }}/plante/show?id={{ plante.id_plante }}">Annuler</a>
</p>
</section>
{{ include('layouts/footer.php') }}