<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="MAVIA - Register, Reservation, Questionare, Reviews form wizard">	
	<meta name="author" content="Ansonika">
	<title>Inscripciones Capacitación Fiscalía</title>

	<!-- Favicons-->
	<link rel="shortcut icon" href="../images/favicon.ico" />

	<!-- <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png"> -->

	<!-- GOOGLE WEB FONT -->
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">

	<!-- BASE CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/animate.min.css" rel="stylesheet">

	<!-- YOUR CUSTOM CSS -->
	<link href="css/custom.css" rel="stylesheet">
    
	<script type="text/javascript">
    function delayedRedirect(){
        window.location = "../bienvenido.php"
    }
    </script>

</head>
<!--<body onLoad="setTimeout('delayedRedirect()', 8000)" style="background-color:#fff;"> -->

<?php
						include ('conecta.php');

						/* Entrada de datos a BD  */

								$id_usuario=$_POST["id_usuario"];
								$nombre=$_POST["nombre"];
								$apellido=$_POST["apellido"];
								$email=$_POST["email"];
								$id_curso=$_POST["id_curso"];
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
						 		$pregunta12=$_POST["pregunta12"];
						 		$pregunta13=$_POST["pregunta13"];

						 		$pregunta14=$_POST["pregunta14"];
						 		$pregunta15=$_POST["pregunta15"];
						 		$pregunta16=$_POST["pregunta16"];
						 		$preguntas=$_POST["preguntas"];
						 	/*	$pregunta18=$_POST["pregunta18"];
						 		$pregunta19=$_POST["pregunta19"];
						 		$pregunta20=$_POST["pregunta20"]; */

								$comentarios=$_POST["mensaje"];


								$con=mysqli_connect('127.0.0.1', 'root', '', 'capacitaciones');
							/*	$nombre_curso=("SELECT `nombre_curso` FROM `capacitaciones`.`cursos` WHERE `id_curso`='$id_curso'");
								$curso=mysqli_query($con, $nombre_curso);   */
								
								//recibes el valor del formulario (preguntas)
								$arr_preguntas= (isset($_POST["preguntas"]))?$_POST["preguntas"]:null;
								
								//creas un array simple (preguntas)
								$arr_pre = array();

								$preguntas_relatores = '<br><br><b>Resultado del array: </b>';
								foreach ($arr_preguntas as $key_pre => $row_pre){

									$preguntas_relatores .= '<h3>Id relator '.$key_pre.'<h3>';
									$preguntas_relatores .= '<ul>';
									foreach ($row_pre as $pregunta => $valor_de_pregunta) {
										$preguntas_relatores .= '<li>'.$pregunta.': '.$valor_de_pregunta.'</li>';
									}
									$preguntas_relatores .= '</ul>';
								}
								
								//parseas el array para imprimirlo como texto.(preguntas)
								
						/* para ver que devuelve el formulario */ 
						
						echo '<b>Nombre: </b>',$nombre,' ', $apellido,'<br>','<b>Email: </b>', $email,'<br>','<b>La información previa sobre sala, horarios y objetivos fue clara y oportuna: </b>',$pregunta1,'<br>',$pregunta2,'<br>',$pregunta3,'<br>',$pregunta4,'<br>',$pregunta5,'<br>',$pregunta6,'<br>',$pregunta7,'<br>',$pregunta8,'<br>',$pregunta9,'<br>',$pregunta10,'<br>',$pregunta11,'<br>',$pregunta12,'<br>',$pregunta13,'<br>',$pregunta14,'<br>',$pregunta15,'<br>',$pregunta16,'<br>','<b>Nombre del curso: </b>',$id_curso,'<br>','<b>Comentarios u Observaciones: </b>', $comentarios;

					  echo $preguntas_relatores;	

						echo "<input type='hidden' name='id_curso' id='id_curso' value='$id_curso'>";


						 $sql = ("INSERT INTO `capacitaciones`.`encuesta_curso` (`id_usuario`, `nombre_alumno`, `apellido_alumno`, `email_alumno`, `id_curso`, `fecha_evaluacion`, `pregunta1`, `pregunta2`, `pregunta3`, `pregunta4`, `pregunta5`, `pregunta6`, `pregunta7`, `pregunta8`, `pregunta9`, `pregunta10`, `pregunta11`, `pregunta12`, `pregunta13`, `pregunta14`, `pregunta15`, `pregunta16`, `comentarios`) VALUES ('$nombre', '$apellido', '$email', '$id_curso', NOW(), '$pregunta1', '$pregunta2', '$pregunta3', '$pregunta4', '$pregunta5', '$pregunta6', '$pregunta7', '$pregunta8', '$pregunta9', '$pregunta10', '$pregunta11', '$pregunta12', '$pregunta13', '$pregunta14', '$pregunta15', '$pregunta16', '$comentarios')"); 
        				 mysqli_query($con, $sql);

						/* Fin Entrada de datos a BD  */

					//	$mail = $_POST['email'];
					//	$to = "jfsalinas@minpublico.cl";/* YOUR EMAIL HERE */
					//	$subject = "Questionare from MAVIA";
					//	$headers = "From: Questionare from MAVIA <noreply@yourdomain.com>";
					//	$message = "DETAILS\n";
					//	$message .= "\nHow do you describe your overall satisfaction? " . $_POST['satisfaction'];
					//	$message .= "\nHow do you describe your carrer or profile?\n" ;
					//	foreach($_POST['question_2'] as $value) 
					//		{ 
					//		$message .=   "- " .  trim(stripslashes($value)) . "\n"; 
					//		};
					//	$message .= "USER DETAILS\n";
					//	$message .= "\nFirst name: " . $_POST['firstname'];
					//	$message .= "\nLast name: " . $_POST['lastname'];
					//	$message .= "\nEmail: " . $_POST['email'];
					//	$message .= "\nTelephone: " . $_POST['telephone'];
					//	$message .= "\nTerms and conditions accepted: " . $_POST['terms'];
												
						//Receive Variable
					//	$sentOk = mail($to,$subject,$message,$headers);
						
						//Confirmation page
					//	$user = "$mail";
					//	$usersubject = "Thank You";
					//	$userheaders = "From: info@mavia.com\n";
						/*$usermessage = "Thank you for your time. Your quotation request is successfully submitted.\n"; WITH OUT SUMMARY*/
						//Confirmation page WITH  SUMMARY
					//	$usermessage = "Thank you for your time. Your request is successfully submitted. We will reply shortly.\n\nBELOW A SUMMARY\n\n$message"; 
					//	mail($user,$usersubject,$usermessage,$userheaders);  -->
	
?>
<!-- END SEND MAIL SCRIPT -->   

<div id="success">
    <div class="icon icon--order-success svg">
              <svg xmlns="http://www.w3.org/2000/svg" width="72px" height="72px">
                <g fill="none" stroke="#8EC343" stroke-width="2">
                  <circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
                  <path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                </g>
              </svg>
     </div>
<h4><span>Request successfully sent!</span>Thank you for your time</h4>
<small>You will be redirect back in 5 seconds.</small>
</div>
</body>
</html>