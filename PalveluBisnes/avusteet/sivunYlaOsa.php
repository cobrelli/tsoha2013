<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css" />
        <title><?php echo $otsikko; ?></title>
    </head>
    <body>
        <header>
            <nav>
                <?php
                include 'linkit.php';

                try {
                    require_once 'avusteet.php';
                } catch (PDOException $e) {
                    
                }
                ?>
            </nav>