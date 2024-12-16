<?php
// Charger les messages depuis le fichier JSON
$messages = [];
if (file_exists('messages.json')) {
    $messages = json_decode(file_get_contents('messages.json'), true);
}

// Fonction pour afficher les messages
function afficherMessages($messages) {
    if (empty($messages)) {
        echo "<p>Aucun message pour le moment.</p>";
    } else {
        echo "<ul>";
        foreach ($messages as $index => $message) {
            echo "<li>";
            echo htmlspecialchars($message);
            echo " <a href='supprimer.php?index=$index' style='color: red;'>Supprimer</a>";
            echo "</li>";
        }
        echo "</ul>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Découverte de Dubaï</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
        }

        header {
            background-color: #0073e6;
            color: #fff;
            text-align: center;
            padding: 1em 0;
        }

        section {
            padding: 20px;
            margin: 0 auto;
            max-width: 1000px;
        }

        h1, h2 {
            text-align: center;
            color: #0073e6;
        }

        .image-placeholder {
            width: 100%;
            height: 250px;
            background-color: #ddd;
            text-align: center;
            line-height: 250px;
            color: #555;
            margin-bottom: 15px;
        }

        .lieux-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .lieu {
            flex: 1 1 calc(33% - 20px);
            background: #fff;
            border: 1px solid #ddd;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .lieu h3 {
            margin-top: 0;
        }

        footer {
            text-align: center;
            padding: 1em 0;
            background-color: #333;
            color: #fff;
            margin-top: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            margin-bottom: 10px;
        }

        form input, form button {
            padding: 10px;
            margin: 5px 0;
        }
    </style>
</head>
<body>
<header>
    <h1>Bienvenue à Dubaï</h1>
    <p>Découvrez la ville de l'innovation et du luxe</p>
</header>

<!-- Section Introduction -->
<section>
    <h2>Introduction</h2>
    <p>
        Dubaï est une ville des Émirats arabes unis, connue pour son architecture ultramoderne,
        son shopping de luxe et sa vie nocturne animée. Du Burj Khalifa, la plus haute tour du monde,
        aux îles artificielles en forme de palmier, Dubaï ne cesse d’émerveiller les visiteurs.
    </p>
    <img src="images/dubai_home.jpg" alt="Vue de Dubaï" class="image-placeholder">
</section>

<!-- Section Lieux Incontournables -->
<section>
    <h2>Les lieux incontournables</h2>
    <div class="lieux-container">
        <div class="lieu">
            <img src="images/burj-khalifa-dubai-night-hn.jpg" alt="Vue de Dubaï" class="image-placeholder">
            <h3>Burj Khalifa</h3>
            <p>La tour la plus haute du monde, offrant des vues panoramiques sur toute la ville.</p>
        </div>
        <div class="lieu">
            <img src="images/GettyImages-512732128-5b4767c5c9e77c00377d2852.jpg" alt="Vue de Dubaï" class="image-placeholder">
            <h3>Palm Jumeirah</h3>
            <p>Une île artificielle en forme de palmier abritant des hôtels de luxe et des résidences.</p>
        </div>
        <div class="lieu">
            <img src="images/Dubai-Mall-1024x640.jpg" alt="Vue de Dubaï" class="image-placeholder">
            <h3>Dubaï Mall</h3>
            <p>Le plus grand centre commercial du monde avec des boutiques, restaurants et attractions.</p>
        </div>
    </div>
</section>

<!-- Section Culture et Histoire -->
<section>
    <h2>Culture et Histoire</h2>
    <p>
        Bien que moderne, Dubaï a su conserver ses racines culturelles. Visitez le quartier historique
        d'Al Fahidi, explorez les souks d'épices et d'or, ou découvrez la cuisine traditionnelle émiratie.
    </p>
    <img src="images/Gold-Souk-60601.jpg" alt="Vue de Dubaï" class="image-placeholder">
</section>

<!-- Section Galerie -->
<section>
    <h2>Galerie</h2>
    <img src="images/aura-skypool-dubai-uai-1341x575.jpeg" alt="Vue de Dubaï" class="image-placeholder">
    <img src="images/desert.jpg" alt="Vue de Dubaï" class="image-placeholder">
    <img src="images/plage-dubai.jpg" alt="Vue de Dubaï" class="image-placeholder">
</section>

<!-- Section Commentaires -->
<section>
    <h2>Commentaires des visiteurs</h2>
    <?php afficherMessages($messages); ?>

    <h3>Ajouter un Commentaire</h3>
    <form action="ajouter.php" method="POST">
        <input type="text" name="message" placeholder="Votre message" required>
        <button type="submit">Ajouter</button>
    </form>
</section>

<footer>
    <p>&copy; 2024 Découverte de Dubaï. Tous droits réservés.</p>
</footer>
</body>
</html>
