<?php

echo "<div id='linkit'>";
echo "<ul>";
echo "<li><a href = 'index.php'>Etusivu</a></li>";
echo "<li><a href = 'yritys.php'>Yritys</a></li>";
echo "<li><a href = 'palvelut.php'>Palvelut</a></li>";
echo "<li><a href = 'varaus.php'>Varaus</a></li>";

require_once 'avusteet/avusteet.php';
if (on_kirjautunut()) {
    global $sessio;
    if ($sessio->kayttaja_oikeudet == admin) {
        echo "<li><a href = 'hallintasivu.php'>Omat sivuni</a></li>";
    } else if ($sessio->kayttaja_oikeudet == kayttaja) {
        echo "<li><a href = 'kayttajasivu.php'>Omat sivuni</a></li>";
    }
}
echo "</ul>";
echo "</div>";
?>
