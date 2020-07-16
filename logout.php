<?php

include_once("db_config.php");

if(isset($_SESSION["userid"])){
	session_destroy();
}	
header("location:".DOMAIN."/mainpage.html");
?>