// Liste des voitures
const cars = [
  { id: 1, name: "Toyota Corolla", type: "Berline" },
  { id: 2, name: "Ford Mustang", type: "Sport" },
  { id: 3, name: "Hyundai Tucson", type: "SUV" },
  { id: 4, name: "Tesla Model 3", type: "Électrique" },
  { id: 5, name: "Mercedes Classe E", type: "Luxe" }
];

// Initialisation des voitures dans le catalogue
const carList = document.getElementById("car-list");
cars.forEach(car => {
  const carCard = document.createElement("div");
  carCard.classList.add("car-card");
  carCard.innerHTML = `
    <h3>${car.name}</h3>
    <p>Type : ${car.type}</p>
  `;
  carList.appendChild(carCard);
});

// Initialisation des options dans le formulaire
const carSelect = document.getElementById("car-select");
cars.forEach(car => {
  const option = document.createElement("option");
  option.value = car.name;
  option.textContent = car.name;
  carSelect.appendChild(option);
});

// Gestion du formulaire
document.getElementById("rental-form").addEventListener("submit", function (e) {
  e.preventDefault();

  const name = document.getElementById("client-name").value;
  const license = document.getElementById("license-number").value;
  const nationalId = document.getElementById("national-id").value;
  const car = document.getElementById("car-select").value;
  const startDate = document.getElementById("start-date").value;
  const endDate = document.getElementById("end-date").value;

  const contract = `
    <h3>Contrat de Location</h3>
    <p><strong>Nom du client :</strong> ${name}</p>
    <p><strong>Numéro de permis :</strong> ${license}</p>
    <p><strong>Numéro de carte nationale :</strong> ${nationalId}</p>
    <p><strong>Voiture :</strong> ${car}</p>
    <p><strong>Date de début :</strong> ${startDate}</p>
    <p><strong>Date de fin :</strong> ${endDate}</p>
  `;

  document.getElementById("contract").innerHTML = contract;
});

// Impression du contrat
document.getElementById("print-contract").addEventListener("click", function () {
  const contract = document.getElementById("contract").innerHTML;
  const newWindow = window.open();
  newWindow.document.write(contract);
  newWindow.print();
});

// Effets d'animation sur les boutons
document.querySelectorAll("button").forEach(button => {
  button.addEventListener("mousedown", () => {
    button.style.transform = "scale(0.95)"; // Réduction légère à 95% pendant le clic
  });
  button.addEventListener("mouseup", () => {
    button.style.transform = "scale(1)"; // Retour à la taille normale
  });
});