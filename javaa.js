document.getElementById('loginForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const password = document.getElementById('password').value;

    if (password === '1956@@') {
        // Hide form and show loading animation
        document.getElementById('loginForm').classList.add('hidden');
        document.getElementById('loading').classList.remove('hidden');

        // Redirect after 3 seconds
        setTimeout(() => {
            window.location.href = 'admin.php'; // Replace with the desired URL
        }, 3000);
    } else {
        alert('Mot de passe incorrect !');
    }
});
document.getElementById("loginForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Empêche le rechargement de la page

    // Afficher une image dynamique lors de la soumission du formulaire
    const dynamicImage = document.getElementById("dynamic-image");

    // Remplacer l'image par une autre
    dynamicImage.src = "loading.jpg"; // Lien de l'image dynamique
    dynamicImage.alt = "Chargement en cours";

    // Simulation d'une opération asynchrone (par ex. appel API)
    setTimeout(() => {
         // Lien d'une autre image après le chargement
        dynamicImage.alt = "Connexion réussie";
    }, 3000); // Modifier l'image après 3 secondes
});