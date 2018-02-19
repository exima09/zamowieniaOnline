<?php
//fetch.php
$connect = mysqli_connect("localhost", "exima1", "exima123", "pizza");
$request = mysqli_real_escape_string($connect, $_POST["query"]);
if (!$connect->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $connect->error);
    exit();
}
$query = "
 SELECT DISTINCT ulica FROM klienci WHERE ulica LIKE '%".$request."%'
";

$result = mysqli_query($connect, $query);

$data = array();

if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_assoc($result))
 {
  $data[] = $row["ulica"];
 }
 echo json_encode($data);
}

?>