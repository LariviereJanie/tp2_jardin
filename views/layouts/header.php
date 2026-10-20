<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ title }}</title>
    <link rel="stylesheet" href="{{ asset }}/css/style.css?v=4">
</head>
<body>
<header>
        <h1>Mon Jardin 🌱</h1>
        <nav>
            <ul>
                <li><a href="{{ base }}/">Accueil</a></li>
                <li><a href="{{ base }}/plantes">Mes plantes</a></li>
            </ul>
        </nav>
    </header>

    <main>
        {% if succes %}
    <p class="message-succes" role="status">
        {{ succes }}
    </p>
{% endif %}