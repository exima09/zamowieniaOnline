<?php
$copywriteDate = date("Y");
if (isset($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
?>
<details>
    <summary>Copyright <?= $copywriteDate; ?>.</summary>
    <p> - by GiE Studio. Wszystkie Prawa Zastrzeżone</p>
</details>
</div>
</div>
<!-- Modal - Register -->
<div id="Register" class="modal fade" role="dialog">
    <form action="rejestracja.php" method="POST">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Rejestracja klienta:</h4>
                </div>
                <div class="modal-body col-sm-12">

                    <div class="form-group col-sm-12">
                        <label for="inputImie" class="col-sm-2 control-label">Imię</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="inputImie" id="inputImie" placeholder="Podaj imie" required>
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="inputNazwisko" class="col-sm-2 control-label">Nazwisko</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="inputNazwisko" id="inputNazwisko" placeholder="Podaj nazwisko" required>
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Podaj adres email" required>
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="inputHaslo" class="col-sm-2 control-label">Hasło</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="inputHaslo" id="inputHaslo" placeholder="Podaj hasło" required>
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="inputTel" class="col-sm-2 control-label">Numer telefonu</label>
                        <div class="col-sm-10">
                            <input type="tel" class="form-control" name="inputTel" id="inputTel" maxlength="9" placeholder="Podaj numer telefonu" required> 
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="inputUlica" class="col-sm-2 control-label">Ulica</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="inputUlica" id="inputUlica" placeholder="Podaj ulice" required>
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="inputNrDomu" class="col-sm-2 control-label">Nr domu</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="inputNrDomu" id="inputNrDomu" required>
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="inputNrMieszkania" class="col-sm-2 control-label">Nr Mieszkania</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="inputNrMieszkania" id="inputNrMieszkania">
                        </div>
                    </div> 
                    <div class="form-group col-sm-12">
                        <label for="liczby" class="col-sm-2 control-label">
                            <?php
                            $liczba1 = rand(1, 9);
                            $liczba2 = rand(1, 9);
                            echo $liczba1 . " + " . $liczba2 . " =";
                            ?>
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="inputLiczby" id="inputLiczby" placeholder="Podaj wynik" required>
                            <input type="hidden" class="form-control" name="liczba1" id="liczba1" value="<?= $liczba1; ?>" >
                            <input type="hidden" class="form-control" name="liczba2" id="liczba2" value="<?= $liczba2; ?>" >
                            <input type="hidden" class="form-control" name="ip" id="ip" value="<?= $ip; ?>" >
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group col-sm-12">
                        <label for="akceptacjaRegulaminu" class="col-sm-2 control-label">Regulamin:</label>
                        <div class="checkbox col-sm-5">
                            <label id="AkceptacjaRegulaminu"><input type="checkbox" value="1" required>Akceptuje <a href="./pdf/regulamin.pdf">Regulamin</a></label>
                        </div>
                        <div class="col-sm-5">
                            <button type="submit" class="btn btn-default">Załóż konto</button>
                        </div>
                    </div>


                    <!-- okno modalne email-->
                </div>
            </div>
        </div>
    </form>
</div>


</body>
</html>