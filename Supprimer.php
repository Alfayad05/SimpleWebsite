<?php
if (isset($_GET['index'])) {
    $index = (int) $_GET['index'];

    // Charger les messages
    $messages = [];
    if (file_exists('messages.json')) {
        $messages = json_decode(file_get_contents('messages.json'), true);
    }

    // Vérifier que l'index existe
    if (isset($messages[$index])) {
        unset($messages[$index]); // Supprimer le message
        $messages = array_values($messages); // Réindexer le tableau

        // Sauvegarder dans le fichier JSON
        file_put_contents('messages.json', json_encode($messages, JSON_PRETTY_PRINT));
    }

    // Redirection
    header('Location: index.php');
    exit();
} else {
    echo "Erreur : Aucun index spécifié.";
}
?>
