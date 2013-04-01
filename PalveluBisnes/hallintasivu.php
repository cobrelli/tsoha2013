<?php
include 'sivunYlaOsa.php';
varmista_kirjautuminen();
varmista_kayttajaoikeudet(admin);
?>

<h1>Hei <?php echo $sessio->kayttaja_nimi ?></h1>

</header>

<article id ="main">
    <p>Hallintasivu</p>

</article>

<?php
include 'sivunAlaOsa.php';
?>
