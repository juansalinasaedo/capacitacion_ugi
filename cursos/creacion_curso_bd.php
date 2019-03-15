<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

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




 function swal( $msn ){

       $script  = '<script language="JavaScript">';
       $script .= 'title: "¡mensaje!"';
      $script .= 'timer: 2000';
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

 

//Ejemplo de como usar: 

/* $key=$_POST['key'];
$okey=$_POST['okey']; */

// ACA RESCATAMOS EL VALOR DE LOS CAMPOS EN VARIABLES

		$nombre_curso=$_POST["nombre_curso"];
    $horario_curso=$_POST["horario_curso"];
    $tipo_jornada=$_POST["tipo_jornada"];
		$codigo_sigper=$_POST["sigper"];
		$vacantes=$_POST["vacantes"];
    $ubicacion=$_POST["ubicacion"];
    $descripcion=$_POST["descripcion"];
		$id_ambito=$_POST["ambito"];
    $horas_curso=$_POST["numero_horas"];
    $fecha_curso=$_POST["fecha_curso"];

    //recibes el valor del formulario 
    $arr_relatores= (isset($_POST["dynamic_form"]))?$_POST["dynamic_form"]["dynamic_form"]:null;
    //creas un array simple
    $arr_rel = array();
    foreach ($arr_relatores as $key_rel => $row_rel) $arr_rel[$key_rel] = $row_rel['p_name'];
    //parseas el array para imprimirlo como texto.
    $p_name = implode(', ', $arr_rel);



echo $p_name;
echo $fecha_curso;

		if (empty($_POST["nombre_curso"]) or empty($_POST["vacantes"]) or empty($_POST["ubicacion"]) ) {
echo"<Script language='JavaScript' type='text/JavaScript'>
			alert('!Datos faltantes, favor de verificar los campos requeridos!')
			window.location.href='creacion_curso.php';
		   </Script>";

 }else{
		

        $con=mysqli_connect('127.0.0.1', 'root', '');
         $curso_nom = mysqli_query($con, "SELECT `nombre_curso` FROM `cursos` WHERE `nombre_curso` = '$nombre_curso'"); 
         echo $curso_nom;
        

         if ($curso_nom==null){

         $sql = ("INSERT INTO `capacitaciones`.`cursos` (`nombre_curso`, `fechas_curso`, `horario_curso`, `tipo_jornada`, `horas_curso`, `id_ambito`, `codigo_sigper`, `vacantes`, `ubicacion`, `descripcion`, `id_relator`, `disponible`) VALUES ('$nombre_curso', '$fecha_curso', '$horario_curso', '$tipo_jornada', '$horas_curso', '$id_ambito', '$codigo_sigper', '$vacantes', '$ubicacion', '$descripcion', '$p_name', 'si')"); //Se insertan los datos a la base de datos y el usuario ya fue registrado con exito.  


			  if (mysqli_query($con, $sql)) { 
			   
		  	   scriptAlertGo('!El curso fue inscrito correctamente!','../bienvenido.php');
		 	  }else{
			   scriptAlert('!Ha ocurrido un problema en la inscripción, por favor intente nuevamente!','creacion_curso.php');
			  }	   

         }else{
         	scriptAlertGo('El nombre del curso ya esta registrado en la base de datos','../bienvenido.php');
         }

}
?>