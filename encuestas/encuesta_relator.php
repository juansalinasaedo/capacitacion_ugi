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

<?php
	$nombre=$_POST["nombre"];
	$apellido=$_POST["apellido"];
	$email=$_POST["email"];
	$id_curso=$_POST["curso"];
	$pregunta1=$_POST["pregunta1"];
	$pregunta2=$_POST["pregunta2"];
	$pregunta3=$_POST["pregunta3"];
	$pregunta4=$_POST["pregunta4"];
	$pregunta5=$_POST["pregunta5"];
	$pregunta6=$_POST["pregunta6"];
	$pregunta7=$_POST["pregunta7"];
	$pregunta8=$_POST["pregunta8"];
	$pregunta9=$_POST["pregunta9"];
	$pregunta10=$_POST["pregunta10"];
	$pregunta11=$_POST["pregunta11"];
	$pregunta12_1=$_POST["pregunta12_1"];
	$pregunta12_2=$_POST["pregunta12_2"];
	$pregunta12=$pregunta12_1.$pregunta12_2;
	$pregunta13_1=$_POST["pregunta13_1"];
	$pregunta13_2=$_POST["pregunta13_2"];
	$pregunta13=$pregunta13_1.$pregunta13_2;
	$pregunta14=$_POST["pregunta14"];
    $pregunta15=$_POST["pregunta15"];
	$pregunta16=$_POST["pregunta16"];
	$comentarios=$_POST["mensaje"];	

	echo "<input type='hidden' name='nombre' id='nombre' value='$nombre'>
	<input type='hidden' name='apellido' id='apellido' value='$apellido'>
	<input type='hidden' name='email' id='email' value='$email'>
	<input type='hidden' name='id_curso' id='id_curso' value='$id_curso'>
	<input type='hidden' name='pregunta1' id='pregunta1' value='$pregunta1'>
	<input type='hidden' name='pregunta2' id='pregunta2' value='$pregunta2'>
	<input type='hidden' name='pregunta3' id='pregunta3' value='$pregunta3'>
	<input type='hidden' name='pregunta4' id='pregunta4' value='$pregunta4'>
	<input type='hidden' name='pregunta5' id='pregunta5' value='$pregunta5'>
	<input type='hidden' name='pregunta6' id='pregunta6' value='$pregunta6'>
	<input type='hidden' name='pregunta7' id='pregunta7' value='$pregunta7'>
	<input type='hidden' name='pregunta8' id='pregunta8' value='$pregunta8'>
	<input type='hidden' name='pregunta9' id='pregunta9' value='$pregunta9'>
	<input type='hidden' name='pregunta10' id='pregunta10' value='$pregunta10'>
	<input type='hidden' name='pregunta11' id='pregunta11' value='$pregunta11'>
	<input type='hidden' name='pregunta12' id='pregunta12' value='$pregunta12'>
	<input type='hidden' name='pregunta13' id='pregunta13' value='$pregunta13'>
	<input type='hidden' name='pregunta14' id='pregunta14' value='$pregunta14'>
	<input type='hidden' name='pregunta15' id='pregunta15' value='$pregunta15'>
	<input type='hidden' name='pregunta16' id='pregunta16' value='$pregunta16'>
	<input type='hidden' name='comentarios' id='comentarios' value='$comentarios'>
	";		

/*	echo "<b>Nombre del usuario: </b>", $nombre, "<br>", 
	"<b>Apellido del usuario: </b>", $apellido, "<br>", 
	"<b>Email del usuario: </b>", $email, "<br>", 
	"<b>ID del curso: </b>", $id_curso, "<br>", 
	"<b>Pregunta 1: </b>", $pregunta1, "<br>",
	"<b>Pregunta 2: </b>", $pregunta2, "<br>",
	"<b>Pregunta 3: </b>", $pregunta3, "<br>",
	"<b>Pregunta 4: </b>", $pregunta4, "<br>", 
	"<b>Pregunta 5: </b>", $pregunta5, "<br>",
	"<b>Pregunta 6: </b>", $pregunta6, "<br>",
	"<b>Pregunta 7: </b>", $pregunta7, "<br>",
	"<b>Pregunta 8: </b>", $pregunta8, "<br>",
	"<b>Pregunta 9: </b>", $pregunta9, "<br>",
	"<b>Pregunta 10: </b>", $pregunta10, "<br>",
	"<b>Pregunta 11: </b>", $pregunta11, "<br>",
	"<b>Pregunta 12: </b>", $pregunta12, "<br>",
	"<b>Pregunta 13: </b>", $pregunta13, "<br>",
	"<b>Pregunta 14: </b>", $pregunta14, "<br>",
	"<b>Pregunta 15: </b>", $pregunta15, "<br>",
	"<b>Pregunta 16: </b>", $pregunta16, "<br>",
	"<b>comentarios del usuario: </b>", $comentarios, "<br>"; */

