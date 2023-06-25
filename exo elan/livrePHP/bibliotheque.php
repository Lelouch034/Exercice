<?php
require_once 'Livre.php';

class Bibliotheque {
    private array $livres;

    public function __construct() {
        $this->livres = [];
    }

    public function ajouterLivre(Livre $livre) {
        $this->livres[] = $livre;
    }

    public function afficherBibliographie(Auteur $auteur) {
        echo 'Bibliographie de ' . $auteur . ':<br><br>';
        foreach ($this->livres as $livre) {
            if ($livre->getAuteur() === $auteur) {
                echo $livre . '<br>';
            }
        }
    }
}



?>