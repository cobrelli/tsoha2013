
<?php
include 'avusteet/sivunYlaOsa.php';
?>

<h1>Palvelut</h1>
</header>

<article id ="main">
    <p>
        Tietoa yrityksen palveluista palveluntarjoajittain järjestettynä.
    </p>
    <?php
    $kaikki_kayttajat = $kyselija->haeKayttajat();

    foreach ($kaikki_kayttajat as $k) {

        if ($k->kayttajatyyppi == "kayttaja") {

            $k_palvelut = $kyselija->haePalvelut($k->tunnus);
            echo '<h3>' . $k->nimi . '</h3>';

            foreach ($k_palvelut as $p) {
                $toimipiste = $kyselija->haeToimipisteenNimi($p->toimipiste_id);
                
                echo '<div id="palveluiden_asettelu"';
                echo '<p><b>' . $p->palvelu_id . '</b></p>';
                echo '<p>' . $p->kuvaus . '</p>';
                echo '<p> Palvelun sijainti: ' . $toimipiste->nimi;
                echo '<p>' . $p->hinta . ' euroa</p>';
                echo '</div>';
            }
        }
    }
    ?>

</article>

<?php
include 'avusteet/sivunAlaOsa.php';
?>