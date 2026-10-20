{{ include('layouts/header.php', {title: 'Mon Jardin — Accueil'}) }}

<section class="hero">
    <div>
                <h2>Bienvenue dans Mon Jardin 🪴</h2>

                <p>
                    Gérez vos plantes et leurs soins facilement.
                </p>

               <a class="bouton-hero" href="{{ base }}/plantes">
    Voir mes plantes
</a>
            </div>
</section>

{{ include('layouts/footer.php') }}