<?php
class Auteur {
    private string $prenom;
    private string $nom;

    public function __construct(string $prenom, string $nom) {
        $this->prenom = $prenom;
        $this->nom = $nom;
    }

    public function __toString(): string {
        return $this->prenom . ' ' . $this->nom;
    }
}





?>