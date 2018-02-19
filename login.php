<?php
session_start();
require_once "connect.php";
$polaczanie = @new mysqli($host, $db_user, $db_password, $db_name);
if ($polaczanie->connect_errno != 0) {
    echo "Error: " . $polaczanie->connect_errno . "Opis: " . $polaczanie->connect_errno;
} else {
    $log = mysqli_real_escape_string($polaczanie, $_POST["inputEmailTel"]);
    $haslo = mysqli_real_escape_string($polaczanie, $_POST["inputHasloLog"]);
    echo $log." ".$haslo;

    $sql = "SELECT * FROM uzytkownik WHERE email='".$log."' AND haslo='".$haslo."'";
    if ($result = @$polaczanie->query($sql)) { //wproawadzanie zapytania do bazy danych
        $How_much = $result->num_rows;
        if ($How_much > 0) {

            $row = $result->fetch_assoc();

            $_SESSION['logged'] = true;
            $_SESSION['id_klienta'] = $row['id_klienta'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['haslo'] = $row['haslo'];
            $_SESSION['imie'] = $row['imie'];
            $_SESSION['nazwisko'] = $row['nazwisko'];
            $_SESSION['ulica'] = $row['ulica'];
            $_SESSION['nr_domu'] = $row['nr_domu'];
            $_SESSION['nr_mieszkania'] = $row['nr_mieszkania'];
            $_SESSION['nr_telefonu'] = $row['nr_telefonu'];
            $_SESSION['punkty'] = $row['punkty'];
            $result->close();
            header('Location:rezerwacja.php');
        } else {
            header('Location:login.php');
            $_SESSION['blad'] = 100;
        }
    }


    $polaczanie->close();
}
?>