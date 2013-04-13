
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
                            if($_GET['palvelu'] == $p->palvelu_id){
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
                <select name="paikka">
                    <option value="0">Valitse toimipiste</option>
                    <?php
                    if (isset($_GET['palvelu'])) {
                        $paikat = $kyselija->haeToimipisteet();
                        foreach ($paikat as $paikka) {
                            echo '<option value="';
                            echo $paikka->toimipiste_id;
                            echo '">';
                            echo $paikka->nimi;
                            echo '</options>';
                        }
                    }
                    ?> 
                </select>

                <p><label class="kyltti" for="pvm">Päivämäärä: </label>
                    <input type="date" name="pvm">
                </p>
                klo
                <select>
                    <option value="8">8.00</options>
                    <option value="9">9.00</options>
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