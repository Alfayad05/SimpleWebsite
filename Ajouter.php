<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = trim($_POST['message'] ?? '');

    if (!empty($message)) {
        // Charger les anciens messages
        $messages = [];
        if (file_exists('messages.json')) {
            $messages = json_decode(file_get_contents('messages.json'), true);
        }

        // Ajouter le nouveau message
        $messages[] = $message;

        // Sauvegarder dans le fichier JSON
        file_put_contents('messages.json', json_encode($messages, JSON_PRETTY_PRINT));

        // Redirection
        header('Location: index.php');
        exit();
    } else {
        echo "Erreur : Le message ne peut pas être vide.";
    }
} else {
    echo "Méthode non autorisée.";
}
?>
