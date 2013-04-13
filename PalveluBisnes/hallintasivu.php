<?php
include 'sivunYlaOsa.php';
varmista_kirjautuminen();
varmista_kayttajaoikeudet(admin);
?>

<h1>Hei <?php echo $sessio->kayttaja_nimi ?></h1>

</header>

<article id ="main">
    <div id="kayttajasivu_vasen">
        <p>Kaikki palvelut palveluntarjoajittain:</p>
    </div>
    <div id="kayttajasivu_oikea">
        <p>Kaikki tämänhetkiset varaukset:</p>
    </div>
</article>

<?php
include 'sivunAlaOsa.php';
?>
