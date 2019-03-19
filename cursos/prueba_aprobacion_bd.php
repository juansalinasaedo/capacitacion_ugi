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
    $nombre_alumno=$_POST["nombre_alumno"];

$con=mysqli_connect("localhost", "root", "");

	//recibes el valor del formulario (relator)
    $arr_cursos= (isset($_POST["form1"]))?$_POST["form1"]["form1"]:null;
    //creas un array simple (relator)
	print_r ($arr_cursos);
    $arr_cur = array();
    foreach ($arr_cursos as $key_cur => $row_cur) $arr_cur[$key_cur] = $row_cur['id_cursos'];
    //parseas el array para imprimirlo como texto.(relator)
    $id_cursos = implode(', ', $arr_cur);

 echo "Id del curso: ", $id_cursos, " <br> ","ID del usuario: ", $id_usuario, " <br> ","Nombre del alumno: ", $nombre_alumno, "<br>","ID de los cursos: ", $id_cursos, "<br>";

if (isset($_POST["id_curso"]) && $_POST["id_curso"] <> 0){
	
#guarda los valores en el vector material
$i=0;
$id_recogidos="";	

foreach ($_POST['id_curso'] as $id_cursos_bd){
   $id_recogidos[$i]=$id_cursos_bd;
   $id_recogidos="".$id_recogidos[$i].", ".$id_recogidos."";
   $i++;
   echo $id_recogidos;
}


	$sql="UPDATE inscripciones SET aprobado = 'Aprobado' where id_usuario='$id_usuario' and id_curso in ('.$id_recogidos.')";
	$res=mysqli_query($con,$sql);
	
	

if ($res){
	
		 scriptAlertGo('!La inscripcion del usuario fue aprobada!','#');
	}
/*$id_seleccionadas=("SELECT id_curso from inscripciones where id_curso like '$id_recogidos'");	
$result_consulta = mysqli_query($conex, $id_seleccionadas);
	while (mysqli_fetch_array($result_consulta)){
		echo print_r ($result_consulta);

		$result = mysqli_query($conex, "UPDATE inscripciones SET aprobado = 'Aprobado' where id_usuario='$id_usuario' and id_curso='$result_consulta'");
      if($result)
      {     
              scriptAlertGo('!La inscripcion del usuario fue aprobada!','#');
         
      } else {
		  
	   scriptAlertGo('!Nada!','#');

     }}} */
} ?>