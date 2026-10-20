{{ include('layouts/header.php', {title: 'Fiche de plante — Mon Jardin'}) }}
<section class="contenu">
    <div class="detail-plante">

<h2>{{ plante.nom }}</h2>

<p>Date d’acquisition : {{ plante.date_acquisition }}</p>

{% if espece %}
    <p>Espèce : {{ espece.nom }}</p>
    <p>Description : {{ espece.description }}</p>
{% endif %}
</div>

<p>
   <a class="bouton" href="{{ base }}/plante/edit?id={{ plante.id_plante }}">
    Modifier cette plante
    </a>    
</p>

<form action="{{ base }}/plante/delete" method="post"
      onsubmit="return confirm('Voulez-vous vraiment supprimer cette plante ?');">
    <input type="hidden" name="id" value="{{ plante.id_plante }}">

    <button type="submit" class="bouton bouton-supprime">
    Supprimer cette plante
</button>
</form>

<a class="retour" href="{{ base }}/plantes">
    Retour à mes plantes
</a>
</section>
{{ include('layouts/footer.php') }}