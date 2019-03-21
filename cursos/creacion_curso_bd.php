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
    $codigo_sigper=$_POST["sigper"];
    $vacantes=$_POST["vacantes"];
    $ubicacion=$_POST["ubicacion"];
    $descripcion=$_POST["descripcion"];
    $id_ambito=$_POST["ambito"];
    $horas_curso=$_POST["numero_horas"];

    //recibes el valor del formulario (relator)
    $arr_relatores= (isset($_POST["dynamic_form"]))?$_POST["dynamic_form"]["dynamic_form"]:null;
    //creas un array simple (relator)
    $arr_rel = array();
    foreach ($arr_relatores as $key_rel => $row_rel) $arr_rel[$key_rel] = $row_rel['p_name'];
    //parseas el array para imprimirlo como texto.(relator)
    $p_name = implode(', ', $arr_rel);



    //recibes el valor del formulario (fechas curso)
    $arr_fechas= (isset($_POST["dform_date"]))?$_POST["dform_date"]["dform_date"]:null;
    

    if (empty($_POST["nombre_curso"]) or empty($_POST["vacantes"]) or empty($_POST["ubicacion"]) ) {
echo"<Script language='JavaScript' type='text/JavaScript'>
      alert('!Datos faltantes, favor de verificar los campos requeridos!')
      window.location.href='creacion_curso.php';
       </Script>";

 }else{
    
        // Query para obtener ultimo ID de curso
     /*   $con=mysqli_connect('127.0.0.1', 'root', '', 'capacitaciones');
        $obtener_ultimo_id = mysqli_query($con, "SELECT cursos.id_curso FROM `capacitaciones`.`cursos` order by cursos.id_curso desc limit 1");
         while ($row = $obtener_ultimo_id->fetch_assoc()) {
          echo "Ultima ID de cursos: ", $row['id_curso']."<br>";
          $id_padre = $row['id_curso']+1;
        }

        // Query para obtener el nombre del curso
        $curso_nom = mysqli_query($con, "SELECT `nombre_curso` FROM `cursos` WHERE `nombre_curso` = '$nombre_curso'"); 
        echo "Nombre del curso: ";
        echo $nombre_curso;
        print_r($curso_nom);
        echo "<br>", "Valor ID PADRE: ", " ", $id_padre, "<br>";*/

        $con=mysqli_connect('127.0.0.1', 'root', '', 'capacitaciones');
        $cadena_curso_final = "INSERT INTO `capacitaciones`.`cursos` (`nombre_curso`, `horas_curso`, `id_ambito`, `codigo_sigper`, `vacantes`, `ubicacion`, `descripcion`, `id_relator`, `disponible`) VALUES ('".$nombre_curso."', '".$horas_curso."', '".$id_ambito."', '".$codigo_sigper."', '".$vacantes."', '".$ubicacion."', '".$descripcion."', '".$p_name."', 'si')";
        $result1 = mysqli_query($con, $cadena_curso_final);

        //$id_curso_padre = mysqli_query($con, "SELECT id_curso from cursos where nombre_curso = '$nombre_curso'");

        $id_curso_padre = mysqli_insert_id($con);
        
        if(!empty($arr_fechas) && $id_curso_padre){
          foreach($arr_fechas as $key => $row) { 
            $cadena_jornada_final = "INSERT INTO `capacitaciones`.`jornadas_curso` (`id_curso`, `fechas_curso`, `horario_curso`, `tipo_jornada`) VALUES ('".$id_curso_padre."', '".$row['fecha_curso']."', '".$row['horario_curso']."', '".$row['tipo_jornada']."');";
            $result2 = mysqli_query($con, $cadena_jornada_final);
          }
        }

      /*   for ($i = 0; $i <count($fechas_curso); $i++){
            echo  "<br>", "Valores ID RELATORES: ",$p_name[$i], " <br> ";
            echo  "<br>", "Valores TIPO DE JORNADAS: ",$tipo_jornada, " <br><br> ";

            $cadena_curso_final = "INSERT INTO `capacitaciones`.`cursos` (`nombre_curso`, `horas_curso`, `id_ambito`, `codigo_sigper`, `vacantes`, `ubicacion`, `descripcion`, `id_relator`, `disponible`) VALUES ('".$nombre_curso."', '".$horas_curso."', '".$id_ambito."', '".$codigo_sigper."', '".$vacantes."', '".$ubicacion."', '".$descripcion."', '".$p_name[$i]."', 'si')";

            $result1=mysqli_query($con, $cadena_curso_final);

            $cadena_jornada_final = "INSERT INTO `capacitaciones`.`jornadas_curso` (`id_curso`, `fechas_curso`, `horario_curso`, `tipo_jornada`) VALUES ('".$id_padre."', '".$fechas_curso[$i]."', '".$horario_curso[$i]."', '".$tipo_jornada[$i]."')";

            $result2=mysqli_query($con, $cadena_jornada_final);

           } */

          echo "Resultado de cadena curso final: ";
          print_r($result1);
          echo "<br><br>";

          echo "Resultado de cadena jornada final: ";
          print_r($cadena_jornada_final);
          echo "<br><br>";

        if(!$con){echo "Error con conexión de base de datos," . PHP_EOL;
           }else{
              echo "Exito con conexión de base de datos", "<br><br>";
           }

          if($result1):
            echo json_encode(array('error' => false));
          else:
            echo json_encode(array('error' => true, 'msg'=>mysqli_error($con)));
          endif;
          
          if($cadena_jornada_final):
            echo json_encode(array('error' => false));
          else:
            echo json_encode(array('error' => true, 'msg'=>mysqli_error($con)));
          endif;

          scriptAlertGo('El nombre del curso fue agregado','#');
         }

?>