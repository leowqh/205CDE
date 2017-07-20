<?php
//setup SQL connection

$database_hostaddress = "localhost";
$database_username = "root";
$database_password = "";
$database_name = "sellfast";

$mysqli = new mysqli("localhost","root","","sellfast") or die("unable to connect");
 
echo "great work";

?>