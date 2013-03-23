
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
                <p><label class="kyltti" for="etunimi">Etunimi: </label>
                    <input type="text" name="Etunimi" class="kentta">
                </p>
                <p><label class="kyltti" for="Sukunimi">Sukunimi: </label>
                    <input type="text" name="Sukunimi" class="kentta">
                </p>
                <p><label class="kyltti" for="asiakaspalvelija">Asiakaspalvelija: </label></p>
                <select>
                    <option value="1">palvelija 1</options>
                    <option value="2">palvelija 2</options>
                    <option value="3">palvelija 3</options>
                </select>
                <p><label class="kyltti" for="toimipiste">Toimipiste: </label></p>
                <select>
                    <option value="1">paikka 1</options>
                    <option value="2">paikka 2</options>
                    <option value="3">paikka 3</options>
                </select>

                <p><label class="kyltti" for="palvelu">Palvelu: </label></p> 
                <select>
                    <option value="1">palvelu 1</options>
                    <option value="2">palvelu 2</options>
                    <option value="3">palvelu 3</options>
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