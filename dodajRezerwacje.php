<?php
if(!(isset($_POST['inputLiczby'])
	&& isset($_POST['liczba1'])
	&& isset($_POST['liczba2'])
	&& $_POST['inputLiczby']==($_POST['liczba1']+$_POST['liczba2'])))
	header('Location: ./rezerwacja.php');
require_once"connect.php";
$polaczanie=@new mysqli($host,$db_user,$db_password,$db_name);
if($polaczanie->connect_errno!=0)
{
echo "Error: ".$polaczanie->connect_errno."Opis: ".$polaczanie->connect_errno;

}
if (!$polaczanie->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $polaczanie->error);
    exit();
}
$sql="SELECT * FROM platnosc ORDER BY id_platnosci DESC";
if($platnosc = @$polaczanie->query($sql))
{
  $iloscPlatnosci=$platnosc->num_rows;
}
$sql="SELECT * FROM godziny";
if($wszystkieGodziny = @$polaczanie->query($sql))
{
  $iloscGodzin=$wszystkieGodziny->num_rows;
}
if(!empty($_POST["inputImie"]) 
	&& !empty($_POST["inputNazwisko"]) 
	&& !empty($_POST["inputEmail"]) 
	&& !empty($_POST["inputTel"]) 
	&& !empty($_POST["inputUlica"]) 
	&& !empty($_POST["inputNrDomu"]) 
	&& !empty($_POST["typPlatnosci"]) 
	&& !empty($_POST["godzina"])
	&& !empty($_POST["ip"])
	&& strlen($_POST["inputTel"])>=9
	) {
$imie=mysqli_real_escape_string($polaczanie,$_POST["inputImie"]);
$nazwisko=mysqli_real_escape_string($polaczanie,$_POST["inputNazwisko"]);
$email=mysqli_real_escape_string($polaczanie,$_POST["inputEmail"]);
$tel=mysqli_real_escape_string($polaczanie,$_POST["inputTel"]);
$ulica=mysqli_real_escape_string($polaczanie,$_POST["inputUlica"]);
$nrdomu=mysqli_real_escape_string($polaczanie,$_POST["inputNrDomu"]);
$nrmieszkania=mysqli_real_escape_string($polaczanie,$_POST["inputNrMieszkania"]);
$typplatnosci=mysqli_real_escape_string($polaczanie,$_POST["typPlatnosci"]);
$liczbaOsob=mysqli_real_escape_string($polaczanie,$_POST["liczbaOsob"]);
$idGodzina=mysqli_real_escape_string($polaczanie,$_POST["godzina"]);
$ip=mysqli_real_escape_string($polaczanie,$_POST["ip"]);
} else {
	$blad=1;
}
?>
<!doctype html>
<html lang="pl_PL">
  <head>
    <title>Valentines Day :: Pizzeria Siciliana :: Hajnówka</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="theme-color" content="#db5945">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link href='http://fonts.googleapis.com/css?family=Alegreya+SC&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<style type="text/css">
	body {
		font-family: 'Alegreya SC', sans-serif;
	}
	#tlo {
    display: table;
    background: url('tlo.jpg');
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
</body>
<div id="tlo">
<div class="container">
	<div class="row opacity">
		<div class="col-sm-4 text-center">
		  <img src="logo.png" style="width:100%;" alt="LOGO" />
		  <h1 style="font-size:40px; font-weight:800;">walentynki 2018</h1>
		  <img src="./serce.png" style="width:100%;" alt="serca" />
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
			<img src="./para.png" style="width:60%;" alt="serca" />
		</div>
	</div>
	<div class="row opacity">
		<div class="row">
			<div class="col-sm-3">
				<h3> Przystawka</h3>
				<img src="./antipasti.jpg" alt="przystawka" style="width:100%;"/>
				<h3> Mozzarella</h3>
				Mozzarella z pomidorami, skropiona oliwą z bazylią
				<hr>
				<h3> Sałatka</h3>
				Rukola z roszpunką, pomidorki cherry, ser feta, na koniec posypane ziarnami słonecznika i polane sosem.
			</div>
			<div class="col-sm-3">
			<h3> Danie Główne</h3>
			  <img src="./lazania.jpg" alt="lazania" style="width:100%;"/>
			  <h3> Pizza</h3>
				Dowolna pizza z naszego menu lub specjalnie przygotowana pizza na wydarzenie z sosem serowym na spodzie pizzy.
				<hr>
				<h3> Lasagne</h3>
				Porcja lasagne składająca się z warstw makaronu, przekładanych serem, autorskim sosem bolońskim oraz sosem beszamel, posypana świeżo startym  parmezanem.
			
			</div>
			<div class="col-sm-3">
			<h3> Deser</h3>
			  <img src="./szarlotka.jpg" alt="ciasto" style="width:100%;"/>
			  <h3> Ciasto</h3>
				Szarlotka na ciepło z lodami, polana odrobiną czekolady.
			</div>
			<div class="col-sm-3">
			<h3> Napój</h3>
			  <img src="./napoj.jpg" alt="napoj" style="width:100%;"/>
			  <h3> Napój</h3>
				Dwa dowolnie wybrane napoje, dostępne z naszego menu.
			</div>
		</div>
	</div>
	<div id="suc" class="row opacity">
	<?php if(isset($blad) && $blad==1){ ?>
		<div class="alert alert-danger alert-dismissable fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Błąd!</strong> Twoja rezerwacja nie została pomyślnie wysłana.
		</div>
	<?php } else { ?>
		<div class="alert alert-success alert-dismissable fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Zarezerwowano!</strong> Twoja rezerwacja została pomyślnie wysłana.<br /><br />
			<strong>Imię: </strong><?=$imie;?><br />
			<strong>Nazwisko: </strong><?=$nazwisko;?><br />
			<strong>Email: </strong><?=$email;?><br />
			<strong>Nr Telefonu: </strong><?=$tel;?><br />
			<strong>Adres: </strong><?php echo $ulica." ".$nrdomu; if(!empty($_POST['inputNrMieszkania'])){echo "/".$nrmieszkania;}?><br />
			<strong>Płatność: </strong><?php while($typPlatnosci=$platnosc->fetch_assoc()){ if($typPlatnosci['id_platnosci']==$typplatnosci){echo $typPlatnosci['tytul_platnosci'];}}?> <br />
			<strong>Godzina: </strong><?php while($godzina=$wszystkieGodziny->fetch_assoc()){ if($godzina['id_godziny']==$idGodzina){echo $godzina['godzina_start'];}}?> <br />
			<strong>Liczba osób: </strong><?=$liczbaOsob;?><br />
		</div>
		
		<div class="alert alert-warning alert-dismissable fade in">
		<strong> Opłać zamówienie już teraz lub w naszym lokalu przy ul. Górnej 17 w Hajnówce!</strong><br /><br />
		<strong> Nr konta: </strong>18 1240 5279 1111 0010 5178 4417<br />
		<strong> Nazwa odbiorcy: </strong>P.P.H.U. "Bar-pizza" S.C.<br />
		<strong> Adres odbiorcy: </strong>ul. Górna 17, 17-200 Hajnówka<br />
		<strong> Tytuł: </strong>Rezerwacja walentynkowa.<br />
		
		</div>
		<?php
	
	if($polaczanie->connect_errno!=0)
	{
	  echo "Error: ".$polaczanie->connect_errno."Opis: ".$polaczanie->connect_errno;
	}else{
	  $sql="INSERT INTO klienci(`id_klienta`, `imie`, `nazwisko`, `email`, `ulica`, `nr_domu`, `nr_mieszkania`, `nr_telefonu`, `ip`)
	  VALUES(NULL,'$imie','$nazwisko','$email','$ulica',$nrdomu,'$nrmieszkania',$tel,'$ip')";
		 if ($polaczanie->query($sql) === TRUE) {
			 {
				 $sql3="SELECT * FROM klienci ORDER BY id_klienta DESC LIMIT 1";
				if($Klienci = @$polaczanie->query($sql3))
				{
				  $idKlienta=$Klienci->fetch_assoc();
				  $idKlienta=$idKlienta['id_klienta'];
				}
				 $sql2="INSERT INTO rezerwacja(`id_rezerwacji`, `id_klienta`, `id_godziny`, `id_platnosci`, `liczba_osob`)
				  VALUES(NULL,$idKlienta,$idGodzina,$typplatnosci, $liczbaOsob)";
					 if ($polaczanie->query($sql2) === TRUE) {
					} else {
						echo "Error: " . $sql2 . "<br>" . $polaczanie->error;
					}
			 }
		} else {
			echo "Error: " . $sql . "<br>" . $polaczanie->error;
		}
	}
	
	} ?>
		
	</div>
</div>
</div>
</body>
</html>