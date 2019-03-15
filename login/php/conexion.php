<?php

function Conectarse()
{

	$host="localhost";
	$user="root";
	$password="";
	$db="capacitaciones";
	$link = new mysqli($host,$user,$password,$db);

	return $link;
}


?>