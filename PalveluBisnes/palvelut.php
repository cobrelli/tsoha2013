
<?php
include 'sivunYlaOsa.php';
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
//            echo '<table border>';
//            echo '<tr><td>Palvelu</td><td>toimipiste</td><td>hinta</td><td>kuvaus</td>';

            foreach ($k_palvelut as $p) {
                echo '<div id="palveluiden_asettelu"';
                echo '<p><b>' . $p->palvelu_id . '</b></p>';
                echo '<p>' . $p->kuvaus . '</p>';
                echo '<p>' . $p->hinta . ' euroa</p>';
//                echo '<tr>';
//                echo '<td>' . $p->palvelu_id . '</td>';
//                echo '<td>' . $p->toimipiste_id . '</td>';
//                echo '<td>' . $p->hinta . '</td>';
//                echo '<td>' . $p->kuvaus . '</td>';
//                echo '</tr>';
                echo '</div>';
            }
//            echo '</table>';
        }
    }
    ?>

</article>

<?php
include 'sivunAlaOsa.php';
?>