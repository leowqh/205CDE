<?php

include "db/db.php";

if(isset($_REQUEST['username'])&&isset($_REQUEST['password'])){

	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];

	$result = $mysqli->query("SELECT * FROM users WHERE username = '".$username."' AND password = '".sha1($password)."'");

	if(mysqli_num_rows($result) >0){

		$row = $result->fetch_assoc();
		setcookie("user", $username, time()+36000);
		setcookie("password", $row['password'], time()+36000);
		$return_json = ["status"=>"true"];

		
	}else{
		$return_json = ["status"=>"false",
						"reason"=>"2"];
	}
	echo json_encode((object)$return_json,JSON_UNESCAPED_SLASHES);

}else if(isset($_REQUEST['email'])){
	$email = $_REQUEST['email'];
	$result = $mysqli->query("SELECT * FROM users WHERE email='".$email."'");
	
	if(mysqli_num_rows($result) >0){

		$return_json = ["status"=>"false",
						"reason"=>"2"];
	}else{

		$return_json = ["status"=>"true"];
	}
	echo json_encode((object)$return_json,JSON_UNESCAPED_SLASHES);
	
}else if(isset($_REQUEST['username'])){

	$username = $_REQUEST['username'];
	$result = $mysqli->query("SELECT * FROM users WHERE username = '".$username."'");

	if(mysqli_num_rows($result) >0){

		$return_json = ["status"=>"false",
						"reason"=>"2"];
	}else{

		$return_json = ["status"=>"true"];
	}
	echo json_encode((object)$return_json,JSON_UNESCAPED_SLASHES);

}


?>