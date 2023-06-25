<?php
require_once 'Titulaire.php';
require_once 'CompteBancaire.php';

// Création d'un titulaire et de deux comptes bancair$titulaire = new Titulaire("Doe", "John", "1990-01-01", "Paris");
$compte1 = $titulaire->ajouterCompte("Compte Courant", 1000, "EUR");
$compte2 = $titulaire->ajouterCompte("Livret d'épargne", 5000, "EUR");es


// Affichage des informations du titulaire
$titulaire->afficherInformations();
echo "<br><br>";

// Opérations sur les comptes bancaires
$compte1->crediter(500); // Créditer le compte 1 de 500 EUR
echo "Crédit de 500 EUR effectué sur le compte 1.<br>";

$compte1->debiter(200); // Débiter le compte 1 de 200 EUR
echo "Débit de 200 EUR effectué sur le compte 1.<br>";

$compte2->crediter(1000); // Créditer le compte 2 de 1000 EUR
echo "Crédit de 1000 EUR effectué sur le compte 2.<br>";

// Affichage des informations mises à jour
$titulaire->afficherInformations();
echo "<br><br>";

// Virement entre les comptes
$montantVirement = 300;
$compte1->effectuerVirement($montantVirement, $compte2); // Virement de 300 EUR du compte 1 vers le compte 2
echo "Virement de $montantVirement EUR effectué du compte 1 au compte 2.<br>";

// Affichage des informations après le virement
$titulaire->afficherInformations();
echo "<br>";


?>
