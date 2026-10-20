{{ include('layouts/header.php', {title: 'Erreur — Mon Jardin'}) }}

<section class="contenu">
    <h2>Une erreur est survenue</h2>
    <p>{{ msg }}</p>
    <a class="retour" href="{{ base }}/plantes">
        Retour à mes plantes
    </a>
</section>>

{{ include('layouts/footer.php') }}