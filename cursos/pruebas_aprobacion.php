<?php
 $user_id='4';
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
	
	<form action='prueba_aprobacion_bd.php' method='post' enctype='multipart/form-data' name='form1' target='_self' id='form1'>
							
	<?php
				  	$conex=mysqli_connect("127.0.0.1", "root", "","capacitaciones");
				  	$conex->set_charset("utf8");
					$result = mysqli_query($conex, "SELECT inscripciones.id_usuario, 
						inscripciones.id_curso,
						inscripciones.email,
						inscripciones.fecha_inscripcion,
						inscripciones.mensaje,
						usuarios.nombre,
						usuarios.apellido,
						cursos.nombre_curso
						from inscripciones
						inner join usuarios on usuarios.id = '$user_id'
						inner join cursos on cursos.id_curso = inscripciones.id_curso
						where inscripciones.id_usuario = '$user_id' and inscripciones.aprobado='pendiente'
						order by id_curso");
				      if($result)
				      {
						  while( $obj = mysqli_fetch_object($result)) { 
						echo"
						 <table width='900' border='1' colspan='2' align='center'>
							  <tbody>
							  <tr>
							     <td colspan='2'>asdsa</td>
							  </tr>
							    <tr>
							      <td colspan='2'><b>Usuario:</b><br> $obj->nombre $obj->apellido</td>
							      <td colspan='2'><b>ID Curso:</b><br> $obj->id_curso</td>
							      <td colspan='2'><b>Email:</b><br> $obj->email</td>
							      <td colspan='2'><b>Fecha de inscripcion:</b><br> $obj->fecha_inscripcion</td>
							      <td colspan='2'><b>Mensaje:</b><br> $obj->mensaje</td>
							      <td colspan='3'>
								  
								 <input type='checkbox' name='id_cursos[]' id='id_cursos' value=$obj->id_curso >				
								  
								  </td>
							
								  <input type='hidden' name='id_usuario' id='id_usuario' value=$obj->id_usuario>
								<input type='hidden' name='nombre_alumno' id='nombre_alumno' $obj->nombre $obj->apellido>
							    </tr>
								
								</tbody>
							</table>
						";  }
					} 
					?>
                    
                    <script type="text/javascript">
if( $('.id_curso').prop('checked') ) {
alert('Seleccionado');
}
</script>

                    <br>
                    <table width="50%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="25%">
                       <!-- <select name="seleccion" id="seleccion">
                          <option value="Aprobado">Aprobado</option>
                          <option value="Rechazado">Rechazado</option>
                        </select> --></td>
                        <td width="75%"><input type='submit' name='Aprobar' value='Aprobar' class='btn btn-primary' id='Aprobar'></td>
                      </tr>
                    </table>
	</form>
																																	

	
</body>
</html>
