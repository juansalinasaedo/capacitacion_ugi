<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
	print "<script>alert(\"Acceso invalido!\");window.location='index.php';</script>";
}
  $user_id=$_SESSION["user_id"];
  $mysqli = new mysqli('localhost', 'root', '', 'capacitaciones');
  mysqli_set_charset($mysqli,'utf8'); // para mostrar correctamente los acentos y las ñ 
?>

<?php
//Exportar datos de php a Excel
header("Content-Type: application/vnd.ms-excel" );
header("Expires: 0" );
header("Cache-Control: must-revalidate, post-check=0, pre-check=0" );
header("content-disposition: attachment;filename=Reportes.xls" );
?>
<HTML>
<TITLE>.: HOME :.</TITLE>
<meta charset="utf-8">
</head>
<body>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
$NombreBD = "capacitaciones";
$Servidor = "localhost";
$Usuario = "root";
$Password ="";
$IdConexion = mysql_connect($Servidor, $Usuario, $Password);
mysql_select_db($NombreBD, $IdConexion);
//$sql="SELECT * FROM  `inscripciones` ORDER BY  `inscripciones`.`id_inscripcion` ASC";

$sql="SELECT inscripciones.id_usuario, 
						inscripciones.id_inscripcion,
						inscripciones.id_curso,
						inscripciones.email,
						inscripciones.fecha_inscripcion,
						inscripciones.mensaje,
						inscripciones.aprobado,
						usuarios.nombre,
						usuarios.apellido,
						cursos.nombre_curso,
						cursos.tipo_jornada
						from inscripciones
						inner join usuarios on usuarios.id = '$user_id'
						inner join cursos on cursos.id_curso = inscripciones.id_curso
						where inscripciones.id_usuario = '$user_id' 
						order by id_curso DESC";
$result=mysql_query($sql,$IdConexion);

?>

<TABLE BORDER=1 align="center" CELLPADDING=1 CELLSPACING=1>
<TR>

<TD>ID INSCRIPCIÓN</TD>
<TD>NOMBRE DE USUARIO</TD>
<TD>APELLIDO DE USUARIO</TD>
<TD>NOMBRE DE CURSO</TD>
<TD>FECHA DE INSCRIPCION</TD>
<TD>JORNADA</TD>
<TD>EMAIL</TD>
<TD>APROBACION</TD>
<TD>MENSAJE</TD>
</TR>
<?php

while($row = mysql_fetch_array($result)) {
printf("<tr>
<td>&nbsp;%s</td>
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
</tr>", $row["id_inscripcion"],$row["nombre"],$row["apellido"],$row["nombre_curso"],$row["fecha_inscripcion"],$row["tipo_jornada"],$row["email"],$row["aprobado"],$row["mensaje"]);
}
mysql_free_result($result);
mysql_close($IdConexion); //Cierras la Conexión
?>
</table>
</body>
</html>