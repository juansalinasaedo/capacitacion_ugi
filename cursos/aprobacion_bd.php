<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";
}
        
  $user_id=$_SESSION["user_id"];
  $mysqli = new mysqli('localhost', 'root', '', 'capacitaciones');
  mysqli_set_charset($mysqli,'utf8'); // para mostrar correctamente los acentos y las ñ 
?>


<?php 

include ('conecta.php');

//**************************** FUNCIONES ****************************//
function scriptAlert( $msn ){

       $script  = '<script language="JavaScript">';
       $script .= 'alert("'. $msn .'")';
       $script .= '</script>';
       echo $script;
}


/**
*  Java Script Alert --> mustra mensaje y redirecciona 
*/
function scriptAlertGo( $msn, $url ){

       $script  = '<script language="JavaScript">';
       $script .= 'alert("'. $msn .'");';
       $script .= 'window.location.href =\''. $url .'\';';
       $script .= '</script>';

       echo $script;
       exit;
}
//********************* FIN FUNCIONES ***************************///


// ACA RESCATAMOS EL VALOR DE LOS CAMPOS EN VARIABLES


		$id_usuario=$_POST["id_usuario"];
    $id_cursos=$_POST["id_cursos"];
    $aprobacion=$_POST["aprobacion"];
    $nombre_alumno=$_POST["nombre_alumno"];
//		$ip_usuario=$_SERVER["REMOTE_ADDR"];  
		  
$con=mysqli_connect("localhost", "root", "");
$conex=mysqli_connect("localhost", "root", "","capacitaciones");
 echo "ID del usuario: ", $id_usuario, " <br> ","Opcion de aprobacion seleccionada: ", $aprobacion,"<br>","ID del curso: ", $id_cursos, "<br>";

$result = mysqli_query($conex, "UPDATE inscripciones SET  aprobado = 'aprobado' where id_usuario='$id_usuario' and id_curso='$id_cursos'");
      if($result )
      {     
         //  while ($registro = mysqli_fetch_array($result))
         //  {   
            //  $aprobado = $registro['aprobado'];
              scriptAlertGo('!La inscripción del usuario fue aprobada!','../bienvenido.php');
         
      }

     // echo " Estado de aprobacion en BD: ", $aprobado;
 
/* if ($aprobado=='pendiente' and $aprobacion=='Aprobado'){ 
   $sql_disponible=("UPDATE  `capacitaciones`.`inscripciones` SET  `aprobado` =  'si' WHERE  `inscripciones`.`id_curso` = '$id_cursos' and `inscripciones`.`id_usuario` = '$id_usuario' ");
  echo mysqli_query($conex, $sql_disponible); 
  echo"<Script language='JavaScript' type='text/JavaScript'>
      alert('!Usted aprobo al usuario al curso')
      window.location.href='#';
       </Script>";

 }else if ($aprobado=='pendiente' and $aprobacion=='Rechazado'){

            $sql_disponible=("UPDATE  `capacitaciones`.`inscripciones` SET  `aprobado` =  'no' WHERE  `inscripciones`.`id_curso` = '$id_cursos' and `inscripciones`.`id_usuario` = '$id_usuario' ");
            echo mysqli_query($conex, $sql_disponible); 
            echo"<Script language='JavaScript' type='text/JavaScript'>
                alert('!Usted no aprobo al usuario al curso')
                window.location.href='#';
                 </Script>";} */

// Envio de correo aviso 

/*
  	    $asunto = "CONTACTO INSCRIPCIONES DE CURSOS - FISCALIA REGIONAL DEL MAULE"; 
       $headers = "MIME-Version: 1.0\r\n"; 
		   $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
		   $headers .="From: $mail\r\n"; 
		    

		   $body  = '<html>
<head>
<title>Formulario</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>

<body>
<table width="500" border="0" align="left" cellpadding="1" cellspacing="2">
  <tr>
    <td bgcolor="#CCCCCC"><table width="500"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
        <td height="3" colspan="3" bgcolor="#000000"></td>
      </tr>
      <tr>
        <td colspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td width="24" height="21" align="left" valign="top">&nbsp;</td>
        <td colspan="2" align="left" valign="top"><strong>Contacto Inscripciones Cursos - Fiscalia Regional del Maule</strong></td>
      </tr>
      <tr>
        <td height="21" align="left" valign="top">&nbsp;</td>
        <td width="78" align="left" valign="top">&nbsp;</td>
        <td width="398" align="left" valign="top">&nbsp;</td>
      </tr>
     
	     <tr>
        <td height="21" align="left" valign="top">&nbsp;</td>
        <td align="left" valign="top"><strong>Nombre:</strong></td>
        <td align="left" valign="top">'.$mail.' </td>
      </tr>
      
      <tr>
        <td height="24" align="left" valign="top">&nbsp;</td>
        <td height="24" align="left" valign="top"><strong>Curso:</strong></td>
        <td height="24" align="left" valign="top"> '.$nombre_curso.' </td>
      </tr>


      <tr>
        <td height="24" align="left" valign="top">&nbsp;</td>
        <td height="24" align="left" valign="top"><strong>Mensaje:</strong></td>
        <td height="24" align="left" valign="top"> '.$mensaje.' </td>
      </tr>

    </table></td>
  </tr>
</table>
</body>
</html>';

			  if (mail("jfsalinas@minpublico.cl",$asunto,$body,$headers)) { 
			   
		  	   scriptAlertGo('!Su correo fue enviado con exito, dentro de las proximas horas nos contactaremos con Usted!','../bienvenido.php');
		 	  }else{
			   scriptAlert('!Ha ocurrido un problema en el envio, por favor intente nuevamente!','../bienvenido.php');
			  }	   */
?>