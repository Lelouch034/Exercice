<!DOCTYPE html>
<html>
<head>
    <title>Gestion des réservations d'hôtel</title>
    <style>
        .disponible {
            color: green;
        }

        .reservee {
            color: red;
        }
    </style>
</head>
<body>
    <?php
    // Classes Hotel, Chambre et Client

    class Hotel {
        private $nom;
        private $chambres = [];

        public function __construct($nom) {
            $this->nom = $nom;
        }

        public function getNom() {
            return $this->nom;
        }

        public function ajouterChambre(Chambre $chambre) {
            $this->chambres[] = $chambre;
        }

        public function getChambres() {
            return $this->chambres;
        }
    }

    class Chambre {
        private $numero;
        private $prix;
        private $wifi;
        private $estDisponible = true;
        private $reservation;

        public function __construct($numero, $prix, $wifi) {
            $this->numero = $numero;
            $this->prix = $prix;
            $this->wifi = $wifi;
        }

        public function getNumero() {
            return $this->numero;
        }

        public function getPrix() {
            return $this->prix;
        }

        public function aWifi() {
            return $this->wifi;
        }

        public function estDisponible() {
            return $this->estDisponible;
        }

        public function reserver(Client $client, $paiement, $wifi, $dateDebut, $dateFin) {
            $this->estDisponible = false;
            $this->reservation = $client;
            $this->reservation->ajouterChambreReservee($this);
            $this->reservation->setPaiementTotal($this->reservation->getPaiementTotal() + $paiement);
            $this->reservation->setWifi($wifi);
            $this->reservation->setDates($this->numero, $dateDebut, $dateFin);
        }

        public function liberer() {
            $this->estDisponible = true;
            $this->reservation = null;
        }

        public function getReservation() {
            return $this->reservation;
        }
    }

    class Client {
        private $nom;
        private $chambresReservees = [];
        private $paiementTotal = 0;
        private $wifi;
        private $dates = [];

        public function __construct($nom) {
            $this->nom = $nom;
        }

        public function getNom() {
            return $this->nom;
        }

        public function ajouterChambreReservee(Chambre $chambre) {
            $this->chambresReservees[] = $chambre;
        }

        public function reserverChambre(Chambre $chambre, $paiement, $wifi, $dateDebut, $dateFin) {
            $chambre->reserver($this, $paiement, $wifi, $dateDebut, $dateFin);
        }

        public function getPaiementTotal() {
            return $this->paiementTotal;
        }

        public function setPaiementTotal($paiementTotal) {
            $this->paiementTotal = $paiementTotal;
        }

        public function setWifi($wifi) {
            $this->wifi = $wifi;
        }

        public function hasWifi() {
            return $this->wifi;
        }

        public function setDates($chambreNumero, $dateDebut, $dateFin) {
            $this->dates[$chambreNumero] = array($dateDebut, $dateFin);
        }

        public function getDates() {
            return $this->dates;
        }

        public function getInfoReservation() {
            $info = "Chambres réservées : ";
            foreach ($this->chambresReservees as $chambre) {
                $info .= "Chambre " . $chambre->getNumero() . ", ";
            }
            $info = rtrim($info, ', ');
            $info .= "<br>";
            $info .= "Paiement total : " . $this->getPaiementTotal() . "$<br>";
            $info .= "WiFi : " . ($this->hasWifi() ? "Oui" : "Non") . "<br>";
            $info .= "Durée du séjour : <br>";
            foreach ($this->dates as $numero => $dates) {
                $info .= "Chambre " . $numero . " : " . $dates[0] . " au " . $dates[1] . "<br>";
            }
            return $info;
        }
    }

    // Création de l'hôtel
    $hotel = new Hotel("Hilton Strasbourg");

    // Création des chambres
    $chambre1 = new Chambre(101, 120, false);
    $chambre2 = new Chambre(102, 150, true);
    $chambre3 = new Chambre(103, 180, true);
    $chambre4 = new Chambre(104, 130, false);
    $chambre5 = new Chambre(105, 160, true);
    $chambre6 = new Chambre(106, 190, true);
    $chambre7 = new Chambre(107, 110, false);
    $chambre8 = new Chambre(108, 140, true);
    $chambre9 = new Chambre(109, 170, true);
    $chambre10 = new Chambre(110, 200, false);

    // Ajout des chambres à l'hôtel
    $hotel->ajouterChambre($chambre1);
    $hotel->ajouterChambre($chambre2);
    $hotel->ajouterChambre($chambre3);
    $hotel->ajouterChambre($chambre4);
    $hotel->ajouterChambre($chambre5);
    $hotel->ajouterChambre($chambre6);
    $hotel->ajouterChambre($chambre7);
    $hotel->ajouterChambre($chambre8);
    $hotel->ajouterChambre($chambre9);
    $hotel->ajouterChambre($chambre10);

    // Réservation de plusieurs chambres par John Doe
    $client = new Client("John Doe");
    $client->reserverChambre($chambre2, 100, true, "2021-03-11", "2021-03-15");
    $client->reserverChambre($chambre3, 120, false, "2021-03-20", "2021-03-25");
    $client->reserverChambre($chambre5, 150, true, "2021-03-15", "2021-03-18");

    // Affichage des informations de l'hôtel et des réservations de John Doe
    echo "<h2>Informations de l'hôtel :</h2>";
    echo "<p>Nom de l'hôtel : " . $hotel->getNom() . "</p>";
    echo "<h2>Chambres disponibles :</h2>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Numéro de chambre</th>";
    echo "<th>Prix</th>";
    echo "<th>WiFi</th>";
    echo "<th>Statut</th>";
    echo "<th>Durée du séjour</th>";
    echo "</tr>";
    foreach ($hotel->getChambres() as $chambre) {
        echo "<tr>";
        echo "<td>" . $chambre->getNumero() . "</td>";
        echo "<td>" . $chambre->getPrix() . "$</td>";
        echo "<td>" . ($chambre->aWifi() ? "Oui" : "Non") . "</td>";
        if (!$chambre->estDisponible()) {
            echo "<td class='reservee'>Réservée</td>";
            echo "<td>" . $chambre->getReservation()->getDates()[$chambre->getNumero()][0] . " au " . $chambre->getReservation()->getDates()[$chambre->getNumero()][1] . "</td>";
        } else {
            echo "<td class='disponible'>Disponible</td>";
            echo "<td></td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    echo "<h2>Informations de réservation pour John Doe :</h2>";
    echo $client->getInfoReservation();
    ?>
</body>
</html>
