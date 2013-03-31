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

    private function valmistele($sqllause) {
        return $this->_pdo->prepare($sqllause);
    }

}

require dirname(__file__) . '/../asetukset.php';

$kyselija = new Kyselyt($pdo);