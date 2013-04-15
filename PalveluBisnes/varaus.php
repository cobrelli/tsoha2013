
<?php
include 'sivunYlaOsa.php';
?>

<h1>Varaus</h1>
</header>

<article id ="main">
    <div id="varaus_vasen">
        <h3>Tee uusi varaus</h3>

        <form>
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
//                            echo $paikka->toimipiste_id;
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
                    ?>
                </p>
                klo
                <select name="klo">
                    <option value="0">Valitse aika</option>
                    <?php
                    if (isset($_GET['paikka'])) {
                        for ($i = 8; $i <= 18; $i++) {
                            echo '<option value="' . $i . '"';
                            if ($_GET['klo'] == $i) {
                                echo 'selected';
                            }
                            echo '>' . $i . '.00</options>';
                        }
                    }
                    ?>
                </select>

            </fieldset>
            <input type="submit" value="Lähetä">
        </form>
    </div>

    <div id="varaus_oikea">
        <h3>Peru varauksesi</h3>

        <form>
            Varausnumero: <input type="text" name="varausnumero"><br>
            <input type="submit" value="Peru">
        </form>
    </div>

</article>

<?php
include 'sivunAlaOsa.php';
?>