<!--
	@Autor: Homero Luz
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>   
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="../css/bootstrap.css"> 
    <link rel="stylesheet" href="../css/main.css">
</head>
<body class=" ">
	<?php
		include('menuAnonymous.php');
	?>
	<label class="formTitle">Iniciar Sesion</label><br/>
	<form id="loginForm" action="../controller/c_login.php" method="POST">
		<div class="form-group">
			<label for="userName" class="formLabel">Usuario</label>
			<input type="text" class="form-control form-in" id="userName" name="userName" placeholder="i.e. gopm12" required="true">
		</div>
		<div class="form-group">
			<label for="pass" class="formLabel">Password</label>
			<input type="password" class="form-control form-in" id="pass" name="pass" placeholder="Password" required="true">
		</div>
		
		<button type="submit" class="btn btn-primary btn-margin">Aceptar</button>
	</form>
	<script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
	<script src="../js/vendor/bootstrap.js"></script>
	<script src="../js/main.js"></script>
	<?php
		include('footer.php');
	?>
</body>
</html>
