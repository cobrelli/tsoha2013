<?php

class Kyselyt {

    private $_pdo;

    public function __construct($pdo) {
        $this->_pdo = $pdo;
    }

    public function tunnista($tunnus, $salasana) {
        $kysely = $this->valmistele('SELECT tunnus FROM kayttajat WHERE tunnus = ? AND salasana = ?');
        if ($kysely->execute(array($tunnus, $salasana))) {
            return $kysely->fetchObject();
        } else {
            return null;
        }
    }

    public function haeKayttajaNimi($tunnus) {
        $kysely = $this->valmistele('SELECT nimi FROM kayttajat WHERE tunnus = ?');
        if ($kysely->execute(array($tunnus))) {
            return $kysely->fetchObject();
        } else {
            return null;
        }
    }

    public function haeKayttajatyyppi($tunnus) {
        $kysely = $this->valmistele('SELECT kayttajatyyppi FROM kayttajat WHERE tunnus = ?');
        if ($kysely->execute(array($tunnus))) {
            return $kysely->fetchObject();
        } else {
            return null;
        }
    }

    private function valmistele($sqllause) {
        return $this->_pdo->prepare($sqllause);
    }

}

require dirname(__file__) . '/../asetukset.php';

$kyselija = new Kyselyt($pdo);