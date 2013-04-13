

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
        $palvelut = $kyselija->haePalvelut($sessio->kayttaja_id);
        echo '<table border>';
        echo '<tr><td>Palvelu</td><td>toimipiste</td><td>hinta</td><td>kuvaus</td>';
        foreach ($palvelut as $palvelu) {
            echo '<tr>';
            echo '<td>' . $palvelu->palvelu_id . '</td>';
            echo '<td>' . $palvelu->toimipiste_id . '</td>';
            echo '<td>' . $palvelu->hinta . '</td>';
            echo '<td>' . $palvelu->kuvaus . '</td>';
            echo '<td> <a href="poistalistalta.php?palvelu=' . $palvelu->id;
            echo '">[Poista]</a></td>';
            echo '</tr>';
        }
        echo '</table>';
        ?>

    </div>

    <div id="kayttajasivu_oikea">
        <p>Lisää uusi palvelu:</p>

        <form action="lisaaPalvelu.php" method="POST">
            <fieldset style="width: 100%">
                <p><label class="kyltti" for="palvelu">Palvelutunnus: </label>
                    <input type="text" name="palvelu" class="kentta">
                </p>
                <p><label class="kyltti" for="toimipiste">Toimipiste: </label></p>
                <select name="paikka">
                    <?php
                    $paikat = $kyselija->haeToimipisteet();
                    foreach ($paikat as $paikka) {
                        echo '<option value="';
                        echo $paikka->toimipiste_id;
                        echo '">';
                        echo $paikka->nimi;
                        echo '</options>';
                    }
                    ?>    

                </select>
                <p><label class="kyltti" for="hinta">Hinta: </label>
                    <input type="text" name="hinta" class="kentta">
                </p>
                <p><label class="kyltti" for="kuvaus">Palvelun kuvaus: </label>
                    <input type="text" name="kuvaus" class="kentta">
                </p>

            </fieldset>
            <input type="submit" value="Lisää">
        </form>
        
        <h3>Työvuorosi:</h3>
        
    </div>

</article>

<?php
include 'sivunAlaOsa.php';
?>
