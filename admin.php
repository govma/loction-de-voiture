<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Location de Voiture</title>
	<link rel="stylesheet" href="stylee.css">
</head>
<body>
    <h1>Formulaire de Location de Voiture</h1>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Récupérer les données du formulaire
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $telephone = htmlspecialchars($_POST['telephone']);
        $email = htmlspecialchars($_POST['email']);
        $voiture = htmlspecialchars($_POST['voiture']);
        $date_debut = htmlspecialchars($_POST['date_debut']);
        $date_fin = htmlspecialchars($_POST['date_fin']);

        // Valider les données
        if (!empty($nom) && !empty($prenom) && !empty($telephone) && !empty($email) && !empty($voiture) && !empty($date_debut) && !empty($date_fin)) {
            // Préparer les données à enregistrer
            $data = "Nom: $nom, Prénom: $prenom, Téléphone: $telephone, Email: $email, Voiture: $voiture, Date de début: $date_debut, Date de fin: $date_fin\n";

            // Enregistrer les données dans un fichier texte
            file_put_contents('clients.txt', $data, FILE_APPEND);

            echo "<p style='color: #66ff33;'>Les informations ont été enregistrées avec succès.</p>";
        } else {
            echo "<br><br><p style='color: red;'>Veuillez remplir tous les champs.<br><br></p><br><br>";
        }
    }
    ?>
<br><p><a href="liste.php" style="color: white; text-align:; display: ; margin-top: 20px;">Voir la liste des clients</a></br></p>
    <form method="post" action="">
        <label for="nom">Nom :</label><br>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="prenom">Prénom :</label><br>
        <input type="text" id="prenom" name="prenom" required><br><br>

        <label for="telephone">Téléphone :</label><br>
        <input type="text" id="telephone" name="telephone" required><br><br>

        <label for="email">Email :</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="voiture">Voiture souhaitée :</label><br>
        <input type="text" id="voiture" name="voiture" required><br><br>

        <label for="date_debut">Date de début :</label><br>
        <input type="date" id="date_debut" name="date_debut" required><br><br>

        <label for="date_fin">Date de fin :</label><br>
        <input type="date" id="date_fin" name="date_fin" required><br><br>

        <button type="submit">Enregistrer</button>
    </form>
	
</body>
</html>