<?php session_start(); ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo "Hello ".$_SESSION['imie']." ".$_SESSION['nazwisko'];
        ?>
        <a href="rezerwacja.php" >Rezerwacja</a>
    </body>
</html>
