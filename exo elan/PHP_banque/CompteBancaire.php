<?php
require_once 'Titulaire.php';
class CompteBancaire
{
    private $libelle;
    private $solde;
    private $devise;
    private $titulaire;

    public function __construct($libelle, $soldeInitial, $devise, $titulaire)
    {
        $this->libelle = $libelle;
        $this->solde = $soldeInitial;
        $this->devise = $devise;
        $this->titulaire = $titulaire;
    }

    public function crediter($montant) {
        $this->solde += $montant;
    }

    public function getLibelle()
    {
        return $this->libelle;
    }

    public function getSolde()
    {
        return $this->solde;
    }

    public function getDevise()
    {
        return $this->devise;
    }
    
    public function debiter($montant) {
        if ($this->solde >= $montant) {
            $this->solde -= $montant;
        } else {
            echo "Solde insuffisant pour effectuer le débit.\n";
        }
    }
    
    public function effectuerVirement($montant, $compteDestinataire) {
        if ($this->solde >= $montant) {
            $this->solde -= $montant;
            $compteDestinataire->crediter($montant);
        } else {
            echo "Solde insuffisant pour effectuer le virement.\n";
        }
    }
    


}
