

<?php
include 'sivunYlaOsa.php';
varmista_kirjautuminen();
varmista_kayttajaoikeudet($kayttaja = "kayttaja");
?>

<h1>Hei <?php echo $sessio->kayttaja_nimi ?></h1>

</header>

<article id ="main">
    <div id="kayttajasivu_vasen">
        <p>Tarjoamasi palvelut</p>
        <?php
//        echo "<table border>";
//        echo $sessio->kayttaja_id;
        $palvelut = $kyselija->haePalvelut($sessio->kayttaja_id);
        echo '<table border>';
        echo '<tr><td>Palvelu</td><td>toimipiste</td><td>hinta</td><td>kuvaus</td>';
        foreach ($palvelut as $palvelu) {
            echo '<tr>';
            echo '<td>' . $palvelu->palvelu_id . '</td>';
            echo '<td>' . $palvelu->toimipiste_id . '</td>';
            echo '<td>' . $palvelu->hinta . '</td>';
            echo '<td>' . $palvelu->kuvaus . '</td>';
            echo '</tr>';
        }
        echo '</table>';
        ?>

    </div>

    <div id="kayttajasivu_oikea">
        <p>Lisää uusi palvelu:</p>
    </div>

</article>

<?php
include 'sivunAlaOsa.php';
?>
