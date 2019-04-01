<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";
}
        
  $user_id=$_SESSION["user_id"];
  $mysqli = new mysqli('127.0.0.1', 'root', '', 'capacitaciones');
  mysqli_set_charset($mysqli,'utf8'); // para mostrar correctamente los acentos y las ñ 
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Inscripciones Capacitación Fiscalía">
	<meta name="author" content="Ansonika">
	<title>Inscripciones Capacitación Fiscalía</title>

	<!-- Favicons-->
<!--	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png"> -->

	<link rel="shortcut icon" href="../images/favicon.ico" />

	<!-- GOOGLE WEB FONT -->
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">

	<!-- BASE CSS -->
	<link href="css/animate.min.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/menu.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/icon_fonts/css/all_icons_min.css" rel="stylesheet">
	<link href="css/skins/square/grey.css" rel="stylesheet">
	
	<!-- COLOR CSS -->
	<link href="css/color_3.css" rel="stylesheet">
	
	<!-- BASE CSS -->
	<link href="css/date_time_picker.css" rel="stylesheet">

	<!-- YOUR CUSTOM CSS -->
	<link href="css/custom.css" rel="stylesheet">

	<script src="js/modernizr.js"></script>
	<!-- Modernizr -->

</head>

<body>
	
	<!--<div id="preloader">
		<div data-loader="circle-side"></div>
	</div> -->

	<!-- /Preload -->
	
	<!-- <div id="loader_form">
		<div data-loader="circle-side-2"></div>
	</div> -->

	<!-- /loader_form -->

<!--	<header>
		<div class="container-fluid">
		    <div class="row">
                <div class="col-3">
                    <div id="logo_home">
                        <h1><a href="index.html">MAVIA | Register, Reservation, Questionare, Reviews form wizard</a></h1>
                    </div>
                </div>
                <div class="col-9">
                    <div id="social">
                        <ul>
                            <li><a href="#0"><i class="icon-facebook"></i></a></li>
                            <li><a href="#0"><i class="icon-twitter"></i></a></li>
                            <li><a href="#0"><i class="icon-google"></i></a></li>
                            <li><a href="#0"><i class="icon-linkedin"></i></a></li>
                        </ul>
                    </div> -->
                    <!-- /social -->
             <!--       <nav>
                        <ul class="cd-primary-nav">
                            <li><a href="index.html" class="animated_link">Register Version</a></li>
                            <li><a href="reservation_version.html" class="animated_link">Reservation Version</a></li>
                            <li><a href="questionare_version.html" class="animated_link">Questionare Version</a></li>
                            <li><a href="review_version.html" class="animated_link">Review Version</a></li>
                            <li><a href="about_color_3.html" class="animated_link">About Us</a></li>
                            <li><a href="contacts_color_3.html" class="animated_link">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
		</div> -->
		<!-- container -->
