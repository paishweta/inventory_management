<?php
include("db_config.php");
include("user.php")

if(isset($_POST["username"]) AND isset($_POST["email"])){
	$user = new User();
	$result = $user->createUserAccount($_POST["username"],$_POST["email"],$_POST["password1"],$_POST["usertype"]);
	echo $result;
}
?>