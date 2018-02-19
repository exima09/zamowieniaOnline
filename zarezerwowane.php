<?php
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
$sql="SELECT *
FROM `rezerwacja` r
left join klienci k on r.id_klienta=k.id_klienta
left join godziny g on r.id_godziny=g.id_godziny
left join platnosc p on r.id_platnosci=p.id_platnosci
order by r.id_godziny, k.data_rejestracji";
if($zgloszenia = @$polaczanie->query($sql))
{
  $iloscZgloszen=$zgloszenia->num_rows;
}
include './template/header.php';
?>
<div class="row opacity">
<table class="table table-striped">
    <thead>
      <tr>
        <th>Imię</th>
        <th>Nazwisko</th>
        <th>Adres</th>
		<th>Nr Telefonu</th>
		<th>E-mail</th>
		<th>Godzina</th>
		<th>Typ Płatności</th>
		<th>Data zgłoszenia</th>
		<th>Liczba Osób</th>
      </tr>
    </thead>
    <tbody>
	<?php if($iloscZgloszen>0){ while($zgloszenie=$zgloszenia->fetch_assoc()){ ?>
      <tr>
        <td><?=$zgloszenie['imie']?></td>
        <td><?=$zgloszenie['nazwisko']?></td>
        <td><?php echo $zgloszenie['ulica']." ".$zgloszenie['nr_domu']; if($zgloszenie['nr_mieszkania']!=0){echo "/".$zgloszenie['nr_mieszkania'];}?></td>
        <td><?=$zgloszenie['nr_telefonu']?></td>
        <td><?=$zgloszenie['email']?></td>
        <td><?=$zgloszenie['godzina_start']?></td>
        <td><?=$zgloszenie['tytul_platnosci']?></td>
        <td><?=$zgloszenie['data_rejestracji']?></td>
        <td><?=$zgloszenie['liczba_osob']?></td>
      </tr>
	<?php }}
	else echo "BRAK ZGŁOSZEŃ!";
	 ?>
    </tbody>
  </table>
  </div>
<?php
include './template/footer.php';
?>