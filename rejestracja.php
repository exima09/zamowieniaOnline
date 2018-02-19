<?php
if (!(isset($_POST['inputLiczby']) && isset($_POST['liczba1']) && isset($_POST['liczba2']) && $_POST['inputLiczby'] == ($_POST['liczba1'] + $_POST['liczba2']))) {
    header('Location: ./rezerwacja.php');
}
require_once "connect.php";
$polaczanie = @new mysqli($host, $db_user, $db_password, $db_name);
if ($polaczanie->connect_errno != 0) {
    echo "Error: " . $polaczanie->connect_errno . "Opis: " . $polaczanie->connect_errno;
}
if (!$polaczanie->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $polaczanie->error);
    exit();
}
if (!empty($_POST["inputImie"]) && !empty($_POST["inputNazwisko"]) && !empty($_POST["inputEmail"]) && !empty($_POST["inputHaslo"]) && !empty($_POST["inputTel"]) && !empty($_POST["inputUlica"]) && !empty($_POST["inputNrDomu"]) && !empty($_POST["ip"]) && strlen($_POST["inputTel"]) >= 9
) {
    $imie = mysqli_real_escape_string($polaczanie, $_POST["inputImie"]);
    $nazwisko = mysqli_real_escape_string($polaczanie, $_POST["inputNazwisko"]);
    $haslo = mysqli_real_escape_string($polaczanie, $_POST["inputHaslo"]);
    $email = mysqli_real_escape_string($polaczanie, $_POST["inputEmail"]);
    $tel = mysqli_real_escape_string($polaczanie, $_POST["inputTel"]);
    $ulica = mysqli_real_escape_string($polaczanie, $_POST["inputUlica"]);
    $nrdomu = mysqli_real_escape_string($polaczanie, $_POST["inputNrDomu"]);
    $nrmieszkania = mysqli_real_escape_string($polaczanie, $_POST["inputNrMieszkania"]);
    $ip = mysqli_real_escape_string($polaczanie, $_POST["ip"]);
} else {
    $blad = 1;
}
$sqlEmail = "Select email from klienci where email='" . $email . "'";
if ($klienci = @$polaczanie->query($sqlEmail)) {
    $iloscDopasowan = $klienci->num_rows;
    if ($iloscDopasowan > 0) {
        $blad = 2;
    }
}
include './template/header.php';
if ($polaczanie->connect_errno != 0) {
    echo "Error: " . $polaczanie->connect_errno . "Opis: " . $polaczanie->connect_errno;
} else {
    if ($blad != 2) {
        $sql = "INSERT INTO klienci(`id_klienta`, `imie`, `nazwisko`, `email`, `haslo`, `ulica`, `nr_domu`, `nr_mieszkania`, `nr_telefonu`, `ip`, `punkty`)
	  VALUES(NULL,'$imie','$nazwisko','$email','$haslo','$ulica',$nrdomu,'$nrmieszkania',$tel,'$ip',0)";
        if ($polaczanie->query($sql) === TRUE) {
            ?>
            <div id = "suc" class = "row opacity">
                <?php if (isset($blad) && $blad == 1) {
                    ?>
                    <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Błąd!</strong> Wróc i popraw formularz.
                    </div>
                <?php } else { ?>
                    <div class="alert alert-success alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Zarejestrowano!</strong> Posiadasz już konto klienta!<br /><br />
                        <strong>Imię: </strong><?= $imie; ?><br />
                        <strong>Nazwisko: </strong><?= $nazwisko; ?><br />
                        <strong>Email: </strong><?= $email; ?><br />
                        <strong>Nr Telefonu: </strong><?= $tel; ?><br />
                        <strong>Adres: </strong><?php
                        echo $ulica . " " . $nrdomu;
                        if (!empty($_POST['inputNrMieszkania'])) {
                            echo "/" . $nrmieszkania;
                        }
                        ?><br />
                    </div>
                </div>
                <?php
            }
        } else {
            echo "Error: " . $sql . "<br>" . $polaczanie->error;
            ?>
            <div class="alert alert-danger alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Błąd!</strong> Wróc i popraw formularz.
            </div>
            <?php
        }
    } else {
        ?>
        <div class="alert alert-danger alert-dismissable fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Błąd!</strong> Już istnieje użytkownik o takim adresie Email.<br />
            <a href="javascript:history.back();">Wróc</A>
        </div>
        <?php
    }
}
?>

<?php
include './template/footer.php';
?>
