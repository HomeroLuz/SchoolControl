<!--
	@Autor: Homero Luz
-->
<?php
    include ('../controller/usersession.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>	
	<title>Registro</title>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="../css/bootstrap.css"> 
    <link rel="stylesheet" href="../css/main.css">
</head>
<body class=" ">
	<?php
		include('menu.php');
	?>	
	<form id="registerForm" action="../controller/c_register.php" method="POST">
		<!-- DATOS PERSONALES -->
		<label><h3>&ensp;DATOS PERSONALES</h3></label><br/>
		<div class="form-group">
			<label for="personalName">&emsp;Nombre</label>
			<input type="text" class="form-control" id="personalName" name="personalName" placeholder="i.e. Mario Perez" required="true">
		</div>
		
		<div class="form-group">
			<label for="emailAddress">&emsp;Correo electrónico</label>
			<input type="email" class="form-control" id="emailAddress" name="emailAddress" aria-describedby="emailHelp" placeholder="ejemplo@servidor.com" required="true">
		</div>

		<!-- DATOS DE USUARIO -->
		<div class="divider"/>
		<label><h3>&ensp;DATOS DE USUARIO</h3></label><br/>
		<div class="form-group">
			<label for="userName">&emsp;Nombre de usuario</label>
			<input type="text" class="form-control" id="userName" name="userName" placeholder="i.e. map_22" required="true">
			<small id="msgHelp" class="form-text text-muted">&emsp;Puede formar su nombre de usuario con las 2 letras de su nombre, la primera inicial de cada apellido y un número de dos dígitos</small>
		</div>
		<div class="form-group">
			<label for="userType">&emsp;Perfil de usuario:</label>
			<select class="form-control" id="userType" name="userType">
				<option selected value="-1">Seleccione una opción</option>
				<option value="0">Administrador</option>
				<option value="1">Capturador</option>
				<option value="2">Profesor</option>
				<option value="3">Usuario</option>
			</select>
		</div>
		<div class="form-group">
			<label for="inputPassword">&emsp;Contraseña</label>
			<input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password" required="true">
		</div>
		<div class="form-group">
			<label for="inputPassword">&emsp;Confirmar Contraseña</label>
			<input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required="true">
		</div>
		<div class="contentCenter">
			<button type="submit" class="btn btn-primary">Registrarse</button>
		</div>
	</form>
	<?php
		include('footer.php');
	?>
</body>
</html>