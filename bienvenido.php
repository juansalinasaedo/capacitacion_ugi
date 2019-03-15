<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
	print "<script>alert(\"Acceso invalido!\");window.location='index.php';</script>";
}
  $user_id=$_SESSION["user_id"];
  $mysqli = new mysqli('localhost', 'root', '', 'capacitaciones');
  mysqli_set_charset($mysqli,'utf8'); // para mostrar correctamente los acentos y las ñ 

?>

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Inscripciones Capacitación Fiscalía</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by freehtml5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="freehtml5.co" />

	<link rel="shortcut icon" href="images/favicon.ico" />



  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,700,800" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="top">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 text-right">
					<!--	<p class="num">Call: +01 123 456 7890</p>
						<ul class="fh5co-social">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
							<li><a href="#"><i class="icon-github"></i></a></li>
						</ul> -->
					</div>
				</div>
			</div>
		</div>

		<div class="top-menu">
			<div class="container">
				<div class="row">
					<div class="col-xs-1">
						<div id="fh5co-logo"><a href="#"><img src="images/resources/logo_blanco.png" style="width: 220px; height: 180px"></a></div>
					</div>
					<div class="col-xs-11 text-right menu-1">
						<ul>
						<?php
			              $con=mysqli_connect('localhost', 'root', '', 'capacitaciones');
			              $con->set_charset("utf8");
			                //   $sql="SELECT usuarios.nombre, usuarios.apellido from usuarios inner join alumno on usuarios.id = alumno.id_alumno";
			              $sql="SELECT usuarios.nombre, usuarios.apellido from usuarios inner join alumno on usuarios.id = '$user_id'";
			              if ( $alumno=mysqli_query($con, $sql) ) {
			                  while ($obj = mysqli_fetch_object($alumno)) {
			                      echo "<li class='active'>",$obj->nombre.PHP_EOL,"</li>";
			                      echo $obj->apellido.PHP_EOL;
			                  }
			                  /* liberar el conjunto de resultados */
			                  mysqli_free_result($alumno);
			              } else {
			                  echo "Error: ". mysqli_error($con);
			              }
			              /* cerrar la conexión */
			              mysqli_close($con);
          				  ?>
							<li class="active"><a href="#">Home</a></li>
				
				
						<?php
						  	$conex=mysqli_connect("localhost", "root", "","capacitaciones");
							$result = mysqli_query($conex, "SELECT estamento FROM usuarios where estamento='rrhh' and id=$user_id");
						      if($result)
						      {
						          while ($registro = mysqli_fetch_array($result)){  
								echo"
								<li class='has-dropdown'>
								<a href='cursos/creacion_curso.php'>Creación de cursos</a>
								</li>
								 ";  

								 echo"
								<li class='has-dropdown'>
								<a href='cursos/aprobacion.php'>Aprobación de inscritos</a>
								</li>
								 "; 


								 echo"
								<li class='has-dropdown'>
								<a href='#''>Informes</a>
								<ul class='dropdown'>
									<li><a href='php/informe_inscritos_cursos.php'>Inscritos a cursos</a></li>
									<li><a href='#''>Encuesta de los inscritos</a></li>
								</ul>
							</li>
								 "; 

								}
							}  ?>

						
							<li><a href='contacto.html'>Contacto</a></li>
							<li><a href='login/php/logout.php'>Salir</a></li>
							
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>

	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/bandera.jpg); margin-top: -50px;" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Cursos</h1>
						<!--	<h2>Free html5 templates Made by <a href="http://freehtml5.co" target="_blank">freehtml5.co</a></h2> -->
						<h2>Fiscalía Regional del Maule</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div id="fh5co-explore" class="fh5co-bg-section">


	<!--	<div class="container">
			<div class="row animate-box">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading" style="margin-bottom: -100px;">
					<h2>Lista de cursos disponibles</h2> 
				
				</div>
			</div>
		</div>		
		<div class="fh5co-explore">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-pull-1 animate-box">
						<img class="img-responsive" src="images/work_1.png" alt="work">
					</div>
					<div class="col-md-4 animate-box">
						<div class="mt">
							<div>
								<h4><i class="icon-user"></i>Real Project For Real Solutions</h4>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia. </p>
							</div>
							<div>
								<h4><i class="icon-video2"></i>Real Project For Real Solutions</h4>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
							</div>
							<div>
								<h4><i class="icon-shield"></i>Real Project For Real Solutions</h4>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia. </p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->

