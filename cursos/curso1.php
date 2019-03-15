<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
  print "<script>alert(\"Acceso invalido!\");window.location='../index.php';</script>";
}
        
  $user_id=$_SESSION["user_id"];
  $mysqli = new mysqli('127.0.0.1', 'root', '', 'capacitaciones');
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

	<!-- Theme style  -->
	<link rel="stylesheet" href="../css/style.css">

  <!-- calendario -->
  <link href="calendario/calendario_dw-estilos.css" type="text/css" rel="STYLESHEET">
  <script type="text/javascript" src="calendario/jquery-1.4.4.min.js"></script>
  <script type="text/javascript" src="calendario/calendario_dw.js"></script>

  <!-- fin calendario -->

	<!-- Modernizr JS -->
	<script src="../js/modernizr-2.6.2.min.js"></script>


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
  function esNumero(value) {
  return value / value === 1;
}

function validar(event, form) {
  var inputs = $(form).serializeArray();
  var numero = inputs.find(input => input.name === 'numero' );
  return esNumero(numero.value); // && otras validaciones;
}

function preguntar(event) {
  event.preventDefault();
  swal({
    title: "¿Esta seguro de querer inscribirse?",
    text: "",
    icon: "warning",
    buttons: {
      cancel: {
        text: "Cancelar",
        value: null,
        visible: true,
        className: "",
        closeModal: true,
      },
      confirm: {
        text: "Si",
        value: true,
        visible: true,
        className: "",
        closeModal: true
      }
    }
  }).then(function(value) {
     var form = $('#form1');
    if (value) form.submit();
  });

}  
</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
						<div id="fh5co-logo"><a href="../bienvenido.php"><img src="../images/resources/logo_blanco.png" style="width: 220px; height: 180px"></a></div>
					</div>
					<div class="col-xs-11 text-right menu-1">
						<ul>
              <?php
                    $con=mysqli_connect('127.0.0.1', 'root', '', 'capacitaciones');
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
					<!--		<li class="active"><a href="cursos/curso1.php">Cursos disponibles</a></li> -->
						
						<?php
                $conex=mysqli_connect("127.0.0.1", "root", "","capacitaciones");
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
                $conex=mysqli_connect("127.0.0.1", "root", "","capacitaciones");
              $result = mysqli_query($conex, "SELECT estamento FROM usuarios where estamento='rrhh' and id=$user_id");
                  if($result)
                  {
                      while ($registro = mysqli_fetch_array($result)){  
                echo"
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
						<!--	<li class="btn-cta"><a href="#"><span>Login</span></a></li>
							<li class="btn-cta"><a href="#"><span>Create a Course</span></a></li> -->
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>

	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(../images/curso1.jpg); margin-top: -50px;" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>INSCRIPCIONES</h1>
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
					<!--		<li class="phone"><a href="tel://712733323">71 2733323</a></li>
							<li class="email"><a href="mailto:jfsalinas@minpublico.cl">jfsalinas@minpublico.cl</a></li> -->
							<li class="url"><a href="http://172.17.107.250/v4/" target="_blank">Intranet Regional</a></li>
						</ul>
					</div>
    

				</div>
				<div class="col-md-6 animate-box">
					<h3>Complete los datos solicitados</h3>
					<form action="envia_mail_2019.php" method="post" enctype="multipart/form-data" name="form1" target="_self" id="form1">
						<div class="row form-group">
						
            	<div class="col-md-12">

                <label for="fname">Nombre Inscrito: </label> 

              <?php
              $con=mysqli_connect('127.0.0.1', 'root', '', 'capacitaciones');
              $con->set_charset("utf8");
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
            <br>

              <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>">
 
						</div> <br>

            <input type="hidden" id="dir" name="ip" value="<?php echo $ip_usuario; ?>"> <!-- Podría ser <?=$ip?>, como fomra abreviada -->

					<!-- email del inscrito -->
          	
            <div class="row form-group">
              <div class="col-md-12">
                <label for="fname" style="margin-left: 15px;">Email del inscrito: </label> 
              <?php
              $con=mysqli_connect('127.0.0.1', 'root', '', 'capacitaciones');
              $con->set_charset("utf8");
              $sql="SELECT usuarios.email from usuarios inner join alumno on usuarios.id = '$user_id'";
              if ( $email=mysqli_query($con, $sql) ) {
                  while ($obj = mysqli_fetch_object($email)) {
                      echo $obj->email.PHP_EOL;
                      echo "<input type='hidden' id='mail' name='mail' value='$obj->email'>";
                  }
                  /* liberar el conjunto de resultados */
                  mysqli_free_result($email);
              } else {
                  echo "Error: ". mysqli_error($con);
              }
              mysqli_close($con);
            ?>
            <br>
            </div>
						</div>

            <!-- fin email del inscrito -->


            <!-- estamento del inscrito -->
            
            <div class="row form-group">
              <div class="col-md-12">
                <label for="fname" style="margin-left: 15px;">Estamento del inscrito: </label> 
              <?php
              $con=mysqli_connect('127.0.0.1', 'root', '', 'capacitaciones');
              $con->set_charset("utf8");
              $sql="SELECT usuarios.estamento from usuarios inner join alumno on usuarios.id = '$user_id'";
              if ( $estamento=mysqli_query($con, $sql) ) {
                  while ($obj = mysqli_fetch_object($estamento)) {
                      echo $obj->estamento.PHP_EOL;
                      echo "<input type='hidden' id='estamento' name='estamento' value='$obj->estamento'>";
                  }
                  /* liberar el conjunto de resultados */
                  mysqli_free_result($estamento);
              } else {
                  echo "Error: ". mysqli_error($con);
              }
              mysqli_close($con);
            ?>
            <br>
            </div>
            </div>

            <!-- fin estamento del inscrito -->


            <!-- fiscalia del inscrito -->
            
            <div class="row form-group">
              <div class="col-md-12">
                <label for="fname" style="margin-left: 15px;">Fiscalía del inscrito: </label> 
              <?php
              $con=mysqli_connect('127.0.0.1', 'root', '', 'capacitaciones');
              $con->set_charset("utf8");
              $sql="SELECT usuarios.fiscalia from usuarios inner join alumno on usuarios.id = '$user_id'";
              if ( $fiscalia=mysqli_query($con, $sql) ) {
                  while ($obj = mysqli_fetch_object($fiscalia)) {
                      echo $obj->fiscalia.PHP_EOL;
                      echo "<input type='hidden' id='fiscalia' name='fiscalia' value='$obj->fiscalia'>";
                  }
                  /* liberar el conjunto de resultados */
                  mysqli_free_result($fiscalia);
              } else {
                  echo "Error: ". mysqli_error($con);
              }
              mysqli_close($con);
            ?>
            <br>
            </div>
            </div>

            <!-- fin fiscalia del inscrito -->

            <!-- Elección del curso -->
            <div class="row form-group">
            <div class="col-md-12">
            <label for="fname" style="margin-left: 15px;">Nombre del curso: </label> 
            <?php
                 $nombre_curso=$_POST["nombre_curso"];
                 $id_curso=$_POST["id_curso"];
                
                    echo "<input type='hidden' id='nombre_curso' name='nombre_curso' value='$nombre_curso'>";
                    echo "<input type='hidden' id='id_curso' name='id_curso' value='$id_curso'>"; 
                 echo $nombre_curso; 
            ?>

            </div>
            </div>   

            <!-- Fin Elección del curso -->

            <!-- fecha del curso -->
            <div class="row form-group">
            <div class="col-md-12">
            <label for="fname" style="margin-left: 15px;">Fecha del curso: </label> 
            <?php
                     $fechas_curso=$_POST["fechas_curso"];
                
                    echo "<input type='hidden' id='fechas_curso' name='fechas_curso' value='$fechas_curso'>"; 
                 echo $fechas_curso; 
            ?>

            </div>
            </div>   
            <!-- fin fecha del curso -->

            <!-- horario del curso -->
            <div class="row form-group">
            <div class="col-md-12">
            <label for="fname" style="margin-left: 15px;">Horario del curso: </label> 
            <?php
                     $horario_curso=$_POST["horario_curso"];
                
                    echo "<input type='hidden' id='horario_curso' name='horario_curso' value='$horario_curso'>"; 
                 echo $horario_curso; 
            ?>

            </div>
            </div>   
            <!-- fin horario del curso -->


            <!-- jornada del curso -->
            <div class="row form-group">
            <div class="col-md-12">
            <label for="fname" style="margin-left: 15px;">Jornada del curso: </label> 
            <?php
                     $tipo_jornada=$_POST["tipo_jornada"];
                
                 echo "<input type='hidden' id='tipo_jornada' name='tipo_jornada' value='$tipo_jornada'>"; 
                 echo $tipo_jornada; 
            ?>

            </div>
            </div>   
            <!-- fin jornada del curso -->


            <!-- relatores del curso -->
          <div class="row form-group">
            <div class="col-md-12">
            <label for="fname" style="margin-left: 15px;">Relatores del curso: </label> 
            <?php
                    $id_relator=$_POST["id_relator"];
                    $con=mysqli_connect('127.0.0.1', 'root', '', 'capacitaciones');
                    $con->set_charset("utf8"); 
                    $result = mysqli_query($conex, "SELECT nombre_relator FROM relatores where id_relator='$id_relator'");
                    if($result)
                    {
                        while ($registro = mysqli_fetch_object($result))
                        {  
                          echo "<input type='hidden' id='id_relator' name='id_relator' value='$id_relator'>"; 
                          echo $registro->nombre_relator.PHP_EOL;  
                      }
                    }
            ?>

            </div>
            </div>    

            <!-- fin relatores del curso -->


            <!-- Ubicación del curso -->
            <div class="row form-group">
            <div class="col-md-12">
            <label for="fname" style="margin-left: 15px;">Ubicación del curso: </label> 
            <?php
                     $ubicacion=$_POST["ubicacion"];
                
                    echo "<input type='hidden' id='ubicacion' name='ubicacion' value='$ubicacion'>"; 
                 echo $ubicacion; 
            ?>

            </div>
            </div>   
            <!-- fin Ubicación del curso -->


             <!-- descripcion del curso -->
            <div class="row form-group">
            <div class="col-md-12">
            <label for="fname" style="margin-left: 15px;">Descripcion del curso: </label> 
            <?php
                     $descripcion_curso=$_POST["descripcion"];
                
                    echo "<input type='hidden' id='descripcion_curso' name='descripcion_curso' value='$descripcion_curso'>"; 
                 echo $descripcion_curso; 
            ?>

            </div>
            </div>   

            <!-- fin descripcion del curso -->


						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="message">Message</label> -->
								<textarea name="mensaje"  id="mensaje" cols="30" rows="10" class="form-control" placeholder="Mensaje"></textarea>
							</div>
						</div>
						<div class="form-group">
							<input type="submit" name="enviar" onclick="preguntar(event)" value="Enviar inscripción" class="btn btn-primary" id="enviar">
						</div>

					</form>		
				</div>
			</div>
			
		</div>
	</div>
	

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




	</body>
</html>

