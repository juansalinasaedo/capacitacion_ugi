<?php //archivo de conexion base de datos


/* $link = mysqli_connect("127.0.0.1","root","") or die(mysqli_error()); 
mysqli_select_db("capacitaciones",$link); */

// 1. Create a database connection
$connection = mysqli_connect('127.0.0.1','root','');
if (!$connection) {
    die("Database connection failed");
}

// 2. Select a database to use 
$db_select = mysqli_select_db($connection, 'capacitaciones');
if (!$db_select) {
    die("Database selection failed: " . mysqli_error($connection));
}


?>