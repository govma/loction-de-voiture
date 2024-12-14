<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du client
    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $email = $_POST['email'] ?? '';
    $history = $_POST['history'] ?? '';

    // Vérifier que les champs ne sont pas vides
    if (!empty($name) && !empty($phone) && !empty($email)) {
        // Format des données
        $clientData = "Nom: $name | Téléphone: $phone | Email: $email | Historique: $history" . PHP_EOL;

        // Chemin du fichier où les données seront stockées
        $filePath = 'clients.txt';

        // Écrire les données dans le fichier
        file_put_contents($filePath, $clientData, FILE_APPEND);

        // Réponse de succès
        echo json_encode(['status' => 'success', 'message' => 'Client enregistré avec succès.']);
    } else {
        // Réponse d'erreur
        echo json_encode(['status' => 'error', 'message' => 'Tous les champs sont requis.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Méthode non autorisée.']);
}