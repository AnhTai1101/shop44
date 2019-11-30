<?php
 	class Connection{
 		//ham ket noi csdl
	 	public static function getInstance(){
	 		//khai bao bien toan cuc de su dung o day
	 		global $host;
	 		global $db;
	 		global $user;
	 		global $password;
	 		//ket noi csdl
	 		$conn = new PDO("mysql:host=$host;dbname=$db",$user,$password);
	 		//set charset de hien thi duoc tieng viet
	 		$conn->exec("set names 'utf8'");
	 		//tra bien ket noi de lay tu cac ham khac
	 		return $conn;
	 	}
 	}  	
  ?>