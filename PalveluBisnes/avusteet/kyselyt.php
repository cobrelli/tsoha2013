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

    public function haeToimipisteenNimi($toimipiste_id) {
        $kysely = $this->valmistele('SELECT nimi FROM paikat WHERE toimipiste_id = ?');
        if ($kysely->execute(array($toimipiste_id))) {
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

    public function haeKayttajat() {
        $kysely = $this->valmistele('SELECT * FROM kayttajat');
        if ($kysely->execute(array())) {
            $alkiot = array();
            while ($alkio = $kysely->fetchObject()) {
                $alkiot[] = $alkio;
            }
            return $alkiot;
        } else {
            return null;
        }
    }

    public function haePalvelut($tunnus) {
        $kysely = $this->valmistele('SELECT * FROM palvelut WHERE palvelija_id = ?');
        if ($kysely->execute(array($tunnus))) {
            $alkiot = array();
            while ($alkio = $kysely->fetchObject()) {
                $alkiot[] = $alkio;
            }
            return $alkiot;
        } else {
            return null;
        }
    }

    public function haeToimipisteetPalvelunJaTekijanPerusteella($palvelija_id, $palvelu_id) {
        $kysely = $this->valmistele('SELECT toimipiste_id FROM palvelut WHERE palvelija_id = ? and palvelu_id = ?');
        if ($kysely->execute(array($palvelija_id, $palvelu_id))) {
            $alkiot = array();
            while ($alkio = $kysely->fetchObject()) {
                $alkiot[] = $alkio;
            }
            return $alkiot;
        } else {
            return null;
        }
    }

    public function haePalvelutVaraukseen($tunnus) {
        $kysely = $this->valmistele('SELECT DISTINCT palvelu_id FROM palvelut WHERE palvelija_id = ?');
        if ($kysely->execute(array($tunnus))) {
            $alkiot = array();
            while ($alkio = $kysely->fetchObject()) {
                $alkiot[] = $alkio;
            }
            return $alkiot;
        } else {
            return null;
        }
    }

    public function haeToimipisteet() {
        $kysely = $this->valmistele('SELECT * FROM paikat');
        if ($kysely->execute(array())) {
            $alkiot = array();
            while ($alkio = $kysely->fetchObject()) {
                $alkiot[] = $alkio;
            }
            return $alkiot;
        } else {
            return null;
        }
    }

    public function lisaaPalvelu($palvelu, $tunnus, $paikka, $hinta, $kuvaus) {
        $kysely = $this->valmistele('insert into palvelut (palvelu_id, palvelija_id, 
            toimipiste_id, hinta, kuvaus) values (?, (select tunnus from kayttajat where tunnus = ?), 
            (select toimipiste_id from paikat where toimipiste_id = ?), ?, ?)');

        $kysely->execute(array($palvelu, $tunnus, $paikka, $hinta, $kuvaus));
    }

    public function poistalistalta($tunnus, $palvelu) {
        $kysely = $this->valmistele('delete from palvelut where palvelija_id=? and id=?');

        $kysely->execute(array($tunnus, $palvelu));
    }

    public function tarkistaEtteiAnnettunaAikanaPaikassaVarausta($klo, $pvm, $toimipiste_id) {
        $kysely = $this->valmistele('select * from varaukset, palvelut where klo=? and pvm=? and varaukset.palvelu_id = palvelut.id and palvelut.toimipiste_id=?');
        if ($kysely->execute(array($klo, $pvm, $toimipiste_id))) {
            return $kysely->fetchObject()->count > 0;
        }
    }

    public function tarkistaEtteiAnnettunaAikanaPalvelijallaVarausta($klo, $pvm, $tunnus) {
        $kysely = $this->valmistele('select count(*) from varaukset, palvelut where klo=? and pvm=? and varaukset.palvelu_id = palvelut.id and palvelut.palvelija_id=?');
        if ($kysely->execute(array($klo, $pvm, $tunnus))) {
            return $kysely->fetchObject()->count > 0;
        }
        return false;
    }

    private function valmistele($sqllause) {
        return $this->_pdo->prepare($sqllause);
    }

}

require dirname(__file__) . '/../asetukset.php';

$kyselija = new Kyselyt($pdo);