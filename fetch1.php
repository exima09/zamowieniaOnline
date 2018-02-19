<?php
//fetch.php
$connect = mysqli_connect("localhost", "exima1", "exima123", "pizza");
$request = mysqli_real_escape_string($connect, $_POST["query"]);
$request2 = mysqli_real_escape_string($connect, $_POST["street"]);
if (!$connect->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $connect->error);
    exit();
}
$query = "
 SELECT * FROM klienci WHERE nr_domu LIKE '%".$request."%' and ulica LIKE '%$request2%'
";

$result = mysqli_query($connect, $query);

$data = array();

if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_assoc($result))
 {
  $data[] = $row["nr_domu"];
 }
 echo json_encode($data);
}

?>