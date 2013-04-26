<?php

require_once 'avusteet/kyselyt.php';
require_once 'avusteet/sessio.php';

function ohjaa($osoite) {
    header("Location: $osoite");
    exit;
}

function on_kirjautunut() {
    global $sessio;
    return isset($sessio->kayttaja_id);
}

function varmista_kirjautuminen() {
    if (!on_kirjautunut()) {
        ohjaa('login.php');
    }
}

function varmista_kayttajaoikeudet($oikeudet) {
    global $sessio;
    if ($sessio->kayttaja_oikeudet == $oikeudet) {
        
    } else {
        ohjaa('index.php');
    }
}