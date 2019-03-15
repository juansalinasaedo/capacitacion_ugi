<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";
}
        
  $user_id=$_SESSION["user_id"];
  $mysqli = new mysqli('127.0.0.1', 'root', '', 'capacitaciones');
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

/*if ($_SERVER['HTTP_REFERER'] != "http://copa.utalca.cl/php/contacto.php"){  
scriptAlertGo(' NO AUTORIZADO - !Debe llenar los datos del formulario!','http://copa.utalca.cl/php/contacto.php');
exit;  
} */ 

 

// ACA RESCATAMOS EL VALOR DE LOS CAMPOS EN VARIABLES


		$id_curso=$_POST["id_curso"];
    $nombre_curso=$_POST["nombre_curso"];
    $mail=$_POST["mail"];
		$mensaje=$_POST["mensaje"];
    $user_id=$_SESSION["user_id"];

//		$ip_usuario=$_SERVER["REMOTE_ADDR"];  
		  
$con=mysqli_connect("127.0.0.1", "root", "");
$conex=mysqli_connect("127.0.0.1", "root", "","capacitaciones");
 echo $nombre_curso, " - " , $user_id, " - " , $mail, " - " , $id_curso;

$result = mysqli_query($conex, "SELECT vacantes FROM cursos where vacantes >0 and id_curso=$id_curso");
$cant_vacantes=0;
      if($result)
      {     
           while ($registro = mysqli_fetch_array($result))
           {   
              $cant_vacantes = $registro['vacantes'];
              
         //     echo $cant_vacantes;  // captura el valor del select $result y lo guarda en la variable $cant_vacantes
          }
      }

      echo " - ", $cant_vacantes;
 
if ($cant_vacantes==0){ 
   $sql_disponible=("UPDATE  `capacitaciones`.`cursos` SET  `disponible` =  'no' WHERE  `cursos`.`id_curso` = '$id_curso' ");
  echo mysqli_query($conex, $sql_disponible); 
  echo"<Script language='JavaScript' type='text/JavaScript'>
      alert('!Los cupos de este curso se han acabado!, el curso ya no estara disponible')
      window.location.href='../bienvenido.php';
       </Script>";

 }else{



         $conex=mysqli_connect("127.0.0.1", "root", "","capacitaciones");
         $usuario_id = mysqli_query($conex, "SELECT id_usuario FROM inscripciones WHERE id_usuario='$user_id' and id_curso='$id_curso'");
         $id_usuario = 0;
          if($usuario_id)
          {
              while ($registro_usuario = mysqli_fetch_array($usuario_id))
                { 
                  $id_usuario = $registro_usuario['id_usuario']; 
                }
          }

          echo " - ", $id_usuario;


         if ($id_usuario == $user_id){
            scriptAlertGo('El usuario ya esta inscrito en este curso','../bienvenido.php');
           }else{

                $sql = mysqli_query($conex, "INSERT INTO `capacitaciones`.`inscripciones` (`id_usuario`, `id_curso`, `email`, `fecha_inscripcion`, `mensaje`, `aprobado`) VALUES ('$user_id', '$id_curso', '$mail', NOW(), '$mensaje', 'pendiente')");
       
                 $resta_vacantes = ("UPDATE `capacitaciones`.`cursos` set `vacantes` = `vacantes` - 1 where `cursos`.`id_curso` = '$id_curso'");
                 mysqli_query($con, $resta_vacantes);

                 $consulta_curso = mysqli_query($conex, "SELECT `nombre_curso` FROM `cursos` where id_curso='$id_curso'");
                  if($consulta_curso)
                  {
                      while ($registro3 = mysqli_fetch_array($consulta_curso)){ $nombre_curso = $registro3['nombre_curso']; }
                  }
               //   scriptAlertGo('!Su correo fue enviado con exito, dentro de las proximas horas nos contactaremos con Usted!','../bienvenido.php');


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
			  }	   


}}

?>