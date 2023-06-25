<?php
require_once 'Bibliotheque.php';
require_once 'Auteur.php';
require_once 'Livre.php';

$auteur1 = new Auteur('Stephen', 'King');
$auteur2 = new Auteur('Stefdsfsfsewfwn', 'Kinewdsfsfwefg');

$livre1 = new Livre('Ca', 1986, 1138, 20.0, $auteur1);
$livre2 = new Livre('Simetierre', 1983, 374, 15.0, $auteur1);
$livre3 = new Livre('Le Fleau', 1978, 823, 14.0, $auteur1);
$livre4 = new Livre('Shining', 1977, 447, 16.0, $auteur1);

$livre5 = new Livre('truc', 1986, 1138, 20.0, $auteur2);
$livre6 = new Livre('Livre', 1983, 374, 15.0, $auteur2);
$livre7 = new Livre('bon bah un livre', 1978, 823, 14.0, $auteur2);
$livre8 = new Livre('pas ouf lui', 1977, 447, 16.0, $auteur2);

$bibliotheque = new Bibliotheque();

//auteur1
$bibliotheque->ajouterLivre($livre1);
$bibliotheque->ajouterLivre($livre2);
$bibliotheque->ajouterLivre($livre3);
$bibliotheque->ajouterLivre($livre4);

//auteur2
$bibliotheque->ajouterLivre($livre5);
$bibliotheque->ajouterLivre($livre6);
$bibliotheque->ajouterLivre($livre7);
$bibliotheque->ajouterLivre($livre8);

$bibliotheque->afficherBibliographie($auteur1);



?>