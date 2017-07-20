<?php

include "db/db.php";
include "header.php";
include "footer.php";

if($islogin == 1){

	header("location:index.php");
}
?>

<style type="text/css">
.loginBtn {

  box-sizing: border-box;
  position: relative;
  /* width: 13em;  - apply for fixed size */
  padding: 0 7px 0 43px;
  border: none;
  text-align: left;
  line-height: 34px;
  white-space: nowrap;
  border-radius: 0.2em;
  font-size: 16px;
  color: #FFF;
}
.loginBtn:before {
  content: "";
  box-sizing: border-box;
  position: absolute;
  top: 0;
  left: 0;
  width: 37px;
  height: 100%;
}
.loginBtn:focus {
  outline: none;
}
.loginBtn:active {
  box-shadow: inset 0 0 0 32px rgba(0,0,0,0.1);
}

</style>

<script type="text/javascript">
function validation(){

	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;

	var xhr = new XMLHttpRequest();
	xhr.open("GET", "http://localhost/sellfast/check_user.php?username="+username.trim()+"&password="+password.trim(), false);
	xhr.send();
	var data=xhr.responseText;
	var jsonResponse = JSON.parse(data);
	var status = jsonResponse["status"]; 
	if(status == "true"){
		return true;
		window.location = "http://localhost/sellfast/index.php";
	}else{
		document.getElementById("v_password").innerHTML = "Incorrect username or password";
		document.getElementById("v_password").style.visibility = "visible";
		return false;
	}

}
</script>

<div class="w3-container" style="padding-top:41px;padding-bottom:41px">
	<div class="section_container">
	<div class="section_line">
	<h1 class="section_title">Login</h1>
	</div>
	</div>



<div class="w3-row" style="padding-left:1%;padding-right:1%">

<div class="w3-container" style="padding-left:17%;padding-right:1%;margin-top:0%">

<div class="w3-twothird" style="padding-left:1%;padding-right:1%">
<form method="post" class="w3-row" onsubmit="return validation()" style="font-size:14px;">
<input type="hidden" name="ispost" value="1">

<div class="w3-row form_labels" style="padding-left:2%;">Username</div>
<div class="w3-row">
	<input class="w3-input" type="text" id="username" name="username" maxlength="20" style="padding-left:3%;border: 1px solid #e5e5e5;color:#505050;" placeholder="">
	<div id="v_username" style="font-size:13px;color:#DC143C;visibility:hidden;padding-left:3%;height:10px"></div>
</div>
<div class="w3-row form_labels" style="padding-left:2%;">Password</div>
<div class="w3-row">
	<input class="w3-input" type="password" id="password" name="password" maxlength="20" style="padding-left:3%;border: 1px solid #e5e5e5;color:#505050;" placeholder="">
	<div id="v_password" style="font-size:13px;color:#DC143C;visibility:hidden;padding-left:3%;height:10px"></div>
</div>
</div>
		<div class="w3-cell-row" style="margin-top:18%">
		<div class="w3-cell w3-left-align" >
			<button class="w3-button w3-round w3-hover-light-grey" style="font-size:14px;background-color:cyan;letter-spacing: 0.2px;margin-left:10px;margin-top:20px;">LOGIN</button>
		</div>
	
</form>
</div>
</div>
</div>
</div>