<!--	</header> -->
	<!-- End Header -->

	<main>
		<div id="form_container">
			<div class="row">
				<div class="col-lg-5">
					<div id="left_form">
						<figure><img src="img/registration_bg.svg" alt=""></figure>
						<h2>Encuesta de Satisfacción de la actividad de capacitación</h2>
						<p>Su opinión es muy importante para nosotros, por ello, le solicitamos que responda esta breve encuesta que nos permitirá conocer su apreciación particular respecto de las actividades de capacitación</p>
						<a href="#0" id="more_info" data-toggle="modal" data-target="#more-info"><i class="pe-7s-info"></i></a>
					</div>
				</div>
				<div class="col-lg-7">

				
				<div id="wizard_container">
						<div id="top-wizard">
							<div id="progressbar"></div>
						</div>
						<!-- /top-wizard -->
						<form name="example-1" id="wrapped" method="POST">
							<input id="website" name="website" type="text" value="">
							<!-- Leave for security protection, read docs for details -->
							<div id="middle-wizard">
								
							
								<div class="step">
									<h3 class="main_question"><strong>1/4</strong>Favor de llenar los campos requeridos</h3>
									<div class="row">

										<!-- nombre  -->
										<div class="col-md-6">
											<div class="form-group">
										<label><b>Nombre:</b></label><br>		
											 <?php
								              $con=mysqli_connect('127.0.0.1', 'root', '', 'capacitaciones');
								              $con->set_charset("utf8");
								              $sql="SELECT usuarios.nombre, usuarios.apellido from usuarios inner join alumno on usuarios.id = '$user_id'";
								              if ( $alumno=mysqli_query($con, $sql) ) {
								                  while ($obj = mysqli_fetch_object($alumno)) {
								                      echo $obj->nombre.PHP_EOL;
								                       echo "<input type='hidden' id='nombre' name='nombre' value='$obj->nombre'>";
								                  }
								                  /* liberar el conjunto de resultados */
								                  mysqli_free_result($alumno);
								              } else {
								                  echo "Error: ". mysqli_error($con);
								              }
								              /* cerrar la conexión */
								              mysqli_close($con);
								            ?>
										  </div>
										</div>	


										<!-- apellido -->
										<div class="col-md-6">
											<div class="form-group">
											  <label><b>Apellido:</b></label><br>		
											 <?php
								              $con=mysqli_connect('127.0.0.1', 'root', '', 'capacitaciones');
								              $con->set_charset("utf8");
								              $sql="SELECT usuarios.nombre, usuarios.apellido from usuarios inner join alumno on usuarios.id = '$user_id'";
								              if ( $alumno=mysqli_query($con, $sql) ) {
								                  while ($obj = mysqli_fetch_object($alumno)) {
								                      echo $obj->apellido.PHP_EOL;
								                      echo "<input type='hidden' id='apellido' name='apellido' value='$obj->apellido'>";
								                  }
								                  /* liberar el conjunto de resultados */
								                  mysqli_free_result($alumno);
								              } else {
								                  echo "Error: ". mysqli_error($con);
								              }
								              /* cerrar la conexión */
								              mysqli_close($con);
								            ?>
											</div>
										</div>
									</div>
								<!--	 /row -->

									<div class="row">  

								<!-- mail del inscrito -->		
										<div class="col-md-6">
											<div class="form-group">
											  <label><b>Mail:</b></label><br>		
											 <?php
								              $con=mysqli_connect('127.0.0.1', 'root', '', 'capacitaciones');
								              $con->set_charset("utf8");
								              $sql="SELECT usuarios.nombre, usuarios.apellido, usuarios.email from usuarios inner join alumno on usuarios.id = '$user_id'";
								              if ( $alumno=mysqli_query($con, $sql) ) {
								                  while ($obj = mysqli_fetch_object($alumno)) {
								                      echo $obj->email.PHP_EOL;
								                      echo "<input type='hidden' id='email' name='email' value='$obj->email'>";
								                  }
								                  /* liberar el conjunto de resultados */
								                  mysqli_free_result($alumno);
								              } else {
								                  echo "Error: ". mysqli_error($con);
								              }
								              /* cerrar la conexión */
								              mysqli_close($con);
								            ?> 
											</div>
										</div>
								<!-- fin mail del inscrito -->			

										<!-- Nombre del curso -->
										<div class="col-md-6">
											<div class="form-group">									
 											<label><b>Cursos disponibles para encuesta:</b></label><br>
											<select name="curso" id="curso" class="form-control" >
								                    <option value=''>Elija un curso:</option>
								                    <?php
								                        $query = $mysqli -> query ("
								                        	SELECT inscripciones.id_curso, cursos.nombre_curso, inscripciones.fecha_jornada_curso
															FROM cursos
															INNER JOIN inscripciones ON inscripciones.id_curso = cursos.id_curso
															INNER JOIN jornadas_curso ON jornadas_curso.id_curso = cursos.id_curso
															AND inscripciones.id_usuario =  '$user_id'
															AND inscripciones.aprobado =  'aprobado'
															AND jornadas_curso.fechas_curso < NOW( ) 
															group by inscripciones.fecha_jornada_curso
								                        	");
								                        while ($valores = mysqli_fetch_array($query)) {
								                          echo '<option value="'.$valores[id_curso].'">'.$valores[nombre_curso].'</option>';
								                        }
								                       ?>
								                  </select> 
											</div>
										</div>
									</div>
									<!-- /row -->


								</div>
								<!-- /step -->
								

                             <!-- preguntas 1 y 2 -->
								<div class="step">
									<h3 class="main_question"><strong>2/4</strong>Experiencia de capacitación</h3>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group clearfix">
												<label class="rating_type">
													 <?php
													   $con=mysqli_connect('127.0.0.1', 'root', '', 'capacitaciones');
													   $con->set_charset("utf8"); 
													   $sql="SELECT nombre_pregunta from preguntas_curso where id_pregunta='1'";
													   if ( $alumno=mysqli_query($con, $sql) ) {
													       while ($obj = mysqli_fetch_object($alumno)) {
													       echo $obj->nombre_pregunta.PHP_EOL;
													          }
													        /* liberar el conjunto de resultados */
													       mysqli_free_result($alumno);
													       } else {
													       echo "Error: ". mysqli_error($con);
													       }
													   mysqli_close($con);
												     ?>                 
												</label>
												<span class="rating">
												<input type="radio" class="required rating-input" id="rating-input-1-5" name="pregunta1" value="5 Estrellas"><label for="rating-input-1-5" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-1-4" name="pregunta1" value="4 Estrellas"><label for="rating-input-1-4" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-1-3" name="pregunta1" value="3 Estrellas"><label for="rating-input-1-3" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-1-2" name="pregunta1" value="2 Estrellas"><label for="rating-input-1-2" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-1-1" name="pregunta1" value="1 Estrellas"><label for="rating-input-1-1" class="rating-star"></label>
												</span>
											</div>
											<div class="form-group clearfix">
												<label class="rating_type">
													 <?php
													   $con=mysqli_connect('127.0.0.1', 'root', '', 'capacitaciones');
													   $con->set_charset("utf8"); 
													   $sql="SELECT nombre_pregunta from preguntas_curso where id_pregunta='2'";
													   if ( $alumno=mysqli_query($con, $sql) ) {
													       while ($obj = mysqli_fetch_object($alumno)) {
													       echo $obj->nombre_pregunta.PHP_EOL;
													          }
													        /* liberar el conjunto de resultados */
													       mysqli_free_result($alumno);
													       } else {
													       echo "Error: ". mysqli_error($con);
													       }
													   mysqli_close($con);
												     ?>    
													</label>
												<span class="rating">
												<input type="radio" class="required rating-input" id="rating-input-2-5" name="pregunta2" value="5 Estrellas"><label for="rating-input-2-5" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-2-4" name="pregunta2" value="4 Estrellas"><label for="rating-input-2-4" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-2-3" name="pregunta2" value="3 Estrellas"><label for="rating-input-2-3" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-2-2" name="pregunta2" value="2 Estrellas"><label for="rating-input-2-2" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-2-1" name="pregunta2" value="1 Estrellas"><label for="rating-input-2-1" class="rating-star"></label>
												</span>
											</div>
											
											
										</div>
									</div>
									<!-- /row -->
								</div>
								<!-- /step -->
								<!-- fin preguntas 1 y 2 -->


								 <!-- preguntas 3 al 7 -->
								<div class="step">
									<h3 class="main_question"><strong>2/4</strong>Experiencia de capacitación</h3>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group clearfix">
												<label class="rating_type">
													<?php
													   $con=mysqli_connect('127.0.0.1', 'root', '', 'capacitaciones');
													   $con->set_charset("utf8"); 
													   $sql="SELECT nombre_pregunta from preguntas_curso where id_pregunta='3'";
													   if ( $alumno=mysqli_query($con, $sql) ) {
													       while ($obj = mysqli_fetch_object($alumno)) {
													       echo $obj->nombre_pregunta.PHP_EOL;
													          }
													        /* liberar el conjunto de resultados */
													       mysqli_free_result($alumno);
													       } else {
													       echo "Error: ". mysqli_error($con);
													       }
													   mysqli_close($con);
												     ?>  													
												</label>
												<span class="rating">
												<input type="radio" class="required rating-input" id="rating-input-3-5" name="pregunta3" value="5 Estrellas"><label for="rating-input-3-5" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-3-4" name="pregunta3" value="4 Estrellas"><label for="rating-input-3-4" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-3-3" name="pregunta3" value="3 Estrellas"><label for="rating-input-3-3" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-3-2" name="pregunta3" value="2 Estrellas"><label for="rating-input-3-2" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-3-1" name="pregunta3" value="1 Estrellas"><label for="rating-input-3-1" class="rating-star"></label>
												</span>
											</div>
											<div class="form-group clearfix">
												<label class="rating_type">
													<?php
													   $con=mysqli_connect('127.0.0.1', 'root', '', 'capacitaciones');
													   $con->set_charset("utf8"); 
													   $sql="SELECT nombre_pregunta from preguntas_curso where id_pregunta='4'";
													   if ( $alumno=mysqli_query($con, $sql) ) {
													       while ($obj = mysqli_fetch_object($alumno)) {
													       echo $obj->nombre_pregunta.PHP_EOL;
													          }
													        /* liberar el conjunto de resultados */
													       mysqli_free_result($alumno);
													       } else {
													       echo "Error: ". mysqli_error($con);
													       }
													   mysqli_close($con);
												     ?>  
												</label>
												<span class="rating">
												<input type="radio" class="required rating-input" id="rating-input-4-5" name="pregunta4" value="5 Estrellas"><label for="rating-input-4-5" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-4-4" name="pregunta4" value="4 Estrellas"><label for="rating-input-4-4" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-4-3" name="pregunta4" value="3 Estrellas"><label for="rating-input-4-3" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-4-2" name="pregunta4" value="2 Estrellas"><label for="rating-input-4-2" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-4-1" name="pregunta4" value="1 Estrellas"><label for="rating-input-4-1" class="rating-star"></label>
												</span>
											</div>
											<div class="form-group clearfix">
												<label class="rating_type"><?php
													   $con=mysqli_connect('127.0.0.1', 'root', '', 'capacitaciones');
													   $con->set_charset("utf8"); 
													   $sql="SELECT nombre_pregunta from preguntas_curso where id_pregunta='5'";
													   if ( $alumno=mysqli_query($con, $sql) ) {
													       while ($obj = mysqli_fetch_object($alumno)) {
													       echo $obj->nombre_pregunta.PHP_EOL;
													          }
													        /* liberar el conjunto de resultados */
													       mysqli_free_result($alumno);
													       } else {
													       echo "Error: ". mysqli_error($con);
													       }
													   mysqli_close($con);
												     ?>  </label>
												<span class="rating">
												<input type="radio" class="required rating-input" id="rating-input-5-5" name="pregunta5" value="5 Estrellas"><label for="rating-input-5-5" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-5-4" name="pregunta5" value="4 Estrellas"><label for="rating-input-5-4" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-5-3" name="pregunta5" value="3 Estrellas"><label for="rating-input-5-3" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-5-2" name="pregunta5" value="2 Estrellas"><label for="rating-input-5-2" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-5-1" name="pregunta5" value="1 Estrellas"><label for="rating-input-5-1" class="rating-star"></label>
												</span>
											</div>

												<div class="form-group clearfix">
												<label class="rating_type"><?php
													   $con=mysqli_connect('127.0.0.1', 'root', '', 'capacitaciones');
													   $con->set_charset("utf8"); 
													   $sql="SELECT nombre_pregunta from preguntas_curso where id_pregunta='6'";
													   if ( $alumno=mysqli_query($con, $sql) ) {
													       while ($obj = mysqli_fetch_object($alumno)) {
													       echo $obj->nombre_pregunta.PHP_EOL;
													          }
													        /* liberar el conjunto de resultados */
													       mysqli_free_result($alumno);
													       } else {
													       echo "Error: ". mysqli_error($con);
													       }
													   mysqli_close($con);
												     ?>  </label>
												<span class="rating">
												<input type="radio" class="required rating-input" id="rating-input-6-5" name="pregunta6" value="5 Estrellas"><label for="rating-input-6-5" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-6-4" name="pregunta6" value="4 Estrellas"><label for="rating-input-6-4" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-6-3" name="pregunta6" value="3 Estrellas"><label for="rating-input-6-3" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-6-2" name="pregunta6" value="2 Estrellas"><label for="rating-input-6-2" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-6-1" name="pregunta6" value="1 Estrellas"><label for="rating-input-6-1" class="rating-star"></label>
												</span>
											</div>

											<div class="form-group clearfix">
												<label class="rating_type"><?php
													   $con=mysqli_connect('127.0.0.1', 'root', '', 'capacitaciones');
													   $con->set_charset("utf8"); 
													   $sql="SELECT nombre_pregunta from preguntas_curso where id_pregunta='7'";
													   if ( $alumno=mysqli_query($con, $sql) ) {
													       while ($obj = mysqli_fetch_object($alumno)) {
													       echo $obj->nombre_pregunta.PHP_EOL;
													          }
													        /* liberar el conjunto de resultados */
													       mysqli_free_result($alumno);
													       } else {
													       echo "Error: ". mysqli_error($con);
													       }
													   mysqli_close($con);
												     ?>  </label>
												<span class="rating">
												<input type="radio" class="required rating-input" id="rating-input-7-5" name="pregunta7" value="5 Estrellas"><label for="rating-input-7-5" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-7-4" name="pregunta7" value="4 Estrellas"><label for="rating-input-7-4" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-7-3" name="pregunta7" value="3 Estrellas"><label for="rating-input-7-3" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-7-2" name="pregunta7" value="2 Estrellas"><label for="rating-input-7-2" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-7-1" name="pregunta7" value="1 Estrellas"><label for="rating-input-7-1" class="rating-star"></label>
												</span>
											</div>
											<br>
											
										</div>
									</div>
									<!-- /row -->
								</div>
								<!-- /step -->
								<!-- fin preguntas 3 al 7 -->




								  <!-- preguntas 8 y 9 -->
								<div class="step">
									<h3 class="main_question"><strong>2/4</strong>Relevancia de la actividad</h3>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group clearfix">
												<label class="rating_type"><?php
													   $con=mysqli_connect('127.0.0.1', 'root', '', 'capacitaciones');
													   $con->set_charset("utf8"); 
													   $sql="SELECT nombre_pregunta from preguntas_curso where id_pregunta='8'";
													   if ( $alumno=mysqli_query($con, $sql) ) {
													       while ($obj = mysqli_fetch_object($alumno)) {
													       echo $obj->nombre_pregunta.PHP_EOL;
													          }
													        /* liberar el conjunto de resultados */
													       mysqli_free_result($alumno);
													       } else {
													       echo "Error: ". mysqli_error($con);
													       }
													   mysqli_close($con);
												     ?>  </label>
												<span class="rating">
												<input type="radio" class="required rating-input" id="rating-input-8-5" name="pregunta8" value="5 Estrellas"><label for="rating-input-8-5" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-8-4" name="pregunta8" value="4 Estrellas"><label for="rating-input-8-4" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-8-3" name="pregunta8" value="3 Estrellas"><label for="rating-input-8-3" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-8-2" name="pregunta8" value="2 Estrellas"><label for="rating-input-8-2" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-8-1" name="pregunta8" value="1 Estrellas"><label for="rating-input-8-1" class="rating-star"></label>
												</span>
											</div>
											<div class="form-group clearfix">
												<label class="rating_type"><?php
													   $con=mysqli_connect('127.0.0.1', 'root', '', 'capacitaciones');
													   $con->set_charset("utf8"); 
													   $sql="SELECT nombre_pregunta from preguntas_curso where id_pregunta='9'";
													   if ( $alumno=mysqli_query($con, $sql) ) {
													       while ($obj = mysqli_fetch_object($alumno)) {
													       echo $obj->nombre_pregunta.PHP_EOL;
													          }
													        /* liberar el conjunto de resultados */
													       mysqli_free_result($alumno);
													       } else {
													       echo "Error: ". mysqli_error($con);
													       }
													   mysqli_close($con);
												     ?>  </label>
												<span class="rating">
												<input type="radio" class="required rating-input" id="rating-input-9-5" name="pregunta9" value="5 Estrellas"><label for="rating-input-9-5" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-9-4" name="pregunta9" value="4 Estrellas"><label for="rating-input-9-4" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-9-3" name="pregunta9" value="3 Estrellas"><label for="rating-input-9-3" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-9-2" name="pregunta9" value="2 Estrellas"><label for="rating-input-9-2" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-9-1" name="pregunta9" value="1 Estrellas"><label for="rating-input-9-1" class="rating-star"></label>
												</span>
											</div>
											
											
										</div>
									</div>
									<!-- /row -->
								</div>
								<!-- /step -->
								<!-- fin preguntas 8 y 9 -->



								  <!-- preguntas 10 y 11 -->
								<div class="step">
									<h3 class="main_question"><strong>2/4</strong>Evaluación global</h3>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group clearfix">
												<label class="rating_type"><?php
													   $con=mysqli_connect('127.0.0.1', 'root', '', 'capacitaciones');
													   $con->set_charset("utf8"); 
													   $sql="SELECT nombre_pregunta from preguntas_curso where id_pregunta='10'";
													   if ( $alumno=mysqli_query($con, $sql) ) {
													       while ($obj = mysqli_fetch_object($alumno)) {
													       echo $obj->nombre_pregunta.PHP_EOL;
													          }
													        /* liberar el conjunto de resultados */
													       mysqli_free_result($alumno);
													       } else {
													       echo "Error: ". mysqli_error($con);
													       }
													   mysqli_close($con);
												     ?>  </label>
												<span class="rating">
												<input type="radio" class="required rating-input" id="rating-input-10-5" name="pregunta10" value="5 Estrellas"><label for="rating-input-10-5" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-10-4" name="pregunta10" value="4 Estrellas"><label for="rating-input-10-4" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-10-3" name="pregunta10" value="3 Estrellas"><label for="rating-input-10-3" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-10-2" name="pregunta10" value="2 Estrellas"><label for="rating-input-10-2" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-10-1" name="pregunta10" value="1 Estrellas"><label for="rating-input-10-1" class="rating-star"></label>
												</span>
											</div>
											<div class="form-group clearfix">
												<label class="rating_type"><?php
													   $con=mysqli_connect('127.0.0.1', 'root', '', 'capacitaciones');
													   $con->set_charset("utf8"); 
													   $sql="SELECT nombre_pregunta from preguntas_curso where id_pregunta='11'";
													   if ( $alumno=mysqli_query($con, $sql) ) {
													       while ($obj = mysqli_fetch_object($alumno)) {
													       echo $obj->nombre_pregunta.PHP_EOL;
													          }
													        /* liberar el conjunto de resultados */
													       mysqli_free_result($alumno);
													       } else {
													       echo "Error: ". mysqli_error($con);
													       }
													   mysqli_close($con);
												     ?>  </label>
												<span class="rating">
												<input type="radio" class="required rating-input" id="rating-input-11-5" name="pregunta11" value="5 Estrellas"><label for="rating-input-11-5" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-11-4" name="pregunta11" value="4 Estrellas"><label for="rating-input-11-4" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-11-3" name="pregunta11" value="3 Estrellas"><label for="rating-input-11-3" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-11-2" name="pregunta11" value="2 Estrellas"><label for="rating-input-11-2" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-11-1" name="pregunta11" value="1 Estrellas"><label for="rating-input-11-1" class="rating-star"></label>
												</span>
											</div>
											
											
										</div>
									</div>
									<!-- /row -->
								</div>
								<!-- /step -->
								<!-- fin preguntas 10 y 11 -->



								<!-- pregunta 12 -->	
								<div class="step">
									<h3 class="main_question"><strong>2/4</strong>En relación a la actividad de capacitación</h3>
									<br>
									<h3 class="main_question"><strong>¿Lo visto en la actividad es aplicable a su trabajo?<br>Fundamente su respuesta.</strong></h3>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group radio_input">
												<label><input type="checkbox" value="Si - " name="pregunta12_1" class="icheck required">Si</label>
											</div>
											<div class="form-group radio_input">
												<label><input type="checkbox" value="No - " name="pregunta12_1" class="icheck required">No</label>
											</div>
										</div>
										

										<div class="form-group">
										<textarea name="pregunta12_2" class="icheck required" style="height:250px;" placeholder="Escriba sus fundamentos aqui"></textarea><br><br><br>
									</div>
									</div>
									<!-- /row -->
								</div>
								<!-- /step -->

								<!-- fin pregunta 12 -->


								<!-- pregunta 13 -->	
								<div class="step">
									<h3 class="main_question"><strong>2/4</strong>En relación a la actividad de capacitación</h3>
									<br>
									<h3 class="main_question"><strong>¿Recomendaría esta actividad a un compañero/a de su institución?<br>Fundamente su respuesta.</strong></h3>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group radio_input">
												<label><input type="checkbox" value="Si - " name="pregunta13_1" class="icheck required">Si</label>
											</div>
											<div class="form-group radio_input">
												<label><input type="checkbox" value="No - " name="pregunta13_1" class="icheck required">No</label>
											</div>
										</div>
										

										<div class="form-group">
										<textarea name="pregunta13_2" class="icheck required" style="height:250px;" placeholder="Escriba sus fundamentos aqui"></textarea><br><br><br>
									</div>
									</div>
									<!-- /row -->
								</div>
								<!-- /step -->

								<!-- fin pregunta 13 -->


								<!-- pregunta 14 -->
									<div class="step">
									<h3 class="main_question"><strong>3/3</strong>Lo que más me gustó fue:</h3>
									<div class="form-group">
										<textarea name="pregunta14" class="icheck required" style="height:300px; width: 450px;" placeholder="Escriba sus fundamentos aqui"></textarea> <br><br><br>
									</div>
								</div>
								<!-- fin pregunta 14 -->


									<!-- pregunta 15 -->
									<div class="step">
									<h3 class="main_question"><strong>3/3</strong>Esta actividad mejoraría sí:</h3>
									<div class="form-group">
										<textarea name="pregunta15" class="icheck required" style="height:300px; width: 450px;" placeholder="Escriba sus fundamentos aqui"></textarea> <br><br><br>
									</div>
								</div>
								<!-- fin pregunta 15 -->


									<!-- pregunta 16 -->
									<div class="step">
									<h3 class="main_question"><strong>3/3</strong>Finalmente, lo que aprendí de esta actividad es:</h3>
									<div class="form-group">
										<textarea name="pregunta16" class="icheck required" style="height:300px; width: 450px;" placeholder="Escriba sus fundamentos aqui"></textarea> <br><br><br>
									</div>
								</div>
								<!-- fin pregunta 16 -->

								<!-- Comentarios u observaciones -->
								<div class="submit step">
									<h3 class="main_question">Comentarios u observaciones</h3>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<textarea id="mensaje" name="mensaje" class="icheck required" style="height:250px;" placeholder="Escriba sus fundamentos aqui"></textarea><br><br><br>
											</div>
										</div>
										
									</div>
									<!-- /row -->

									
									<br>
								<!--	<div class="row">
										<div class="col-md-12">
											<div class="form-group terms">
												<input name="terms" type="checkbox" class="icheck required" value="yes">
												<label>Acepto los <a href="#" data-toggle="modal" data-target="#terms-txt">terminos y condiciones</a></label>
											</div>
										</div>
									</div> -->
								</div>
								<!-- Fin Comentarios u observaciones -->

								<!-- /step-->
							</div>
							<!-- /middle-wizard -->
							<div id="bottom-wizard">
								<button type="button" name="backward" class="backward">Atras </button>
								<button type="button" name="forward" class="forward">Siguiente</button>
								<button type="submit" name="process" class="submit">Enviar</button>
							</div>
							<!-- /bottom-wizard -->
						</form>
					</div>
					<!-- /Wizard container -->
				</div>
			</div><!-- /Row -->

		</div><!-- /Form_container -->
	</main>
	
	

	<div class="cd-overlay-nav">
		<span></span>
	</div>
	<!-- cd-overlay-nav -->

	<div class="cd-overlay-content">
		<span></span>
	</div>
	<!-- cd-overlay-content -->

	<!-- <a href="#0" class="cd-nav-trigger">Menu<span class="cd-icon"></span></a> -->

	<!-- Modal terms -->
	<div class="modal fade" id="terms-txt" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="termsLabel">Terminos y condiciones</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in <strong>nec quod novum accumsan</strong>, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus. Lorem ipsum dolor sit amet, <strong>in porro albucius qui</strong>, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn_1" data-dismiss="modal">Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

	<!-- Modal info -->
	<div class="modal fade" id="more-info" tabindex="-1" role="dialog" aria-labelledby="more-infoLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="more-infoLabel">Preguntas Frecuentes</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in <strong>nec quod novum accumsan</strong>, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus. Lorem ipsum dolor sit amet, <strong>in porro albucius qui</strong>, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn_1" data-dismiss="modal">Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

	<!-- SCRIPTS -->
	<!-- Jquery-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<!-- Common script -->
	<script src="js/common_scripts.js"></script>
	<!-- Wizard script -->
	<script src="js/questionare_wizard_func.js"></script>
	<!-- Menu script -->
	 <script src="js/velocity.min.js"></script>
	<script src="js/main.js"></script> 
	<!-- Theme script -->
	<script src="js/functions.js"></script>
	

</body>
</html>
