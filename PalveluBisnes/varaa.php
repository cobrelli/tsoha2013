<?php

require_once 'avusteet.php';
if (isset($_GET['lisaa'])) {
    $tarkasta_paikka = $kyselija->tarkistaEtteiAnnettunaAikanaPaikassaVarausta($klo, $_GET['pvm'], $_GET['paikka']);
    $tarkasta_palvelija = $kyselija->tarkistaEtteiAnnettunaAikanaPalvelijallaVarausta($klo, $_GET['pvm'], $_GET['palvelija']);

    if (!$tarkasta_palvelija && !$tarkasta_paikka) {
        $varausnumero = uniqid();
        $kyselija->teeVaraus($varausnumero, $_POST['palvelu'], $_POST['palvelija'], $_POST['paikka'], $_POST['pvm'], $_POST['aika']);

        $osoite = "varaus.php?varausnumero=" . $varausnumero;

        ohjaa($osoite);
    }
} else if (isset($_GET['poista'])) {
    $kyselija->poistaVaraus($_POST['varausnumero']);
    ohjaa('varaus.php?poistettu');
}
?>
