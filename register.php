<?php
include "db/db.php";
include "header.php";
include "footer.php";

if($islogin == 1){

	header("location:index.php");
}

if(isset($_POST['username'])&&isset($_POST['firstname'])&&isset($_POST['lastname'])&&isset($_POST['email'])&&isset($_POST['password'])){

	$username = $_POST['username'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$mysqli->query("INSERT INTO `users` (`username`,`password`, `email`, `firstname`, `lastname`) 
    				VALUES ('$username', '".sha1($password)."','$email', '$firstname','$lastname');"); 

	header("location:login.php");

}

?>


 
<script type="text/javascript">
function validation(){

	var firstname = document.getElementById("firstname").value;
	var lastname = document.getElementById("lastname").value;
	var password = document.getElementById("password").value;
	var email = document.getElementById("email").value;
	var confirm_password = document.getElementById("confirm_password").value;
	var username = document.getElementById("username").value;
	var check = 0;

	if(firstname.trim() == ""){
		document.getElementById("v_firstname").innerHTML = "Your first name is required.";
  		document.getElementById("v_firstname").style.visibility = "visible";
  		document.getElementById("v_errormsg").innerHTML = "Please fill in all fields.";
  		document.getElementById("v_errormsg").style.visibility = "visible";

	}else{
		document.getElementById("v_firstname").style.visibility = "hidden";
		check = check +10;
	}

	if(lastname.trim() == ""){
		document.getElementById("v_lastname").innerHTML = "Your last name is required.";
  		document.getElementById("v_lastname").style.visibility = "visible";
  		document.getElementById("v_errormsg").innerHTML = "Please fill in all fields.";
  		document.getElementById("v_errormsg").style.visibility = "visible";

	}else{
		document.getElementById("v_lastname").style.visibility = "hidden";
		check = check +10;
	}
	
	if(username.trim() ==""){

		document.getElementById("v_username").innerHTML = "Your username is required.";
  		document.getElementById("v_username").style.visibility = "visible";
  		document.getElementById("v_errormsg").innerHTML = "Please fill in all fields.";
  		document.getElementById("v_errormsg").style.visibility = "visible";

	}else if(/\s/.test(username.trim())){

		document.getElementById("v_username").innerHTML = "Your username must not contain any space.";
  		document.getElementById("v_username").style.visibility = "visible";
  		document.getElementById("v_errormsg").innerHTML = "Please try again.";
  		document.getElementById("v_errormsg").style.visibility = "visible";

	}else{
 
		var xhr = new XMLHttpRequest();
		xhr.open("GET", "http://localhost/sellfast/check_user.php?username="+username.trim(), false);
		xhr.send();
		var data=xhr.responseText;
		var jsonResponse = JSON.parse(data);
		var status = jsonResponse["status"];
		if(status == "true"){
			document.getElementById("v_username").style.visibility = "hidden";
			check = check +10;
		}else{
			document.getElementById("v_username").innerHTML = "This username has been taken.";
  			document.getElementById("v_username").style.visibility = "visible";
  			document.getElementById("v_errormsg").innerHTML = "Please try again.";
  			document.getElementById("v_errormsg").style.visibility = "visible";
		}
	}

	if(email.trim() ==""){

		document.getElementById("v_email").innerHTML = "Your email address is required.";
  		document.getElementById("v_email").style.visibility = "visible";
  		document.getElementById("v_errormsg").innerHTML = "Please fill in all fields.";
  		document.getElementById("v_errormsg").style.visibility = "visible";
 
	}else if(!/^\w+([\.-]?\ w+)*@\w+([\.-]?\ w+)*(\.\w{2,3})+$/.test(email)){

		document.getElementById("v_email").innerHTML = "This email address is invalid.";
  		document.getElementById("v_email").style.visibility = "visible";
  		document.getElementById("v_errormsg").innerHTML = "Please try again.";
  		document.getElementById("v_errormsg").style.visibility = "visible";

	}else{
		
		var xhr = new XMLHttpRequest();
		xhr.open("GET", "http://localhost/sellfast/check_user.php?email="+email.trim(), false);
		xhr.send();
		var data=xhr.responseText;
		var jsonResponse = JSON.parse(data);
		var status = jsonResponse["status"];
		if(status == "true"){
			document.getElementById("v_email").style.visibility = "hidden";
			check = check +10;
		}else{
			document.getElementById("v_email").innerHTML = "This email address has been taken.";
  			document.getElementById("v_email").style.visibility = "visible";
  			document.getElementById("v_errormsg").innerHTML = "Please try again.";
  			document.getElementById("v_errormsg").style.visibility = "visible";
		}

	}

	if(password.trim() == ""){

		document.getElementById("v_password").innerHTML = "Your password is required.";
  		document.getElementById("v_password").style.visibility = "visible";
  		document.getElementById("v_errormsg").innerHTML = "Please fill in all fields.";
  		document.getElementById("v_errormsg").style.visibility = "visible";

	}else if(password.trim().length < 7){

		document.getElementById("v_password").innerHTML = "Your password must be at least 8 characters.";
  		document.getElementById("v_password").style.visibility = "visible";
  		document.getElementById("v_errormsg").innerHTML = "Please try again.";
  		document.getElementById("v_errormsg").style.visibility = "visible";

	}else{
		document.getElementById("v_password").style.visibility = "hidden";
		check = check +10;
	}

	if(confirm_password.trim() == ""){

		document.getElementById("v_confirm_password").innerHTML = "Your password confirmation is required.";
  		document.getElementById("v_confirm_password").style.visibility = "visible";
  		document.getElementById("v_errormsg").innerHTML = "Please fill in all fields.";
  		document.getElementById("v_errormsg").style.visibility = "visible";

	}
	else if(password != confirm_password){

		document.getElementById("v_confirm_password").innerHTML = "Your passwords don't match.";
  		document.getElementById("v_confirm_password").style.visibility = "visible";
  		document.getElementById("v_errormsg").innerHTML = "Please try again.";
  		document.getElementById("v_errormsg").style.visibility = "visible";

	}else{
		document.getElementById("v_confirm_password").style.visibility = "hidden";
		check = check +10;
	}



	if(check == 60){ 
		alert("Register successful");
		return true;
	}else{
		return false;
	}	
}

function forceLowercase(strInput) 
{
	strInput.value=strInput.value.toLowerCase();
}
</script>



<div class="w3-container" style="padding-top:41px;padding-bottom:41px">
	<div class="section_container">
	<div class="section_line">
	<h1 class="section_title">Register</h1>
	</div>
	</div>

<div class="w3-row">
<div class="w3-container"  style="padding-left:17%;padding-right:1%;margin-top:0%">

<h3 class="section_description w3-hide-small">Register a New Account</h3>

<div class="w3-twothird" style="padding-left:1%;padding-right:1%">
<form method="post" class="w3-row" onsubmit="return validation()" style="font-size:14px;" action="register.php">

<div class="w3-row form_labels" style="padding-left:2%;">Username</div>
<div class="w3-row">
	<input class="w3-input" type="text" id="username" name="username" maxlength="20" style="padding-left:3%;border: 1px solid #e5e5e5;color:#505050;" placeholder="" onkeyup="return forceLowercase(this);">
	<div id="v_username" style="font-size:13px;color:#DC143C;visibility:hidden;padding-left:3%;height:10px"></div>
</div>
<div class="w3-row form_labels" style="padding-left:2%;">Password</div>
<div class="w3-row">
	<input class="w3-input" type="password" id="password" name="password" maxlength="20" style="padding-left:3%;border: 1px solid #e5e5e5;color:#505050;" placeholder="">
	<div id="v_password" style="font-size:13px;color:#DC143C;visibility:hidden;padding-left:3%;height:10px"></div>
</div>
<div class="w3-row form_labels" style="padding-left:2%;">Confirm Password</div>
<div class="w3-row">
	<input class="w3-input" type="password" id="confirm_password" name="confirm_password" maxlength="20" style="padding-left:3%;border: 1px solid #e5e5e5;color:#505050;" placeholder="">
	<div id="v_confirm_password" style="font-size:13px;color:#DC143C;visibility:hidden;padding-left:3%;height:10px"></div>
</div>
<div class="w3-row form_labels" style="padding-left:2%;">First Name</div>
<div class="w3-row">
	<input class="w3-input" type="text" id="firstname" name="firstname" maxlength="50" style="padding-left:3%;border: 1px solid #e5e5e5;color:#505050;" placeholder="">
	<div id="v_firstname" style="font-size:13px;color:#DC143C;visibility:hidden;padding-left:3%;height:10px"></div>
</div>
<div class="w3-row form_labels" style="padding-left:2%;">Last Name</div>
<div class="w3-row">
	<input class="w3-input" type="text" id="lastname" name="lastname" maxlength="50" style="padding-left:3%;border: 1px solid #e5e5e5;color:#505050;" placeholder="" >
	<div id="v_lastname" style="font-size:13px;color:#DC143C;visibility:hidden;padding-left:3%;height:10px"></div>
</div>
<div class="w3-row form_labels" style="padding-left:2%;">Email Address</div>
<div class="w3-row">
	<input class="w3-input" type="text" id="email" name="email" style="padding-left:3%;border: 1px solid #e5e5e5;color:#505050;" placeholder="">
	<div id="v_email" style="font-size:13px;color:#DC143C;visibility:hidden;padding-left:3%;height:10px"></div>
</div>
<br>

<div class="w3-row">
<input type="submit" value="Register" style="font-size:14px;float:left;color:#3e3e3e;background-color:#e5e5e5;letter-spacing: 0.2px;">
</div>

<div id="v_errormsg" style="font-size:13px;color:#DC143C;visibility:hidden;height:10px;padding-top:2%"></div>







</form>
</div>



</div>
</div>
</div>
