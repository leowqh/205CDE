<?php
setcookie("user", "", time()+36000);
setcookie("password", "", time()+36000);
header('Location: index.php');

?>
