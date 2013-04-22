
<?php
include 'avusteet/sivunYlaOsa.php';
?>

<h1>Varaus</h1>
</header>

<article id ="main">
    <div id="varaus_vasen">

        <?php
        if (isset($_GET['varausnumero'])) {
            echo '<h3>Kiitos varauksestasi!</h3>';
            echo '<p>Varausnumerosi on ' . $_GET['varausnumero'] . '</p>';
        }
        ?>

        <h3>Tee uusi varaus</h3>

        <form id="varaus">
            <fieldset>
                <p><label class="kyltti" for="asiakaspalvelija">Asiakaspalvelija: </label></p>
                <select name="palvelija" onchange="this.form.submit()">
                    <option value="0">Valitse palveluntarjoaja</option>
                    <?php
                    $palvelijat = $kyselija->haeKayttajat();
                    foreach ($palvelijat as $k) {
                        if ($k->kayttajatyyppi == "kayttaja") {
                            echo '<option value="';
                            echo $k->tunnus;

                            echo '"';
                            if (isset($_GET['palvelija']) && $_GET['palvelija'] == $k->tunnus) {
                                echo 'selected';
                            }
                            echo '>';
                            echo $k->nimi;
                            echo '</options>';
                        }
                    }
                    ?>   
                </select>

                <p><label class="kyltti" for="palvelu">Palvelu: </label></p> 
                <select  name="palvelu" onchange="this.form.submit()">
                    <option value="0">Valitse palvelu</option>
                    <?php
                    if (isset($_GET['palvelija'])) {
                        $palvelut = $kyselija->haePalvelutVaraukseen($_GET['palvelija']);
                        foreach ($palvelut as $p) {
                            echo '<option value="';
                            echo $p->palvelu_id;
                            echo '"';
                            if ($_GET['palvelu'] == $p->palvelu_id) {
                                echo 'selected';
                            }
                            echo '>';

                            echo $p->palvelu_id;
                            echo '</options>';
                        }
                    }
                    ?>
                </select>

                <p><label class="kyltti" for="toimipiste">Toimipiste: </label></p>
                <select name="paikka" onchange="this.form.submit()">
                    <option value="0">Valitse toimipiste</option>
                    <?php
                    if (isset($_GET['palvelu'])) {
                        $paikat = $kyselija->haeToimipisteetPalvelunJaTekijanPerusteella($_GET['palvelija'], $_GET['palvelu']);
                        foreach ($paikat as $paikka) {
                            echo '<option value="';
                            echo $paikka->toimipiste_id;
                            echo '"';
                            if ($_GET['paikka'] == $paikka->toimipiste_id) {
                                echo 'selected';
                            }
                            echo '>';
                            $paikan_nimi = $kyselija->haeToimipisteenNimi($paikka->toimipiste_id);
                            echo $paikan_nimi->nimi;
                            echo '</options>';
                        }
                    }
                    ?> 
                </select>

                <p><label class="kyltti" for="pvm">Päivämäärä: </label>
                    <?php
                    $pvm = date('Y-m-d');
                    $curDate = date('Y-m-d');
                    echo '<input type="date" name="pvm" value="';
                    if (isset($_GET['pvm'])) {
                        $pvm = $_GET['pvm'];
                    }
                    echo $pvm . '" min="' . $curDate . '"';
                    if (!isset($_GET['paikka']) || $_GET['paikka'] == "0") {
                        echo 'disabled';
                    }
                    echo '>';


                    if (isset($_GET['pvm']) && $_GET['paikka'] != '0' && $_GET['palvelu'] != '0' && $_GET['palvelija'] != '0') {
                        echo '<br><p>Vapaat ajat</p>';
                        echo '<select name="aika">';
                        echo '<option value="0">Valitse vapaa aika</option>';

                        for ($i = 8; $i <= 17; $i++) {
                            $klo = '';
                            $klo = $i . ':00';

                            $tarkasta_paikka = $kyselija->tarkistaEtteiAnnettunaAikanaPaikassaVarausta($klo, $_GET['pvm'], $_GET['paikka']);
                            $tarkasta_palvelija = $kyselija->tarkistaEtteiAnnettunaAikanaPalvelijallaVarausta($klo, $_GET['pvm'], $_GET['palvelija']);

                            if (!$tarkasta_palvelija && !$tarkasta_paikka) {
                                echo '<option value="' . $klo . '"';
                                if ($_GET['klo'] == $klo) {
                                    echo 'selected';
                                }
                                echo '>' . $klo . '</options>';
                            }
                        }

                        echo '</select>';
                    }
                    ?>
                </p>

            </fieldset>
        </form>
        <?php
        if (isset($_GET['pvm']) && $_GET['paikka'] != '0' && $_GET['palvelu'] != '0' && $_GET['palvelija'] != '0') {
            echo '<button form="varaus" formmethod="POST" formaction="varaa.php?lisaa"';
            echo '>Varaa aika</button>';
        } else {
            echo '<button form="varaus" formmethod="GET" formaction="varaus.php"';
            if (!isset($_GET['paikka']) || $_GET['paikka'] == "0") {
                echo ' disabled';
            }
            echo '>Tarkista vapaat ajat</button>';
        }
        ?>

        <br>
    </div>

    <div id="varaus_oikea">
        <h3>Peru varauksesi</h3>

        <form action="varaa.php?poista" method="POST">
            Varausnumero: <input type="text" name="varausnumero"><br>
            <input type="submit" value="Peru">
        </form>

        <?php
        if (isset($_GET['poistettu'])) {
            echo 'Varauksesi on nyt poistettu';
        }
        ?>
    </div>

</article>

<?php
include 'avusteet/sivunAlaOsa.php';
?>