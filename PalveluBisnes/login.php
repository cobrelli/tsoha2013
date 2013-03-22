
<?php
include 'sivunYlaOsa.php';
?>

<h1>Kirjaudu</h1>
</header>

<article id ="main">
    <h2>
        Kirjaudu
    </h2>

    <form>
        <fieldset>
            <p><label class="kyltti" for="kayttajatunnus">Käyttäjätunnus: </label>
            <input class="kentta" type="text" name="Käyttäjätunnus"></p>
            
            <p><label class="kyltti" for="salasana">Salasana: </label>
            <input class="kentta" type="password" name="Salasana"></p>
        </fieldset>
    </form>
</article>

<?php
include 'sivunAlaOsa.php';
?>