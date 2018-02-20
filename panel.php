<?php
include 'template/header.php';
require_once "connect.php";
$polaczanie = @new mysqli($host, $db_user, $db_password, $db_name);
if ($polaczanie->connect_errno != 0) {
    echo "Error: " . $polaczanie->connect_errno . "Opis: " . $polaczanie->connect_errno;
} else {
    if (!$polaczanie->set_charset("utf8")) {
        printf("Error loading character set utf8: %s\n", $polaczanie->error);
        exit();
    }
    $sql = "SELECT * FROM klienci WHERE id_klienta='" . $_SESSION['id_klienta'] . "'";
    if ($result = @$polaczanie->query($sql)) { //wproawadzanie zapytania do bazy danych
        $How_much = $result->num_rows;
    } else {
        $How_much = 0;
    }
}
echo "</table>";
?>
<div class="row opacity">
    <h1>Panel Klienta</h1>
    <?php
    if ($How_much > 0) {
        $row = $result->fetch_assoc();
        ?>
        <div class="col-sm-8">
            <b>Imię: </b> <?= $row['imie']; ?><br />
            <b>Nazwisko: </b> <?= $row['nazwisko']; ?><br />
            <b>Nr Telefonu: </b> <?= $row['nr_telefonu']; ?><br />
            <b>E-mail: </b> <?= $row['email']; ?><br />
            <br />
            <b>Adres: </b> <?= $row['ulica'] . " " . $row['nr_domu'];
    if ($row['nr_mieszkania'] != 0) {
        echo "/" . $row['nr_mieszkania'];
    } ?><br />
            <button id="bChangeData" onclick="ChangeData();" class="btn btn-default">Zmień Dane</button>
            <div id="ChangeData" class="hidden">
                <hr>
                <div class="form-group col-sm-12">
                    <label for="inputHaslo" class="col-sm-2 control-label">Hasło</label>
                    <div class="col-sm-10">
                        <input type="password" value="<?=$row['haslo'];?>" autocomplete="current-password" class="form-control" name="inputHaslo" id="inputHaslo" placeholder="Podaj hasło" required>
                    </div>
                </div>
                <hr class="col-sm-11">
                <div class="form-group col-sm-12">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" value="<?=$row['email'];?>" autocomplete="username email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Podaj adres email" required>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label for="inputTel" class="col-sm-2 control-label">Numer telefonu</label>
                    <div class="col-sm-10">
                        <input type="tel" value="<?=$row['nr_telefonu'];?>" class="form-control" name="inputTel" id="inputTel" maxlength="9" placeholder="Podaj numer telefonu" required> 
                    </div>
                </div>
                <hr class="col-sm-11">
                <div class="form-group col-sm-12">
                    <label for="inputUlica" class="col-sm-2 control-label">Ulica</label>
                    <div class="col-sm-10">
                        <input type="text" value="<?=$row['ulica'];?>" class="form-control" name="inputUlica" id="inputUlica" placeholder="Podaj ulice" required>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label for="inputNrDomu" class="col-sm-2 control-label">Nr domu</label>
                    <div class="col-sm-10">
                        <input type="text" value="<?=$row['nr_domu'];?>" class="form-control" name="inputNrDomu" id="inputNrDomu" required>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label for="inputNrMieszkania" class="col-sm-2 control-label">Nr Mieszkania</label>
                    <div class="col-sm-10">
                        <input type="text" <?php if($row['nr_mieszkania']!=0) {echo "value='".$row['nr_mieszkania']."'";} ?> class="form-control" name="inputNrMieszkania" id="inputNrMieszkania">
                    </div>
                </div> 
                <button id="CancelChangeData" onclick="CancelChangeData();" class="btn btn-default">Anuluj</button>
                <button id="SubmitChangeData" class="btn btn-default">Zatwierdź</button>
            </div>
        </div>
        <div class="col-sm-4">
            <h2><b style="text-align:center;">Punkty: </b> <?= $row['punkty']; ?> pkt</h2><br />
        </div>
        <?php
    } else {
        echo "<h3>Błąd pobrania danych.</h3>";
    }
    ?>
</div>
<script>
    function ChangeData() {
        $("#ChangeData").removeClass();
        $("#ChangeData").fadeIn("slow");
        $("#bChangeData").fadeOut("slow").addClass("hidden");
        $("#ChangeData").css("opacity", 0);
        $("#ChangeData").animate({
            opacity: 1.0
        }, 1000, function () {

        });
    }
    function CancelChangeData() {
        $("#bChangeData").fadeIn("slow").removeClass("hidden");
        $("#ChangeData").fadeOut("slow");
    }
</script>
<?php
include 'template/footer.php';
?>