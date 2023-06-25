<?php
require_once 'Auteur.php';

class Livre {
    private string $titre;
    private int $nbPages;
    private int $parution;
    private float $prix;
    private Auteur $auteur;

    public function __construct(string $titre, int $nbPages, int $parution, float $prix, Auteur $auteur) {
        $this->titre = $titre;
        $this->nbPages = $nbPages;
        $this->parution = $parution;
        $this->prix = $prix;
        $this->auteur = $auteur;
    }

    public function getAuteur(): Auteur {
        return $this->auteur;
    }

    public function __toString(): string {
        return $this->titre . ' (' . $this->parution . '): ' . $this->nbPages . ' pages ' . $this->prix . '$';
    }
}



?>