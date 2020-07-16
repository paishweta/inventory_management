<?php
include("db_config.php");
if(isset($_SESSION['userid'])){
	if($_POST['username']==$username && $_POST['password']==$password){
		$_SESSION['username']=$username;
		echo "<script>location.href='Admin.html'</script>";}
	}else{
		header('Location: mainpage.html');
?>

<?php
include_once("db_config.php");
if(isset($_SESSION["userid"])){
	//echo "WELCOME!! Session Started";
	header("location: enter.html");
}	
?>