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
	<title>Creación del curso</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="#" />
	<meta name="keywords" content="#" />
	<meta name="author" content="#" />

  <link rel="shortcut icon" href="../images/favicon.ico" />



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


  <!-- GOOGLE WEB FONT -->
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">


<!-- css calendario -->
<!-- BASE CSS -->
 <!-- <link href="css/animate.min.css" rel="stylesheet"> -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
<!--  <link href="css/menu.css" rel="stylesheet"> -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
  <link href="css/icon_fonts/css/all_icons_min.css" rel="stylesheet">
  <link href="css/skins/square/grey.css" rel="stylesheet">
  
  <!-- BASE CSS -->
  <link href="css/date_time_picker.css" rel="stylesheet">
  
  <!-- COLOR CSS -->
  <link href="css/color_2.css" rel="stylesheet">

  <!-- YOUR CUSTOM CSS -->
  <link href="css/custom.css" rel="stylesheet">

  <script src="js/modernizr.js"></script>
  <!-- Modernizr -->

<!-- fin css calendario -->

<!-- estilos css del aumento relatores del curso -->



<!-- <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.1.3/darkly/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/dynamic-form.js"></script> -->

<!-- fin estilos css del aumento relatores del curso -->

<!-- Theme style  -->
<link rel="stylesheet" href="../css/style.css">

	<!-- Modernizr JS -->
<!--	<script src="../js/modernizr-2.6.2.min.js"></script> -->
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->


