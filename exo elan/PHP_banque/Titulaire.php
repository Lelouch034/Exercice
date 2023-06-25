<?php
require_once 'CompteBancaire.php';
class Titulaire
{
    private $nom;
    private $prenom;
    private $dateNaissance;
    private $ville;
    private $comptes = [];


    public function __construct($nom, $prenom, $dateNaissance, $ville)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = $dateNaissance;
        $this->ville = $ville;
    }

    public function afficherInformations()
    {
        echo "Titulaire : " . $this->prenom . " " . $this->nom . "\n";
        echo "Date de naissance : " . $this->dateNaissance . "\n";
        echo "Ville : " . $this->ville . "\n";
        echo "Comptes bancaires : \n";
    
        foreach ($this->comptes as $compte) {
            echo "- " . $compte->getLibelle() . " - Solde : " . $compte->getSolde() . " " . $compte->getDevise() . "\n";
        }
    }
    

public function ajouterCompte($libelle, $soldeInitial, $devise)
{
    $compte = new CompteBancaire($libelle, $soldeInitial, $devise, $this);
    $this->comptes[] = $compte;
    return $compte;
}


}