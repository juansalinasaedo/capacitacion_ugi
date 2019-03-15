<?php session_start(); ?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Inscripciones Capacitación Fiscalía</title>
		<link rel="stylesheet" type="text/css" href="login/bootstrap/css/bootstrap.min.css">
		<link rel="shortcut icon" href="images/favicon.ico" />
	</head>
	<body>
	<?php include "login/php/navbar.php"; ?>


<div class="container">
<div class="row">
<div class="col-md-6">
		<h2><img src="images/logo.gif" width="128" height="79"></h2>

	<!--	 <form role="form" name="login" action="login/php/login_fiscalia.php" method="post">  -->
		  <form role="form" name="login" action="login/php/login.php" method="post"> 
		  <div class="form-group">
		    <label for="username">Nombre de usuario</label>
		    <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario">
		  </div>
		  <div class="form-group">
		    <label for="password">Contrase&ntilde;a</label>
		    <input type="password" class="form-control" id="password" name="password" placeholder="Contrase&ntilde;a">
		  </div>

		  <button type="submit" class="btn btn-default">Acceder</button>
		</form>
</div>
</div>
</div>
		<script src="login/js/valida_login.js"></script>
	</body>
</html>