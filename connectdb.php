<?php 
define("HOSTNAME","localhost");
define("USERNAME","exima1");
define("PASSWORD","exima123");
define("DATABASE","pizza");

$dbhandle=new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE) or die("Unable to Connect DB");

?>
