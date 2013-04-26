<?php

require_once 'avusteet/avusteet.php';
varmista_kirjautuminen();
$kyselija->lisaaPalvelu($_POST['palvelu'], $sessio->kayttaja_id, $_POST['paikka'], $_POST['hinta'], $_POST['kuvaus']);
ohjaa('kayttajasivu.php');
?>
