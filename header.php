<?php 
$islogin = 0;
if(isset($_COOKIE['user']) && isset($_COOKIE['password'])){

  $username = $_COOKIE['user'];
  $password = $_COOKIE['password'];

  $result = $mysqli->query("SELECT * FROM users WHERE username = '".$username."' AND password = '".$password."'");

  if(mysqli_num_rows($result) >0){

    $islogin = 1;
  }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
  <meta name="HandheldFriendly" content="true"/>
  <meta name="msapplication-TileColor" content="#333">
  <meta name="theme-color" content="#ffffff">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SellFast</title>
 
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Heebo|Lora:700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oregano|Poiret+One|Vibur" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> 

    <style>
    html, body, h1, h2, h3, h4, h5, h6 {
    font-family: 'Heebo', sans-serif;
    }
    </style>

  </head>
  <body>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top header_font_size sidebar" style="z-index:3;width:270px;color:#6b6b6b !important;letter-spacing:0.06667rem;padding-bottom:40px" id="sidebar">

    <div class="w3-container w3-display-container w3-padding-16">
    
      <div style="width:122px;height:52px;"><a href="index.php"><img src="image/logo.png" style="cursor:pointer;max-width:100%;max-height:100%;margin-top:17%;margin-left:5%;object-fit:contain"></a></div>
    </div>
    <div class="sidebarlinks" style="margin-left: 15px;margin-right:15px;">
    <?php if($islogin == 1){ ?>

      <a href="index.php" class="w3-bar-item" style="padding-bottom:9px;color:black;margin-top:10%">HOME</a>
      <a href="logout.php" class="w3-bar-item" style="padding-bottom:9px;color:black;margin-top:10%">LOGOUT</a> 

  <?php  }else{ ?>

      <a href="index.php" class="w3-bar-item" style="padding-bottom:9px;color:black;margin-top:10%">HOME</a>
      <a href="login.php" class="w3-bar-item" style="padding-bottom:9px;color:black;margin-top:10%">LOGIN</a> 
      <a href="register.php" class="w3-bar-item" style="padding-bottom:9px;color:black;margin-top:10%">REGISTER NOW</a>  

  <?php  } ?>

    </div>
    </nav>
<div class="w3-main" style="margin-left:270px;">
  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:53px"></div>

</body>
</html>