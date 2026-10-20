{{ include('layouts/header.php', {title: 'Mes plantes — Mon Jardin'}) }}

<section class="contenu">
    <h2>Mes plantes</h2>

    <p>
        <a class="bouton" href="{{ base }}/plante/create">
            Ajouter une plante
        </a>
    </p>

    <div class="grille-plantes">
        {% for plante in plantes %}
            <article class="carte-plante">
                <h3>{{ plante.nom }}</h3>

                <p>
                    Date d’acquisition :
                    {{ plante.date_acquisition }}
                </p>

                <a class="bouton"
                   href="{{ base }}/plante/show?id={{ plante.id_plante }}">
                    Voir la plante
                </a>
            </article>
        {% else %}
            <p>Aucune plante enregistrée.</p>
        {% endfor %}
    </div>
</section>

{{ include('layouts/footer.php') }}