<!--	<div id="fh5co-project" style="margin-bottom: -100px;">
		<div class="container-fluid proj-bottom">
			<div class="row">
				<div class="col-md-4 col-sm-6 fh5co-project animate-box" data-animate-effect="fadeIn" style="margin-left: 300px">
					<a href="cursos/curso1.php"><img src="images/cursos/curso1.jpg" alt="" class="img-responsive">
						<h3>RPA y DELITOS VIOLENTOS</h3>
						<span>Ver curso</span>
					</a>
				</div>
				<div class="col-md-4 col-sm-6 fh5co-project animate-box" data-animate-effect="fadeIn">
					<a href="cursos/curso1.php"><img src="images/cursos/curso2.jpg" alt="" class="img-responsive">
						<h3>TRÁFICO ILÍCITO DE ESTUPEFACIENTES Y SUSTANCIAS SICOTRÓPICAS</h3>
						<span>Ver curso</span>
					</a>
				</div>
			</div>
		</div>


		<div class="container-fluid proj-bottom">
			<div class="row">
				<div class="col-md-4 col-sm-6 fh5co-project animate-box" data-animate-effect="fadeIn" style="margin-left: 300px">
					<a href="cursos/curso1.php"><img src="images/cursos/curso3.jpg" alt="" class="img-responsive">
						<h3>SISTEMA INFORMÁTICO DE APOYO AL MODELO DE INGRESO Y ASIGNACIÓN</h3>
						<span>Ver curso</span>
					</a>
				</div>
				<div class="col-md-4 col-sm-6 fh5co-project animate-box" data-animate-effect="fadeIn">
					<a href="cursos/curso1.php"><img src="images/cursos/curso4.jpg" alt="" class="img-responsive">
						<h3>TALLER DE LIDERAZGO</h3>
						<span>Ver curso</span>
					</a>
				</div>
			</div>
		</div>  -->


