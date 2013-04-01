

<?php
include 'sivunYlaOsa.php';
varmista_kirjautuminen();
varmista_kayttajaoikeudet(kayttaja);
?>

<h1>Hei <?php echo $sessio->kayttaja_nimi ?></h1>

</header>

<article id ="main">
    <p>Käyttäjäsivu</p>

</article>

<?php
include 'sivunAlaOsa.php';
?>
