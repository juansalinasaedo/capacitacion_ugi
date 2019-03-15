<?php

function Conectarse()
{

	$host="127.0.0.1";
	$user="root";
	$password="";
	$db="capacitaciones";
	$link = new mysqli($host,$user,$password,$db);

	return $link;
}


?>