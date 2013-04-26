<?php

require_once 'avusteet/avusteet.php';
if (isset($_GET['lisaa'])) {
    $tarkasta_paikka = $kyselija->tarkistaEtteiAnnettunaAikanaPaikassaVarausta($klo, $_GET['pvm'], $_GET['paikka']);
    $tarkasta_palvelija = $kyselija->tarkistaEtteiAnnettunaAikanaPalvelijallaVarausta($klo, $_GET['pvm'], $_GET['palvelija']);

    if (!$tarkasta_palvelija && !$tarkasta_paikka &&
            valitutPalvelutEivatTyhjia($_POST['palvelu'], $_POST['palvelija'], $_POST['paikka'], $_POST['pvm'], $_POST['aika'])) {
        $varausnumero = uniqid();
        $kyselija->teeVaraus($varausnumero, $_POST['palvelu'], $_POST['palvelija'], $_POST['paikka'], $_POST['pvm'], $_POST['aika']);

        $osoite = "varaus.php?varausnumero=" . $varausnumero;

        ohjaa($osoite);
    } else {
        ohjaa('varaus.php');
    }
} else if (isset($_GET['poista'])) {
    if ($kyselija->poistaVaraus($_POST['varausnumero']) === true) {
        ohjaa('varaus.php?poistettu');
    } else {
        ohjaa('varaus.php?eipoistettu');
    }
}

function valitutPalvelutEivatTyhjia($palvelu, $palvelija, $paikka, $pvm, $aika) {
    if ($palvelu == "0" || $palvelija == "0" || $paikka == "0" || $pvm == "0" || $aika == "0") {
        return false;
    }
    return true;
}

?>
