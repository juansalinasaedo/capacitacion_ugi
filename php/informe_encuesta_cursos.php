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
$sql="SELECT * FROM  `inscripciones` ORDER BY  `inscripciones`.`id_inscripcion` ASC";
$result=mysql_query($sql,$IdConexion);

?>

<TABLE BORDER=1 align="center" CELLPADDING=1 CELLSPACING=1>
<TR>
<TD>ID INSCRIPCIÓN</TD>
<TD>ID DE USUARIO</TD>
<TD>ID DE CURSO</TD>
<TD>EMAIL</TD>
<TD>FECHA DE INSCRIPCIÓN</TD>
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
</tr>", $row["id_inscripcion"],$row["id_usuario"],$row["id_curso"],$row["email"],$row["fecha_inscripcion"],$row["mensaje"]);
}
mysql_free_result($result);
mysql_close($IdConexion); //Cierras la Conexión
?>
</table>
</body>
</html>