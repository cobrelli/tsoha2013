
<?php
include 'avusteet/sivunYlaOsa.php';
?>

<h1>Kirjaudu</h1>
</header>

<article id ="main">
    <h2>
        Kirjaudu
    </h2>

    <form action="kirjaudu.php?sisaan" method="POST">
        <fieldset>
            <p><label class="kyltti" for="kayttajatunnus">Käyttäjätunnus: </label>
                <input class="kentta" type="text" name="tunnus" id="tunnus"></p>

            <p><label class="kyltti" for="salasana">Salasana: </label>
                <input class="kentta" type="password" name="salasana" id ="salasana"></p>
        </fieldset>
        <input type="submit" value="Kirjaudu">
    </form>
</article>

<?php
include 'avusteet/sivunAlaOsa.php';
?>