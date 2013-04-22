<footer id="footer" class="footerStyle">
    <p> 
    <div class="footerText">Kinkkisen palvelut Oy</div>
    <div class="footerText">123456789</div>


    <?php
    if (on_kirjautunut()) {
        echo '<div class="footerText"><a href="kirjaudu.php?ulos">logout</a></div>';
    } else {
        echo '<div class="footerText"><a href="login.php">login</a></div>';
    }
    ?>

</p>
</footer>

</body>
</html>
