<?php
require_once 'avusteet/avusteet.php';
varmista_kirjautuminen();
$kyselija->poistalistalta($sessio->kayttaja_id, $_GET['palvelu']);
ohjaa('kayttajasivu.php');
?>
