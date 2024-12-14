<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Clients</title>
    <link rel="stylesheet" href="stylle.css"> <!-- Ajout du style CSS -->
</head>
<body>
    <h1>Liste des Clients</h1>
    
    <!-- Formulaire de recherche -->
    <form method="GET" style="margin-bottom: 20px; text-align: center;">
        <label for="search">Rechercher un client :</label>
        <input type="text" name="search" id="search" placeholder="Nom, Prénom ou Email">
        <button type="submit">Rechercher</button>
    </form>

    <?php
    $fichier = 'clients.txt';
    $search = isset($_GET['search']) ? strtolower(trim($_GET['search'])) : ''; // Récupération de la recherche

    // Vérifier si le fichier existe et contient des données
    if (file_exists($fichier) && filesize($fichier) > 0) {
        // Lire le contenu du fichier
        $clients = file($fichier);

        echo "<table>";
        echo "<tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Voiture</th>
                <th>Date Début</th>
                <th>Date Fin</th>
              </tr>";

        $found = false; // Indique si des clients correspondent à la recherche

        // Parcourir chaque client
        foreach ($clients as $client) {
            if ($search) {
                // Vérifier si la ligne contient le terme recherché
                if (stripos($client, $search) === false) {
                    continue; // Passer si aucun match
                }
            }

            $found = true; // Un client correspondant a été trouvé
            $details = explode(', ', $client); // Séparer les champs par la virgule
            echo "<tr>";
            foreach ($details as $detail) {
                echo "<td>" . htmlspecialchars(trim($detail)) . "</td>"; // Supprimer les espaces et protéger les données
            }
            echo "</tr>";
        }

        if (!$found && $search) {
            echo "<tr><td colspan='7'>Aucun client trouvé pour '<strong>" . htmlspecialchars($search) . "</strong>'.</td></tr>";
        }

        echo "</table>";
    } else {
        echo "<p>Aucun client n'a encore été enregistré.</p>";
    }
    ?>

</body>
</html>