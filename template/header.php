<?php session_start(); ?>
<!doctype html>
<html lang="pl_PL">
    <head>
        <title>Pizzeria Siciliana -  Hajnówka - Panel użytkownika</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="theme-color" content="#db5945">
        <!-- Bootstrap CSS -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Alegreya+SC&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="https://siciliana.pl/wp-content/uploads/2016/12/favicon.png" />
        <style type="text/css">
            body {
                font-family: 'Alegreya SC', sans-serif;
            }
            #tlo {
                display: table;
                font-family: 'Alegreya SC', sans-serif;
                background: url('./images/tlo.jpg');
                width: 100%;
                height: 100vh;
                background-size:cover;
                background-repeat: no-repeat;
                background-position:center center;
            }
            .opacity {
                background-color: transparent;
                background-color: rgba(250, 250, 250, 0.6);
                min-height: 20px;
                padding: 19px;
                margin-bottom: 20px;
                border: 1px solid #e3e3e3;
                border-radius: 4px;
            }
        </style>
    </head>
    <body>
        <div id="tlo">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">Pizzeria Siciliana</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li><a href="#">Panel użytkownika</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Wydarzenia
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="rezerwacja.php">Walentynki 2018</a></li>
                                <li><a href="#">Dzień Kobiet</a></li>
                                <li><a href="#">Page 1-3</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Page 2</a></li>
                        <li><a href="#">Kontakt</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php if(isset($_SESSION['logged'])&& $_SESSION['logged']!=true) {?>
                        <li><a href="#" data-toggle="modal" data-target="#Register"><span class="glyphicon glyphicon-user"></span> Rejestracja</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#Login"><span class="glyphicon glyphicon-log-in"></span> Zaloguj</a></li>
                        <?php } else { ?>
                        <li><a href="panel.php"><span class="glyphicon glyphicon-user"></span> Panel Użytkownika</a></li>
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Wyloguj</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
            <div class="container">