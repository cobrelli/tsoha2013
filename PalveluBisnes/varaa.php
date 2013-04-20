<?php

require_once 'avusteet.php';

$varausnumero = uniqid();
//echo $varausnumero;
//echo $_POST['palvelu'];
//echo $_POST['palvelija'];
//echo $_POST['paikka'];
//echo $_POST['pvm'];
//echo $_POST['aika'];
$kyselija->teeVaraus($varausnumero, $_POST['palvelu'], $_POST['palvelija'], $_POST['paikka'], $_POST['pvm'], $_POST['aika']);

$osoite = "varaus.php?varausnumero=" . $varausnumero;

ohjaa($osoite);
?>
