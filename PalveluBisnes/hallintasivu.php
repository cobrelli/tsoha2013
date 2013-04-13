<?php
include 'sivunYlaOsa.php';
varmista_kirjautuminen();
varmista_kayttajaoikeudet(admin);
?>

<h1>Hei <?php echo $sessio->kayttaja_nimi ?></h1>

</header>

<article id ="main">
    <div id="kayttajasivu_vasen">
        <h3>Kaikki palvelut palveluntarjoajittain:</h3>
        <?php
        $kaikki_kayttajat = $kyselija->haeKayttajat();
        foreach ($kaikki_kayttajat as $k) {
            if ($k->kayttajatyyppi == "kayttaja") {
                $k_palvelut = $kyselija->haePalvelut($k->tunnus);

                echo '<p>' . $k->nimi . '</p>';
                echo '<table border>';
                echo '<tr><td>Palvelu</td><td>toimipiste</td><td>hinta</td><td>kuvaus</td>';

                foreach ($k_palvelut as $p) {

                    echo '<tr>';
                    echo '<td>' . $p->palvelu_id . '</td>';
                    echo '<td>' . $p->toimipiste_id . '</td>';
                    echo '<td>' . $p->hinta . '</td>';
                    echo '<td>' . $p->kuvaus . '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            }
        }
        ?>
    </div>
    <div id="kayttajasivu_oikea">
        <h3>Kaikki tämänhetkiset varaukset:</h3>
    </div>
</article>

<?php
include 'sivunAlaOsa.php';
?>
