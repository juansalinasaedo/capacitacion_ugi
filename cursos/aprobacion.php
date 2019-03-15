<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";
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

  <link rel="shortcut icon" href="../images/favicon.ico" />


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
	<link rel="stylesheet" href="../css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="../css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="../css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="../css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="../css/owl.carousel.min.css">
	<link rel="stylesheet" href="../css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="../css/style.css">

	<!-- Modernizr JS -->
	<script src="../js/modernizr-2.6.2.min.js"></script>
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
					</div>
				</div>
			</div>
		</div>


	<div class="top-menu">
			<div class="container">
				<div class="row">
					<div class="col-xs-1">
						<div id="fh5co-logo"><a href="../bienvenido.php"><img src="../images/resources/logo_blanco.png" style="width: 220px; height: 180px"></a></div>
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
                            echo $obj->nombre.PHP_EOL;
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
					   <li><a href="../bienvenido.php">Home</a></li>
					   <?php
		               $conex=mysqli_connect("localhost", "root", "","capacitaciones");
		               $result = mysqli_query($conex, "SELECT estamento FROM usuarios where estamento='rrhh' and id=$user_id");
		                  if($result)
		                  {
		                      while ($registro = mysqli_fetch_array($result)){  
		                echo"
		                <li class='has-dropdown'>
		                <a href='creacion_curso.php'>Creación de cursos</a>
		                </li>
		                <li class='has-dropdown'>
		                <a href='#''>Informes</a>
		                <ul class='dropdown'>
		                  <li><a href='informe_inscritos_cursos.php'>Inscritos a cursos</a></li>
		                  <li><a href='#''>Encuesta de los inscritos</a></li>
		                </ul>
		              	</li>
		                 ";  }
		              } ?>

					 <li><a href='../contacto.html'>Contacto</a></li>
             		 <li><a href="../login/php/logout.php">Salir</a></li>
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>

	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(../images/curso3.jpg); margin-top: -50px;" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Usuarios en cursos inscritos</h1>
							<h2>Favor de revisar y <a href="#">aprobar</a></h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div id="fh5co-pricing">
		<div class="container">
			<div class="row">
				<div class="pricing">
					<?php
				  	$conex=mysqli_connect("localhost", "root", "","capacitaciones");
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
				          while ($obj = mysqli_fetch_object($result)){  
						echo"

						<div class='col-md-3 animate-box'>
						<div class='price-box'>
							<h2 class='pricing-plan'>Usuario</h2>
							<div class='price'><sup class='currency'>$obj->nombre<br>$obj->apellido</div>
							<ul class='classes'>
								<li>Curso: $obj->nombre_curso</li>
								<li>ID Curso: $obj->id_curso</li>
								<li class='color'>Email: $obj->email</li>
								<li>Fecha de inscripcion: $obj->fecha_inscripcion</li>
								<li class='color'>Mensaje: $obj->mensaje</li>
								<form action='aprobacion_bd.php' method='post' enctype='multipart/form-data' name='form1' target='_self' id='form1'>
								<input type='hidden' name='id_usuario' id='id_usuario' value='$obj->id_usuario'>
								<input type='hidden' name='id_cursos' id='id_cursos' value='$obj->id_curso'>
								<input type='hidden' name='nombre_alumno' id='nombre_alumno' value='$obj->nombre'+'$obj->apellido'>
								<br>
								<h3>Elija una opción</h3>
								<select name='aprobacion' id='aprobacion' class='form-control' style='height: 50px' >
				                    <option value='Aprobado'>Aprobado</option>
				                    <option value='Rechazado'>Rechazado</option>
				                 </select><br>
				                 <input type='submit' name='enviar' onclick='valida_envia()'' value='Validar' class='btn btn-primary' id='enviar'>
				                </form> 
							</ul>
							
						</div>
						</div>
						";  }
					} ?>


					<?php
				  	$conex=mysqli_connect("localhost", "root", "","capacitaciones");
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
				          while ($obj = mysqli_fetch_object($result)){  
						echo"
						 <table width='900' border='1' colspan='2' align='center'>
							  <tbody>
							    <tr>
							      <td colspan='2'><b>Usuario:</b><br> $obj->nombre $obj->apellido</td>
							      <td colspan='2'><b>ID Curso:</b><br> $obj->id_curso</td>
							      <td colspan='2'><b>Email:</b><br> $obj->email</td>
							      <td colspan='2'><b>Fecha de inscripcion:</b><br> $obj->fecha_inscripcion</td>
							      <td colspan='2'><b>Mensaje:</b><br> $obj->mensaje</td>
							      <td colspan='3'> <input name='aprobar[]'' value='$obj->id_usuario' type='checkbox'/></td>
							    </tr>
								
							  </tbody>
							</table>
						";  }
					} 
					?>
					<input type='submit' name='enviar' onclick='valida_envia()'' value='Validar' class='btn btn-primary' id='enviar'>

			
				</div>
			</div>
		</div>
	</div>
	


<footer id="fh5co-footer" role="contentinfo">
		<div class="container">
	
			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; 2019 Fiscalía Regional del Maule</small> 
				
					</p>
			
				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="../js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="../js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="../js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="../js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="../js/jquery.stellar.min.js"></script>
	<!-- Carousel -->
	<script src="../js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="../js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="../js/jquery.magnific-popup.min.js"></script>
	<script src="../js/magnific-popup-options.js"></script>
	<!-- Main -->
	<script src="../js/main.js"></script>

	</body>
</html>