<script language="javascript">
function checkFields() {

	var email = /^(.+\@.+\..+)$/	        	//direccion de correo electronico
	var nombre = /^([a-z]|[A-Z]|á|é|í|ó|ú|ñ|ü|\s|\.|-\')+$/			//letras, '.' y '-' o vacio
	var dir = /^([a-z]|[A-Z]|[0-9\s\+\-\#\,\;\.])+$/	//numeros, espacios, + o -
	var rut = /^([a-z]|[A-Z]|[0-9\s\+\-\.])+$/	//numeros, espacios, + o -
	var x

 	//comprueba campo de nombre
	if(!nombre.test(formulario.nombre.value)) { 
		alert('Campo Nombre vacio')
		return false
	}   

	if(!dir.test(formulario.dir.value)) { 
		alert('Campo Dirección vacio')
		return false
	} 
	
	
	//comprueba campo de rut
	if(!rut.test(formulario.rut.value)) { 
		alert('Rut no valido')
		return false
	}  
	if (formulario.dv.rut_pass=='R'){
		if (formulario.dv.value!=formulario.digito.value){
			alert('Digito Verificador erroneo.')
			return false
		}	
		
		
	}
	
	
	if(formulario.participation.value=="Seleccione") { 
		alert('Seleccione opción de Inscripción')
		return false
	} 	
								   	

	//comprueba campo de email
	if(!email.test(formulario.email.value)) { 
		alert('Campo Email no valido')
		return false
	}  
	
	if(!email.test(formulario.re_email.value)) { 
		alert('Campo Email no valido')
		return false
	} 	
	
	if (formulario.email.value!=formulario.re_email.value){
		alert('Correos distintos')
		return false
	}
			

	

/*	alert('Los campos introducidos son CORRECTOS.')*/
	return true			//cambiar por return true para ejecutar la accion del formulario
}
</script>

<!-- Función que permite solo Números -->



<script>
function ValidaSoloNumeros() {
 if ((event.keyCode < 48) || (event.keyCode > 57)) 
  event.returnValue = false;
}
</script>
  
<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
</script>

<script type="text/javascript">
            function valideKey(evt) {
                var code = evt.which ? evt.which : evt.keyCode;
                if (code == 8) {
                    //backspace
                    return true;
                } else if (code >= 48 && code <= 57) {
                    //is a number
                    return true;
                } else {
                    return false;
                }
            }
        </script>

<!-- script campos dinamicos -->

<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/dynamic-form.js"></script>

<!-- fin script campos dinamicos -->


	</head>

  <a id="thickbox"></a>

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
                 ";  }
              } ?>

                <?php
                $conex=mysqli_connect("localhost", "root", "","capacitaciones");
              $result = mysqli_query($conex, "SELECT estamento FROM usuarios where estamento='rrhh' and id=$user_id");
                  if($result)
                  {
                      while ($registro = mysqli_fetch_array($result)){  
                echo"
                <li class='has-dropdown'>
                <a href='#''>Informes</a>
                <ul class='dropdown'>
                  <li><a href='../php/informe_inscritos_cursos.php'>Inscritos a cursos</a></li>
                  <li><a href='#''>Encuesta de los inscritos</a></li>
                </ul>
              </li>
                 ";  }
              } ?>

              <li><a href='../contacto.html'>Contacto</a></li>
              <li><a href="../login/php/logout.php">Salir</a></li>
            <!--  <li class="btn-cta"><a href="#"><span>Login</span></a></li>
              <li class="btn-cta"><a href="#"><span>Create a Course</span></a></li> -->
            </ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>

	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(../images/curso2.jpg); margin-top: -50px;" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>CREACIÓN DE CURSO</h1>
						<!--	<h2>pharetra dolor dui lobortis nulla</a></h2> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

<?php
   function get_client_ip() {
        $ip_usuario = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ip_usuario = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ip_usuario = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ip_usuario = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ip_usuario = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ip_usuario = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ip_usuario = getenv('REMOTE_ADDR');
        else
            $ip_usuario = 'DESCONOCIDA';
        return $ip_usuario;
    }

    ?>

	<div id="fh5co-contact">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-md-push-1 animate-box">
					
					<div class="fh5co-contact-info">
						<h3>Contactenos</h3>
						<ul>
							<li class="address">Unidad de Recursos Humanos, <br> Fiscalía Regional del Maule</li>
							<!-- <li class="phone"><a href="tel://712733323">71 2733323</a></li>
							<li class="email"><a href="mailto:jfsalinas@minpublico.cl">jfsalinas@minpublico.cl</a></li> -->
							<li class="url"><a href="http://172.17.107.250/v4/" target="_blank">Intranet Regional</a></li>
						</ul>
					</div>

          <?php
      //        $con=mysqli_connect('localhost', 'root', '', 'capacitaciones');
           //   $sql="SELECT usuarios.nombre, usuarios.apellido from usuarios inner join alumno on usuarios.id = alumno.id_alumno";
        //      $sql="SELECT usuarios.nombre, usuarios.apellido from usuarios inner join alumno on usuarios.id = '$user_id'";
          //    if ( $alumno=mysqli_query($con, $sql) ) {
            //      while ($obj = mysqli_fetch_object($alumno)) {
              //        echo $obj->nombre.PHP_EOL;
                //      echo $obj->apellido.PHP_EOL;
                //  }
                  /* liberar el conjunto de resultados */
               //   mysqli_free_result($alumno);
            //  } else {
             //     echo "Error: ". mysqli_error($con);
            //  }

              /* cerrar la conexión */
       //         mysqli_close($con);

         //     echo $user_id;
          //  ?>
				</div>
				<div class="col-md-6 animate-box">
					<h3>Complete los datos solicitados</h3>
					<form action="creacion_curso_bd.php" method="post" enctype="multipart/form-data" name="form1" target="_self" id="form1">
						<div class="row form-group">

              <!-- nombre curso -->
							<div class="col-md-12">

								  <input type="text" name="nombre_curso" id="nombre_curso" class="form-control" placeholder="Nombre del curso">
							</div> 
						
						</div> 

            <!-- fin nombre curso -->

            <input type="hidden" id="dir" name="ip" value="<?php echo $ip_usuario; ?>"> <!-- Podría ser <?=$ip?>, como fomra abreviada -->

					<!-- Fecha del curso -->         
             <div class="row form-group">
              <div class="col-md-12">
                 <input class="form-control required" type="date" name="fecha_curso" id="fecha_curso" placeholder="Fecha de realización">

                  <!--   <div class="button-group">
                      <a href="javascript:void(0)" class="btn btn-primary; color: #1f27ba" id="plus5_2">Añadir mas fechas</a>
                      <a href="javascript:void(0)" class="btn btn-danger" id="minus5_2">Remover fechas</a>
                  </div>
                      </div>
                    </div>

           <script type="text/javascript" src="js/script_fecha_dinamica.js"></script>   -->                       

         <!--  fin Fecha del curso -->

            <!-- horario del curso -->

            <div class="row form-group">
              <div class="col-md-12">
               <input type="time" name="horario_curso" id="horario_curso" class="form-control" placeholder="Horario del curso">
              </div>
            </div>

            <!-- fin horario del curso -->


            <!-- Tipo de jornada -->
            <div class="row form-group">
              <div class="col-md-12">
                  <select name="tipo_jornada" id="tipo_jornada" class="form-control" style="height: 50px" >
                    <option value=''>Jornada</option>
                    <option value='Diurno'>Diurno</option>
                    <option value='Vespertino'>Vespertino</option>
                    <option value='Completa'>Completa</option>
                  </select>
              </div>
            </div>

            <!-- fin Tipo de jornada -->

            <!-- cantidad de horas -->
             <div class="row form-group">
              <div class="col-md-12">
                <input type="text" name="numero_horas" id="numero_horas" class="form-control" placeholder="Cantidad de horas" onkeypress="return valideKey(event);" >
              </div>
            </div>

             <!-- fin cantidad de horas -->

             <!-- codigo SIGPER -->
            <div class="row form-group">
              <div class="col-md-12">
                <input type="text" name="sigper" id="sigper" class="form-control" placeholder="Codigo SIGPER">
              </div>
            </div>

            <!-- fin codigo SIGPER -->


            <!-- cantidad de vacantes -->
            <div class="row form-group">
              <div class="col-md-12">
                <input type="text" name="vacantes" id="vacantes" class="form-control" placeholder="Cantidad de vacantes" onkeypress="return valideKey(event);" >
              </div>
            </div>

             <!-- fin cantidad de vacantes -->


            <div class="row form-group">
              <div class="col-md-12">
                <input type="text" name="ubicacion" id="ubicacion" class="form-control" placeholder="Ubicación del curso">
              </div>
            </div>

            <div class="row form-group">
              <div class="col-md-12">
                <textarea name="descripcion"  id="descripcion" cols="30" rows="20" class="form-control" placeholder="Descripción del curso"></textarea>
              </div>
            </div>

            <!-- ambito -->
            <div class="row form-group">
            <div class="col-md-12">
                <select name="ambito" id="ambito" class="form-control" style="height: 50px" >
                    <option value=''>Elija un ambito</option>
                    <?php
                        $query = $mysqli -> query ("SELECT * FROM ambito");
                        while ($valores = mysqli_fetch_array($query)) {
                          echo '<option value="'.$valores[id_ambito].'">'.$valores[ambito].'</option>';
                        }
                       ?>

                  </select>
              </div>
            </div>
            <!-- fin ambito -->

        
      <!-- relatores -->
        <div class="row form-group" id="dynamic_form">
            <div class="col-md-12">
                  <select name="p_name" id="p_name" class="form-control" style="height: 50px" >
                    <option value=''>Elija un relator</option>
                    <?php
                        $query = $mysqli -> query ("SELECT id_relator, nombre_relator FROM relatores");
                        while ($valores = mysqli_fetch_array($query)) {
                          echo '<option value="'.$valores['id_relator'].'">'.$valores['nombre_relator'].'</option>';
                        }
                       ?>
                  </select>

                  <div class="button-group">
                      <a href="javascript:void(0)" class="btn btn-primary; color: #1f27ba" id="plus5">Añadir mas relatores</a>
                      <a href="javascript:void(0)" class="btn btn-danger" id="minus5">Remover Relator</a>
                  </div>

                  <script type="text/javascript">
      
                $(document).ready(function() {
                  var dynamic_form =  $("#dynamic_form").dynamicForm("#dynamic_form","#plus5", "#minus5", {
                    limit:10,
                    formPrefix : "dynamic_form",
                    normalizeFullForm : false
                });

                  dynamic_form.inject([{p_name: 'Hemant',quantity: '123',remarks: 'testing remark'},{p_name: 'Harshal',quantity: '123',remarks: 'testing remark'}]);

                $("#dynamic_form #minus5").on('click', function(){
                  var initDynamicId = $(this).closest('#dynamic_form').parent().find("[id^='dynamic_form']").length;
                  if (initDynamicId === 2) {
                    $(this).closest('#dynamic_form').next().find('#minus5').hide();
                  }
                  $(this).closest('#dynamic_form').remove();
                });

                $('form').on('submit', function(event){
                    var values = {};
                $.each($('form').serializeArray(), function(i, field) {
                    values[field.name] = field.value;
                });
                console.log(values) 
                    event.preventDefault();
                  })
                });

                </script>
       
      <!-- fin relatores -->
              </div> </div>      

            <br>
					<div class="row form-group">
              <div class="col-md-12">

                <a href="relatores_embed.php?keepThis=true&amp;TB_iframe=true&amp;height=280&amp;width=680" class="thickbox">    <h3>Si quiere agregar otro relator al listado, haga click aquí</h3>  </a>


							<input type="submit" name="enviar" onclick="valida_envia()" value="Enviar inscripción" class="btn btn-primary" id="enviar">
						</div>
            </div>
            
					</form>		
				</div>
			</div>
			
		</div>
	</div>
	
<!--	<div id="map" class="fh5co-map"></div> -->

<!--	<div id="fh5co-started" style="background-image:url(../images/img_bg_2.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Comenzemos</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center">
					<p><a href="#" class="btn btn-default btn-lg">Create A Free Course</a></p>
				</div>
			</div>
		</div>
	</div> -->

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
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="../js/google_map.js"></script>
	<!-- Main -->
	<script src="../js/main.js"></script>


<!-- script del modal -->

  <script>
$(document).ready(function(){
  $("#myBtn").click(function(){
    $("#myModal").modal();
  });
});
</script>

<!-- fin script del modal -->    


  <!-- SCRIPTS -->
  <!-- Jquery-->
      
  <script src="js/common_scripts.js"></script>
  <!-- Wizard script -->
  <script src="js/reservation_wizard_func.js"></script>
  <!-- Menu script -->
  <script src="js/velocity.min.js"></script>
  <script src="js/main.js"></script>
  <!-- Theme script -->
  <script src="js/functions.js"></script>
  <!-- Datepicker script -->
  <script src="js/datepicker_func.js"></script>
  <script type="text/javascript" src="js/dynamic-form.js"></script>




<!-- script que aumenta relatores del curso -->
 <!--  <script>
        $(document).ready(function() {
          var dynamic_form =  $("#dynamic_form").dynamicForm("#dynamic_form","#plus5", "#minus5", {
            limit:10,
            formPrefix : "dynamic_form",
            normalizeFullForm : false
        });

          dynamic_form.inject([{p_name: 'Hemant',quantity: '123',remarks: 'testing remark'},{p_name: 'Harshal',quantity: '123',remarks: 'testing remark'}]);

        $("#dynamic_form #minus5").on('click', function(){
          var initDynamicId = $(this).closest('#dynamic_form').parent().find("[id^='dynamic_form']").length;
          if (initDynamicId === 2) {
            $(this).closest('#dynamic_form').next().find('#minus5').hide();
          }
          $(this).closest('#dynamic_form').remove();
        });

        $('form').on('submit', function(event){
            var values = {};
        $.each($('form').serializeArray(), function(i, field) {
            values[field.name] = field.value;
        });
        console.log(values)
            event.preventDefault();
          })
        });
    </script>
</body><script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script> -->


<!-- fin script que aumenta relatores del curso -->


<!-- thickbox -->
<script language="javascript" type="text/javascript" src="../thickbox/javascript/jquery.js"></script>
<script language="javascript" type="text/javascript" src="../thickbox/javascript/thickbox.js"></script>
<link rel="stylesheet" href="../css/thickbox.css" type="text/css" media="screen"> 
<!-- fin --> 

	</body>
</html>