<!-- prueba muestra de cursos desde BD -->

		  	<?php
	$imagenes[0]='images/cursos/cursoX1.jpg';
	$imagenes[1]='images/cursos/cursoX2.jpg';
	$imagenes[2]='images/cursos/cursoX3.jpg';
	$imagenes[3]='images/cursos/cursoX4.jpg';
	$imagenes[4]='images/cursos/cursoX5.jpg'; 
	$imagenes[5]='images/cursos/cursoX6.jpg'; 
	$imagenes[6]='images/cursos/cursoX7.jpg';  	
  	$conex=mysqli_connect("localhost", "root", "","capacitaciones");
  	$utf8=mysqli_query($conex, "SET NAMES 'utf8'");
	$result = mysqli_query($conex, "SELECT nombre_curso, id_curso, fechas_curso, horario_curso, tipo_jornada, id_relator, descripcion, ubicacion from cursos where disponible='si' and vacantes >0 and fechas_curso > NOW() order by fechas_curso DESC");
      if($result)
      {
          while ($registro = mysqli_fetch_object($result)){  
          $i=rand(0,6);		
			echo"
		
			<div class='container-fluid proj-bottom'>
			<div class='row'>
				<div class='col-md-8 col-sm-6 fh5co-project animate-box' data-animate-effect='fadeIn' style='margin-left: 300px'>
				
					<a href='#'><img src='$imagenes[$i]' alt='' class='img-responsive'>
						<h3><b>CURSO DISPONIBLE - $registro->nombre_curso</b></h3>
						<h4><b>Fecha de realización:</b> $registro->fechas_curso</h4>
					</a>
					<form action='cursos/curso1.php' method='post' enctype='multipart/form-data' name='form_curso' target='_self' id='form_curso'>
					<input type='hidden' name='id_curso' id='id_curso' value='$registro->id_curso'>
					<input type='hidden' name='id_relator' id='id_relator' value='$registro->id_relator'>
					<input type='hidden' name='descripcion' id='descripcion' value='$registro->descripcion'>
					<input type='hidden' name='ubicacion' id='ubicacion' value='$registro->ubicacion'>
					<input type='hidden' name='fechas_curso' id='fechas_curso' value='$registro->fechas_curso'>
					<input type='hidden' name='horario_curso' id='horario_curso' value='$registro->horario_curso'>
					<input type='hidden' name='tipo_jornada' id='tipo_jornada' value='$registro->tipo_jornada'>
					<input name='nombre_curso' class='btn btn-default btn-lg' type='submit' value='$registro->nombre_curso' id='nombre_curso' /> 
				</form>	
				</div>
			</div>
		</div>

			 ";  }
	} ?>

<!-- fin prueba muestra de cursos desde BD -->


	<!--Codigo para div de inscripción de cursos (si es que el estamento del usuario es rrhh) -->		

  	<?php
  	$conex=mysqli_connect("localhost", "root", "","capacitaciones");
	$result = mysqli_query($conex, "SELECT estamento FROM usuarios where estamento='rrhh' and id=$user_id");
      if($result)
      {
          while ($registro = mysqli_fetch_array($result)){  
		echo"<div id='fh5co-started' style='background-image:url(images/img_bg_2x.jpg); margin-bottom: 100px;'>
		<div class='overlay'></div>
		<div class='container'>
			<div class='row animate-box'>
				<div class='col-md-8 col-md-offset-2 text-center fh5co-heading'>
					<h2>Inscripción de cursos</h2>
					<p>Si usted desea inscribir un curso a la capacitaciones, favor ingresar aquí</p>
				</div>
			</div>
			<div class='row animate-box'>
				<div class='col-md-8 col-md-offset-2 text-center'>
					<p><a href='cursos/creacion_curso.php' class='btn btn-default btn-lg'>Crear curso</a></p>
				</div>
			</div>
		</div>
	</div> ";  }
	} ?>

	<!-- fin div de inscripción de cursos  -->




		<div class="fh5co-explore fh5co-explore1">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-push-5 animate-box">
						<img class="img-responsive" src="images/work_2.png" alt="work">
					</div>
					<div class="col-md-4 col-md-pull-8 animate-box">
						<div class="mt">
							<h3>Encuesta de satisfacción</h3>
							<p>Su opinión es muy importante para nosotros, por ello, le solicitamos que responda esta breve encuesta que nos permitirá conocer su apreciación particular respecto de las actividades de capacitación. </p>
						<!--	<ul class="list-nav">
								<li><i class="icon-check2"></i>Ambito 1</li>
								<li><i class="icon-check2"></i>Ambito 2</li>
								<li><i class="icon-check2"></i>Ambito 2</li>
							</ul> -->
							<p><a class="btn btn-primary btn-lg  btn-video" href="encuestas/encuesta_satisfaccion.php"><i class="icon-play"></i> Realizar encuesta</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>



  <!-- informe de inscritos en cursos -->

  	<?php
  	$conex=mysqli_connect("localhost", "root", "","capacitaciones");
	$result = mysqli_query($conex, "SELECT estamento FROM usuarios where estamento='rrhh' and id=$user_id");
      if($result)
      {
          while ($registro = mysqli_fetch_array($result)){  
		echo"
			<div class='container'>
			<div class='row'>
			
				<div class='col-md-12 text-center animate-box'>
					<p><a class='btn btn-primary btn-lg btn-learn' href='php/informe_inscritos_cursos.php'>Informe de inscritos a cursos</a></p>
				</div> <br>

				<div class='col-md-12 text-center animate-box'>
					<p><a class='btn btn-primary btn-lg btn-learn' href='#''>Informe de encuesta de los inscritos</a></p>
				</div>
			</div>
		</div>
	</div>
		";  }
	} ?>


	<!-- fin informe de inscritos en cursos -->
	
	
	<footer id="fh5co-footer" role="contentinfo">
		<div class="container">
			
			<!-- <div class="row row-pb-md">
				<div class="col-md-3 fh5co-widget">
					<h4>Acerca de la fiscalía</h4>
					<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<h4>Sistemas Regionales</h4>
					<ul class="fh5co-footer-links">
						<li><a href="http://172.17.107.21/tramitacion/index.php" target="_blank">Sige</a></li>
						<li><a href="http://172.17.107.21/archivo_provisional/" target="_blank">Archivo Provisional</a></li>
						<li><a href="#">Contact</a></li>
						<li><a href="#">Terms</a></li>
						<li><a href="#">Meetups</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<h4>Learn &amp; Grow</h4>
					<ul class="fh5co-footer-links">
						<li><a href="#">Blog</a></li>
						<li><a href="#">Privacy</a></li>
						<li><a href="#">Testimonials</a></li>
						<li><a href="#">Handbook</a></li>
						<li><a href="#">Held Desk</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<h4>Engage us</h4>
					<ul class="fh5co-footer-links">
						<li><a href="#">Marketing</a></li>
						<li><a href="#">Visual Assistant</a></li>
						<li><a href="#">System Analysis</a></li>
						<li><a href="#">Advertise</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<h4>Legal</h4>
					<ul class="fh5co-footer-links">
						<li><a href="#">Find Designers</a></li>
						<li><a href="#">Find Developers</a></li>
						<li><a href="#">Teams</a></li>
						<li><a href="#">Advertise</a></li>
						<li><a href="#">API</a></li>
					</ul>
				</div>
			</div>  -->

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; 2019 Fiscalía Regional del Maule</small> 
					<!--	<small class="block">Designed by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a></small> -->
					</p>
			<!--		<p>
						<ul class="fh5co-social-icons">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p> -->
				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>