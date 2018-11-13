<!--
	@Autor: Homero Luz
-->
<?php
	include('../controller/usersession.php');
	include('../config/config.php');

	$listGroups = "SELECT idGroup, name FROM schoolGroup";
	$result = $conexion->query($listGroups);
?>
<!-- Si hay una sesion ahora validar permiso de usuario -->
<?
	
?>
<!DOCTYPE html>
<html lang="en">
<head>	
	<title>Registro de alumno</title>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="../css/bootstrap.css"> 
    <link rel="stylesheet" href="../css/main.css">
</head>
<body class=" ">
	<?php
		include('menu.php');
	?>
	<form id="studentRegisterForm" action="../controller/c_studentRegister.php" method="POST">
		<label><h3>&ensp;DATOS PERSONALES</h3></label><br/>
		<div class="form-group">
			<label for="personalName">&emsp;Nombre(s)</label>
			<input type="text" class="form-control" id="personalName" name="personalName" placeholder="i.e. Mario" required="true">
		</div>
		<div class="form-group">
			<label for="paternalSurname">&emsp;Apellido parteno</label>
			<input type="text" class="form-control" id="paternalSurname" name="paternalSurname" placeholder="i.e. Perez" required="true">
		</div>
		<div class="form-group">
			<label for="maternalSurname">&emsp;Apellido materno</label>
			<input type="text" class="form-control" id="maternalSurname" name="maternalSurname" placeholder="i.e. Gonzalez" required="true">
		</div>
		<div class="form-group">
			<label for="date">&emsp;Fecha de nacimiento</label>
			<input type="date" class="form-control" id="birthDate" name="birthDate" required="true">
		</div>
		<div class="form-group">
			<label for="gender">&emsp;Género</label>
			<select class="form-control" id="gender" name="gender">
				<option selected value="0">Seleccione una opción</option>
				<option value="1">Masculino</option>
				<option value="2">Femenino</option>
			</select>
		</div>
		<div class="form-group">
			<label for="curp">&emsp;CURP</label>
			<input type="text" class="form-control" id="curp" name="curp" placeholder="" required="true">
		</div>
		<div class="form-group">
			<label for="address">&emsp;Dirección</label>
			<input type="text" class="form-control" id="address" name="address" placeholder="" required="true">
		</div>
		<div class="form-group">
			<label for="phone">&emsp;Teléfono</label>
			<input type="text" class="form-control" id="phone" name="phone" placeholder="" required="true">
		</div>
		<label><h3>&ensp;DATOS ACADEMICOS</h3></label><br/>
		<div class="form-group">
			<label for="groupInscribed">&emsp;Agregar a grupo:</label>
			<select class="form-control" id="groupSelect" name="groupSelect">
				<option selected value="0">Seleccione una opción</option>
				<?php    
			    while ( $row = $result->fetch_array() )    
				{
			        ?>
					<option value=" <?php echo $row['idGroup'] ?> " >
						<?php echo $row['name']; ?>
					</option>
					<?php
				}
				?>     
			</select>
		</div>
		<div class="form-group">
			<label for="grade">&emsp;Grado</label>
			<input type="text" class="form-control" id="grade" name="grade" placeholder="i.e. 1, 2 o 3 según el grado" required="true">
		</div>
		<div class="contentCenter">
			<button type="submit" class="btn btn-primary">Registrar</button>
		</div>
	</form>
	<script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
	<script src="../js/vendor/bootstrap.js"></script>
	<script src="../js/main.js"></script>
</body>
</html>