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
   // $fecha_curso=$_POST["fecha_curso"];

    //recibes el valor del formulario (relator)
    $arr_relatores= (isset($_POST["dynamic_form"]))?$_POST["dynamic_form"]["dynamic_form"]:null;
    //creas un array simple (relator)
    $arr_rel = array();
    foreach ($arr_relatores as $key_rel => $row_rel) $arr_rel[$key_rel] = $row_rel['p_name'];
    //parseas el array para imprimirlo como texto.(relator)
    $p_name = implode(', ', $arr_rel);



     //recibes el valor del formulario (fechas curso)
    $arr_fechas= (isset($_POST["dform_date"]))?$_POST["dform_date"]["dform_date"]:null;
    //creas un array simple (fechas curso)
    $arr_fech = array();
    foreach ($arr_fechas as $key_fech => $row_fech) $arr_fech[$key_fech] = $row_fech['fecha_curso'];
    //parseas el array para imprimirlo como texto. (fechas curso)
    $fecha_curso = implode(', ', $arr_fech);



$conex=mysqli_connect("127.0.0.1", "root", "","capacitaciones");
$result = mysqli_query($conex, "SELECT `fechas_curso` FROM `cursos` where  id_relator in ($p_name) and `nombre_curso` = '$nombre_curso'");

if (mysqli_num_rows($result) > 0)
{

  while ($row_result = mysqli_fetch_array ($result))
  {
    //$fecha_arreglado = array_chunk($obj, 2, true);
    
    $fecha_arreglado = $row_result['fechas_curso'];
    $insert_fechas = mysqli_query($conex, "INSERT INTO `capacitaciones`.`capacitacion_multiple` (`id_relator`, `id_curso`, `fechas_curso`) VALUES ('$arr_rel', 'prueba', '$fecha_arreglado')");
  
  }}
  
  //print_r($row); 
  //echo " - ";


  //print_r($fecha_arreglado);
  //echo $arr_fech, " - ", $p_name;

  //echo date('d-m-y', strtotime($cant_fechas));


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
			   
		  	   scriptAlertGo('!El curso fue inscrito correctamente!','#');
		 	  }else{
			   scriptAlert('!Ha ocurrido un problema en la inscripción, por favor intente nuevamente!','#');
			  }	   

         }else{
         	scriptAlertGo('El nombre del curso ya esta registrado en la base de datos','#');
         }

}
?>