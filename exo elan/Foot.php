<?php
class Pays {
    private $nom;
    private $equipes = [];

    public function __construct($nom) {
        $this->nom = $nom;
    }

    public function getNom() {
        return $this->nom;
    }

    public function ajouterEquipe($equipe) {
        $this->equipes[] = $equipe;
    }

    public function getEquipes() {
        return $this->equipes;
    }
}

class Equipe {
    private $nom;
    private $dateCreation;
    private $joueurs = [];
    private $pays;

    public function __construct($nom, $dateCreation, $pays) {
        $this->nom = $nom;
        $this->dateCreation = $dateCreation;
        $this->pays = $pays;
    }

    public function ajouterJoueur($joueur) {
        $this->joueurs[] = $joueur;
    }

    public function getJoueurs() {
        return $this->joueurs;
    }

    public function getPays() {
        return $this->pays;
    }

    public function getNom() {
        return $this->nom;
    }
}

class Joueur {
    private $nom;
    private $nationalite;
    private $equipes = [];

    public function __construct($nom, $nationalite) {
        $this->nom = $nom;
        $this->nationalite = $nationalite;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getNationalite() {
        return $this->nationalite;
    }

    public function ajouterEquipe($equipe) {
        $this->equipes[] = $equipe;
    }

    public function getEquipes() {
        return $this->equipes;
    }
}

function afficherEquipesPays($pays) {
    echo '<div class="boite" style="display: inline-block; background-color: red; width: 150px; height: 150px; text-align: center; margin: 10px;">';
    echo '<h3>' . $pays->getNom() . '</h3>';
    $equipes = $pays->getEquipes();
    foreach ($equipes as $equipe) {
        echo $equipe->getNom() . '<br>';
    }
    echo '</div>';
}

// Création des pays
$paysFrance = new Pays('France');
$paysEspagne = new Pays('Espagne');
$paysAngleterre = new Pays('Angleterre');
$paysItalie = new Pays('Italie');

// Création des équipes
$equipeParis = new Equipe('Paris Saint-Germain', '1970-08-12', $paysFrance);
$equipeStrasbourg = new Equipe('Racing Club Strasbourg', '1906-06-11', $paysFrance);
$equipeBarcelone = new Equipe('FC Barcelone', '1899-11-29', $paysEspagne);
$equipeRealMadrid = new Equipe('Real Madrid', '1902-03-06', $paysEspagne);
$equipeLiverpool = new Equipe('Liverpool', '1892-06-03', $paysAngleterre);
$equipeJuventus = new Equipe('Juventus', '1897-11-01', $paysItalie);

// Création des joueurs
$joueurMbappe = new Joueur('Kylian Mbappé', 'France');
$joueurMessi = new Joueur('Lionel Messi', 'Argentine');
$joueurRonaldo = new Joueur('Cristiano Ronaldo', 'Portugal');
$joueurKane = new Joueur('Harry Kane', 'Angleterre');

// Attribution des joueurs aux équipes
$equipeParis->ajouterJoueur($joueurMbappe);
$equipeStrasbourg->ajouterJoueur($joueurMbappe);
$equipeBarcelone->ajouterJoueur($joueurMessi);
$equipeRealMadrid->ajouterJoueur($joueurRonaldo);
$equipeLiverpool->ajouterJoueur($joueurKane);
$equipeJuventus->ajouterJoueur($joueurRonaldo);

// Ajout des équipes aux pays
$paysFrance->ajouterEquipe($equipeParis);
$paysFrance->ajouterEquipe($equipeStrasbourg);
$paysEspagne->ajouterEquipe($equipeBarcelone);
$paysEspagne->ajouterEquipe($equipeRealMadrid);
$paysAngleterre->ajouterEquipe($equipeLiverpool);
$paysItalie->ajouterEquipe($equipeJuventus);

echo '<div style="text-align: center;">'; // Conteneur principal

// Affichage des équipes par pays
echo '<div class="ligne">';
afficherEquipesPays($paysFrance);
afficherEquipesPays($paysEspagne);
afficherEquipesPays($paysAngleterre);
afficherEquipesPays($paysItalie);
echo '</div>';

echo '</div>'; // Fin du conteneur principal


?>