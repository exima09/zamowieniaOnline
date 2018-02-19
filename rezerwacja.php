<?php
require_once"connect.php";
$polaczanie = @new mysqli($host, $db_user, $db_password, $db_name);
if ($polaczanie->connect_errno != 0) {
    echo "Error: " . $polaczanie->connect_errno . "Opis: " . $polaczanie->connect_errno;
}
if (!$polaczanie->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $polaczanie->error);
    exit();
}
$sql = "SELECT * FROM platnosc ORDER BY id_platnosci DESC";
if ($platnosc = @$polaczanie->query($sql)) {
    $iloscPlatnosci = $platnosc->num_rows;
}
$sql = "SELECT g.id_godziny, g.godzina_start, g.godzina_stop, count(r.id_rezerwacji) FROM `godziny` g
left join rezerwacja r on r.id_godziny=g.id_godziny
group by g.id_godziny, g.godzina_start, g.godzina_stop
having count(r.id_rezerwacji)<7";
if ($wszystkieGodziny = @$polaczanie->query($sql)) {
    $iloscGodzin = $wszystkieGodziny->num_rows;
}
if (isset($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
include './template/header.php';
?>
<div class="row opacity">
    <div class="col-sm-4 text-center">
        <img src="./images/logo.png" style="width:100%;" alt="LOGO" />
        <h1 style="font-size:40px; font-weight:800;">walentynki 2018</h1>
        <h1 style="font-size:40px; font-weight:800;">14.02.2018</h1>
        <img src="./images/serce.png" style="width:100%;" alt="serca" />
    </div>
    <div class="col-sm-4 text-center">
        <h3><p>Na walentynki przygotowaliśmy dla Państwa specjalną ofertę z autorskim menu.</p>
            <p>Za jedyne</p></h3>
        <h1 style="font-size:72px; font-weight:800;">40 zł</h1> <h3>za dwie osoby</h3>
        <p>W cenie otrzymasz dwie porcje wybranej przystawki, danie główne: pizzę lub dwie porcje lasagne, dwie porcje deseru oraz dwa wybrane napoje!</p>
    </div>
    <div class="col-sm-4 text-center">
        <h3><p>Nie wiesz gdzie zabrać swoją drugą połówkę na walentynki?!</p></h3>
        <p>Wychodzimy na przeciw Twoim oczekiwaniom i nie będziesz już musiał(a) się głowić nad tym, gdzie w naszym mieście można wyjść coś zjeść, a jak już jest gdzie to albo nie pozwalają na to fundusze albo nieodpowiednie menu.</p>
        <img src="./images/para.png" style="width:60%;" alt="serca" />
    </div>
</div>
<div class="row opacity">
    <div class="row">
        <div class="col-sm-3">
            <h3> Przystawka</h3>
            <img src="./images/antipasti.jpg" alt="przystawka" style="width:100%;"/>
            <h3> Mozzarella</h3>
            Mozzarella z pomidorami, skropiona oliwą z bazylią
            <hr>
            <h3> Sałatka</h3>
            Rukola z roszpunką, pomidorki cherry, ser feta, na koniec posypane ziarnami słonecznika i polane sosem.
        </div>
        <div class="col-sm-3">
            <h3> Danie Główne</h3>
            <img src="./images/lazania.jpg" alt="lazania" style="width:100%;"/>
            <h3> Pizza</h3>
            Dowolna pizza z naszego menu lub specjalnie przygotowana pizza na wydarzenie z sosem serowym na spodzie pizzy.
            <hr>
            <h3> Lasagne</h3>
            Porcja lasagne składająca się z warstw makaronu, przekładanych serem, autorskim sosem bolońskim oraz sosem beszamel, posypana świeżo startym  parmezanem.

        </div>
        <div class="col-sm-3">
            <h3> Deser</h3>
            <img src="./images/szarlotka.jpg" alt="ciasto" style="width:100%;"/>
            <h3> Ciasto</h3>
            Szarlotka na ciepło z lodami, polana odrobiną czekolady.
        </div>
        <div class="col-sm-3">
            <h3> Napój</h3>
            <img src="./images/napoj.jpg" alt="napoj" style="width:100%;"/>
            <h3> Napój</h3>
            Dwa dowolnie wybrane napoje, dostępne z naszego menu.
        </div>
    </div>
</div>
<?php
$today = date("Y-m-d H:i:s");
if ($today < "2018-02-17 18:00:00") {
    ?>
    <div class="row opacity">
        <div class="col-md-12">
            <h3>Zarezerwuj stolik <small>LICZBA MIEJSC OGRANICZONA!</small></h3>

            <form action="./dodajRezerwacje.php#suc" class="form-horizontal" role="form" method="POST">
                <div class="form-group">
                    <label for="inputImie" class="col-sm-2 control-label">Imię</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputImie" id="inputImie" placeholder="Podaj imie" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputNazwisko" class="col-sm-2 control-label">Nazwisko</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputNazwisko" id="inputNazwisko" placeholder="Podaj nazwisko" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Podaj adres email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputTel" class="col-sm-2 control-label">Numer telefonu</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control" name="inputTel" id="inputTel" maxlength="9" placeholder="Podaj numer telefonu" required> 
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputUlica" class="col-sm-2 control-label">Ulica</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputUlica" id="inputUlica" placeholder="Podaj ulice" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputNrDomu" class="col-sm-2 control-label">Nr domu</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputNrDomu" id="inputNrDomu" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputNrMieszkania" class="col-sm-2 control-label">Nr Mieszkania</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputNrMieszkania" id="inputNrMieszkania">
                    </div>
                </div>

                <label for="grupaPlatnosci" class="col-sm-2 control-label">Wybierz typ płatności</label>
                <div id="grupaPlatnosci" class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
    <?php if ($iloscPlatnosci > 0) {
        while ($typPlatnosci = $platnosc->fetch_assoc()) { ?>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="typPlatnosci" id="typPlatnosci<?= $typPlatnosci['id_platnosci']; ?>" value="<?= $typPlatnosci['id_platnosci']; ?>" checked>
            <?= $typPlatnosci['tytul_platnosci']; ?>
                                    </label>
                                </div>
                            <?php }
                        } ?>
                    </div>
                </div>

                <div id="grupaGodzina" class="form-group">
                    <label for="grupaGodzina" class="col-sm-2 control-label">Wybierz godzinę</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="godzina">
    <?php if ($iloscGodzin > 0) {
        while ($godzina = $wszystkieGodziny->fetch_assoc()) { ?>
                                    <option value="<?= $godzina['id_godziny']; ?>"><?= $godzina['godzina_start']; ?>-<?= $godzina['godzina_stop']; ?></option>
        <?php }
    } ?>
                        </select>
                    </div>
                </div>
                <div id="grupaPar" class="form-group">
                    <label for="liczbaOsob" class="col-sm-2 control-label">Liczba osób</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="liczbaOsob">
                            <option value="2">2 osoby</option>
                            <option value="4">4 osoby</option>
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label for="liczby" class="col-sm-2 control-label"><?php $liczba1 = rand(1, 9);
    $liczba2 = rand(1, 9);
    echo $liczba1 . " + " . $liczba2 . " ="; ?></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputLiczby" id="inputLiczby" placeholder="Podaj wynik" required>
                        <input type="hidden" class="form-control" name="liczba1" id="liczba1" value="<?= $liczba1; ?>" >
                        <input type="hidden" class="form-control" name="liczba2" id="liczba2" value="<?= $liczba2; ?>" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="regulamin" class="col-sm-2 control-label">Regulamin:</label>
                    <div class="checkbox col-sm-10">
                        <label id="regulamin"><input type="checkbox" value="1" required>Akceptuje <a href="./pdf/regulamin.pdf">Regulamin</a></label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Zarezerwuj</button>
                    </div>
                </div>
                <input type="hidden" class="form-control" name="ip" id="ip" value="<?= $ip; ?>" >
            </form>

        </div>
    </div>
    <?php
} else {
    ?>
    <div class="row opacity">
        <h2>Rezerwacja zakończona</h2>
    </div>
    <?php
}
include './template/footer.php';
?>