<?php
/**
*
**/

class User
{	
	private $conn;
		
	function __construct(){
		include_once("db_connect.php");
		$db = new Database();
		$this->conn = $db->connect(); 
	}
	
	private function emailExists($email){
		$pre_stmt = $this->conn->prepare("SELECT user_id FROM user WHERE email = ? ");
		$pre_stmt->bind_param("s",$email);
		$pre_stmt->execute() or die($this->conn->error);
		$result = $pre_stmt->get_result();
		if($result->num_rows > 0){
			return 1;
		}else{
			return 0;
		} 
	}
	
	public function createUserAccount($username,$email,$password,$usertype){
		if($this->emailExists($email)){
			return "EMAIL_ALREADY_EXISTS";
		}else{
			$pass_hash = password_hash($password,PASSWORD_BCRYPT,["cost"=>8]);
			$date = date("Y-m-d");
			$notes = "";
			$pre_stmt = $this->conn->prepare("INSERT INTO `user`(`username`, `email`, `password`, `usertype`, `register_date`, `last_login`, `notes`) VALUES (?,?,?,?,?,?,?)");
			$pre_stmt->bind_param("sssssss",$username,$email,$pass_hash,$usertype,$date,$date,$notes);
			$result = $pre_stmt->execute() or die($this->conn->error);
			if($result){
				return 1;
			}else{
				return "SOME_ERROR";
			}
		
			} 
		}
	
	public function userLogin($email,$password){
		$pre_stmt = $this->conn->prepare("SELECT user_id,username,password,last_login FROM user WHERE email = ?");
		$pre_stmt->bind_param("s",$email);
		$pre_stmt->execute() or die($this->conn->error);
		$result = $pre_stmt->get_result();
		if($result->num_rows < 1){
			return "NOT_REGISTERED";
		}else{
			$row = $result->fetch_assoc();
			if(password_verify($password,$row["password"])){
				$_SESSION["userid"] = $row["id"];
				$_SESSION["username"] = $row["username"];
				$_SESSION["last_login"] = $row["last_login"];
				$last_login = date("Y-m-d h:m:s");
				$pre_stmt = $this->conn->prepare("UPDATE user SET last_login = ? WHERE email = ?");
				$pre_stmt->bind_param("ss",$last_login,$email);
				$result = $pre_stmt->execute() or die($this->conn->error);
				if($result){
					return 1;
				}else{
					return 0;
				}
		}else{
			return "PASSWORD_NOT_MATCHED" ;
		}	
		
	}
	}
}
 
//$user = new User();
//echo $user->createUserAccount("Shweta","pai9619@gmail.com","123456","ADMIN"); */


//echo $user->userLogin("pai9619@gmail.com","123456");

//echo $_SESSION["username"];
?>