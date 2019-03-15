<?php 
header("Content-Type: text/html;charset=utf-8");

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


function cerrar2( $msn, $script2){

       $script  = '<script language="JavaScript">';
       $script .= 'alert("'. $msn .'");';
       $script2 .= 'window.close()';
       $script .= '</script>';

       echo $script;
       exit;
}



function cerrar( ){

       $script  = '<script language="JavaScript">';
       $script .= 'window.close();';
       $script .= '</script>';

       echo $script;
       exit;
}

 function swal( $msn ){

       $script  = '<script language="JavaScript">';
       $script .= 'title = "¡mensaje!"';
      $script .= 'timer = 0';
       $script .= '</script>';
       echo $script;
}


//********************* FIN FUNCIONES ***************************///

/*if ($_SERVER['HTTP_REFERER'] != "http://copa.utalca.cl/php/contacto.php"){  
scriptAlertGo(' NO AUTORIZADO - !Debe llenar los datos del formulario!','http://copa.utalca.cl/php/contacto.php');
exit;  
} */ 




//Ejemplo de como usar: 

/* $key=$_POST['key'];
$okey=$_POST['okey']; */

// ACA RESCATAMOS EL VALOR DE LOS CAMPOS EN VARIABLES

		$nombre_relator=$_POST["nombre_relator"];
		$entidad_relator=$_POST["entidad_relator"];

//		$ip_usuario=$_SERVER["REMOTE_ADDR"];  


		  
$con=mysqli_connect("localhost", "root", "");

		if (empty($_POST["nombre_relator"]) or empty($_POST["entidad_relator"])) {
echo"<Script language='JavaScript' type='text/JavaScript'>
			alert('!Datos faltantes, favor de verificar los campos requeridos!')
			window.location.href='relatores_embed.php';
		   </Script>";

 }else{

        
          $conex=mysqli_connect("localhost", "root", "","capacitaciones");
          $relator_nom = mysqli_query($conex, "SELECT `nombre_relator` FROM `relatores` WHERE `nombre_relator` like '$nombre_relator'");
          $result_nm_relator=0;
          if($relator_nom)
          {
              while ($registro_relator = mysqli_fetch_array($relator_nom))
                { 
                  $result_nm_relator = $registro_relator['nombre_relator']; 
                }
          }
        
       // echo $result_nm_relator;
          
         if ($result_nm_relator==null){

             $sql = ("INSERT INTO `capacitaciones`.`relatores` (`nombre_relator`, `entidad_relator`) VALUES ('$nombre_relator', '$entidad_relator')"); //Se insertan los datos a la base de datos y el usuario ya fue registrado con exito.  

			  if (mysqli_query($con, $sql)) { 
			   
		  	  // scriptAlertGo('!El relator fue agregado correctamente!','#');
            echo '!El relator fue agregado correctamente!<br><p style="text-align:center"><input type="submit" id="Login" value="&nbsp;&nbsp;Aceptar&nbsp;&nbsp;" onclick="self.parent.tb_remove();" /></p>';
		 	  }else{
			  // scriptAlert('!Ha ocurrido un problema en la inscripción, por favor intente nuevamente!','#');
         echo '!Ha ocurrido un problema al agregar al relator, por favor intente nuevamente!<br><p style="text-align:center"><input type="submit" id="Login" value="&nbsp;&nbsp;Aceptar&nbsp;&nbsp;" onclick="self.parent.tb_remove();" /></p>';
			  }	   

         }else{
       // 	scriptAlertGo('El nombre del relator ya esta registrado en la base de datos','javascript:window.close()');
        echo 'El nombre del relator ya esta registrado en la base de datos<br><p style="text-align:center"><input type="submit" id="Login" value="&nbsp;&nbsp;Aceptar&nbsp;&nbsp;" onclick="self.parent.tb_remove();" /></p>';
          // cerrar2('hola mundo', '');
         }
         cerrar();
}
?>
