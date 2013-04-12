<?php

require_once 'avusteet.php';

if (isset($_GET['sisaan'])) {
    $kayttaja = $kyselija->tunnista($_POST['tunnus'], $_POST['salasana']);
    if ($kayttaja) {
        $sessio->kayttaja_id = $kayttaja->tunnus;

        /* tallennetaan samalla myös käyttäjän nimi ylös */
        $kayttis = $kyselija->haeKayttajaNimi($sessio->kayttaja_id);
        $sessio->kayttaja_nimi = $kayttis->nimi;

        /* ja tarkistetaan käyttäjän oikeudet */
        $kayttis = $kyselija->haeKayttajatyyppi($sessio->kayttaja_id);
        $sessio->kayttaja_oikeudet = $kayttis->kayttajatyyppi;

        /* ja ohjataan oikealle sivulle oikeuksien mukaan */
        if ($sessio->kayttaja_oikeudet == 'admin') {
            ohjaa('hallintasivu.php');
        } else {
            ohjaa('kayttajasivu.php');
        }
    } else {
        ohjaa('login.php');
    }
} elseif (isset($_GET['ulos'])) {
    unset($sessio->kayttaja_id);
    ohjaa('index.php');
} else {
    die('Laiton toiminto!');
}