<?php

if(!empty($_POST)){
	if(isset($_POST["username"]) &&isset($_POST["password"])){
		if($_POST["username"]!=""&&$_POST["password"]!=""){
			include "conexion.php";
			
			$user_id=null;
			$sql1= "select * from usuarios where (username=\"$_POST[username]\" or email=\"$_POST[username]\") and password=\"$_POST[password]\" ";
			$con=mysqli_connect('localhost', 'root', '', 'capacitaciones');
			$query = $con->query($sql1);
			while ($r=$query->fetch_array()) {
				$user_id=$r["id"];
				break;
			}
			if($user_id<>$r["id"]){
				print "<script>alert(\"Acceso invalido 2019.\")0;window.location='../../index.php';</script>";
			}else{
				session_start();
				$_SESSION["user_id"]=$user_id;
				print "<script>window.location='../../bienvenido.php';</script>";				
			}
		}
	}
}



?>