//	echo $nombre;				
?>

		<div id="form_container">
			<div class="row">
				<div class="col-lg-5">
					<div id="left_form" style="background: #0041ad">
						<figure><img src="img/relator.svg" alt=""></figure>
						<h2>Encuesta de Satisfacción del relator/es</h2>
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
								

								 <!-- preguntas sobre el relator 17 al 20 -->

				 <label><b>Curso encuestado:</b></label><br>
											
					<?php
					  $query = $mysqli -> query ("
						SELECT nombre_curso
						from cursos
						where id_curso='$id_curso'");
						while ($valores = mysqli_fetch_object($query)) {
						echo  "<b>", $valores->nombre_curso.PHP_EOL, "<b>";}
					?>

					<?php
					
						$sql= $mysqli -> query ("SELECT 
						relatores.nombre_relator,
						relatores.id_relator
						FROM relatores
						INNER JOIN relacion_curso_relator ON relacion_curso_relator.id_relator = relatores.id_relator
                        and relacion_curso_relator.id_curso = '$id_curso'");
						
					?>

					<?php while ($valores = mysqli_fetch_array($sql)):?>
						<div class="step">      
								<h3 class="main_question">Sobre la calidad del relator <?php echo $valores['nombre_relator']?></h3>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group clearfix">
											<label class="rating_type">El relator demuestra dominio del tema, argumentando con evidencia y respondiendo preguntas.</label>
											<span class="rating">
											<input type="radio" class="required rating-input" id="rating-<?php echo $valores['id_relator']?>-input-17-5" name="preguntas[<?php echo $valores['id_relator']?>][pregunta17]" value="5 Estrellas"><label for="rating-<?php echo $valores['id_relator']?>-input-17-5" class="rating-star"></label>
											<input type="radio" class="required rating-input" id="rating-<?php echo $valores['id_relator']?>-input-17-4" name="preguntas[<?php echo $valores['id_relator']?>][pregunta17]" value="4 Estrellas"><label for="rating-<?php echo $valores['id_relator']?>-input-17-4" class="rating-star"></label>
											<input type="radio" class="required rating-input" id="rating-<?php echo $valores['id_relator']?>-input-17-3" name="preguntas[<?php echo $valores['id_relator']?>][pregunta17]" value="3 Estrellas"><label for="rating-<?php echo $valores['id_relator']?>-input-17-3" class="rating-star"></label>
											<input type="radio" class="required rating-input" id="rating-<?php echo $valores['id_relator']?>-input-17-2" name="preguntas[<?php echo $valores['id_relator']?>][pregunta17]" value="2 Estrellas"><label for="rating-<?php echo $valores['id_relator']?>-input-17-2" class="rating-star"></label>
											<input type="radio" class="required rating-input" id="rating-<?php echo $valores['id_relator']?>-input-17-1" name="preguntas[<?php echo $valores['id_relator']?>][pregunta17]" value="1 Estrellas"><label for="rating-<?php echo $valores['id_relator']?>-input-17-1" class="rating-star"></label>
											</span>
										</div>
										<div class="form-group clearfix">
											<label class="rating_type">Demuestra habilidades de comunicación, explicando con claridad y ayudando a comprender.</label>
											<span class="rating">
											<input type="radio" class="required rating-input" id="rating-<?php echo $valores['id_relator']?>-input-18-5" name="preguntas[<?php echo $valores['id_relator']?>][pregunta18]" value="5 Estrellas"><label for="rating-<?php echo $valores['id_relator']?>-input-18-5" class="rating-star"></label>
											<input type="radio" class="required rating-input" id="rating-<?php echo $valores['id_relator']?>-input-18-4" name="preguntas[<?php echo $valores['id_relator']?>][pregunta18]" value="4 Estrellas"><label for="rating-<?php echo $valores['id_relator']?>-input-18-4" class="rating-star"></label>
											<input type="radio" class="required rating-input" id="rating-<?php echo $valores['id_relator']?>-input-18-3" name="preguntas[<?php echo $valores['id_relator']?>][pregunta18]" value="3 Estrellas"><label for="rating-<?php echo $valores['id_relator']?>-input-18-3" class="rating-star"></label>
											<input type="radio" class="required rating-input" id="rating-<?php echo $valores['id_relator']?>-input-18-2" name="preguntas[<?php echo $valores['id_relator']?>][pregunta18]" value="2 Estrellas"><label for="rating-<?php echo $valores['id_relator']?>-input-18-2" class="rating-star"></label>
											<input type="radio" class="required rating-input" id="rating-<?php echo $valores['id_relator']?>-input-18-1" name="preguntas[<?php echo $valores['id_relator']?>][pregunta18]" value="1 Estrellas"><label for="rating-<?php echo $valores['id_relator']?>-input-18-1" class="rating-star"></label>
											</span>
										</div>
										<div class="form-group clearfix">
											<label class="rating_type">Estimula la participación, generando un ambiente cálido y motivante.</label>
											<span class="rating">
											<input type="radio" class="required rating-input" id="rating-<?php echo $valores['id_relator']?>-input-19-5" name="preguntas[<?php echo $valores['id_relator']?>][pregunta19]" value="5 Estrellas"><label for="rating-<?php echo $valores['id_relator']?>-input-19-5" class="rating-star"></label>
											<input type="radio" class="required rating-input" id="rating-<?php echo $valores['id_relator']?>-input-19-4" name="preguntas[<?php echo $valores['id_relator']?>][pregunta19]" value="4 Estrellas"><label for="rating-<?php echo $valores['id_relator']?>-input-19-4" class="rating-star"></label>
											<input type="radio" class="required rating-input" id="rating-<?php echo $valores['id_relator']?>-input-19-3" name="preguntas[<?php echo $valores['id_relator']?>][pregunta19]" value="3 Estrellas"><label for="rating-<?php echo $valores['id_relator']?>-input-19-3" class="rating-star"></label>
											<input type="radio" class="required rating-input" id="rating-<?php echo $valores['id_relator']?>-input-19-2" name="preguntas[<?php echo $valores['id_relator']?>][pregunta19]" value="2 Estrellas"><label for="rating-<?php echo $valores['id_relator']?>-input-19-2" class="rating-star"></label>
											<input type="radio" class="required rating-input" id="rating-<?php echo $valores['id_relator']?>-input-19-1" name="preguntas[<?php echo $valores['id_relator']?>][pregunta19]" value="1 Estrellas"><label for="rating-<?php echo $valores['id_relator']?>-input-19-1" class="rating-star"></label>
											</span>
										</div>

											<div class="form-group clearfix">
											<label class="rating_type">Demuestra cómo aplicar los contenidos al puesto de trabajo.</label>
											<span class="rating">
											<input type="radio" class="required rating-input" id="rating-<?php echo $valores['id_relator']?>-input-20-5" name="preguntas[<?php echo $valores['id_relator']?>][pregunta20]" value="5 Estrellas"><label for="rating-<?php echo $valores['id_relator']?>-input-20-5" class="rating-star"></label>
											<input type="radio" class="required rating-input" id="rating-<?php echo $valores['id_relator']?>-input-20-4" name="preguntas[<?php echo $valores['id_relator']?>][pregunta20]" value="4 Estrellas"><label for="rating-<?php echo $valores['id_relator']?>-input-20-4" class="rating-star"></label>
											<input type="radio" class="required rating-input" id="rating-<?php echo $valores['id_relator']?>-input-20-3" name="preguntas[<?php echo $valores['id_relator']?>][pregunta20]" value="3 Estrellas"><label for="rating-<?php echo $valores['id_relator']?>-input-20-3" class="rating-star"></label>
											<input type="radio" class="required rating-input" id="rating-<?php echo $valores['id_relator']?>-input-20-2" name="preguntas[<?php echo $valores['id_relator']?>][pregunta20]" value="2 Estrellas"><label for="rating-<?php echo $valores['id_relator']?>-input-20-2" class="rating-star"></label>
											<input type="radio" class="required rating-input" id="rating-<?php echo $valores['id_relator']?>-input-20-1" name="preguntas[<?php echo $valores['id_relator']?>][pregunta20]" value="1 Estrellas"><label for="rating-<?php echo $valores['id_relator']?>-input-20-1" class="rating-star"></label>
											</span>
										</div>

									
										<br>
										
									</div>
								</div>
								<!-- /row -->
							</div>
    
						<?php endwhile; ?>			                     
					<!--//-->


								<!-- /step -->			          
								
								<!-- fin preguntas 17 al 20 -->



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
	
	<script src="js/script_llenado.js"></script>

</body>
</html>
