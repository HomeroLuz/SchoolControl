<!--
	@Autor: Homero Luz
-->
<?php
	include('../controller/usersession.php');
	include('../config/config.php');

	$schoolSubjectList = "SELECT idSchoolSubject, name, schoolSubjectKey, numberHours, credits FROM schoolSubject";
	$result = $conexion->query($schoolSubjectList);
?>
<!DOCTYPE html>
<html lang="en">
<head>	
	<title>Carga de Materias</title>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="../css/bootstrap.css"> 
    <link rel="stylesheet" href="../css/main.css">
</head>
<body class=" ">
	<?php
		include('menu.php');
	?>
	<form id="curricularMapRegisterForm" action="../controller/c_curricularMapRegister.php" method="POST">
		<label><h3>&ensp;ASIGNAR CARGA DE MATERIAS POR GRADO(AÑO ESCOLAR)</h3></label><br/>
		<div class="form-group">
			<label for="schoolSubjectSelect">&emsp;Materias:</label>
			<select class="form-control" id="schoolSubjectSelect" name="schoolSubjectSelect">
				<option selected value="0">Seleccione una opción</option>
				<?php    
			    while ( $row = $result->fetch_array() )    
				{
			        ?>
					<option value=" <?php echo $row['idSchoolSubject'] ?> " >
						<?php echo $row['name']; ?>
					</option>
					<?php
				}
				$result->free();
				$conexion->close();
				?>     
			</select>
		</div>
		<div class="form-group">
			<label for="grade">&emsp;Agregar a grado:</label>
			<select class="form-control" id="grade" name="grade">
				<option selected value="-1">Seleccione una opción</option>
				<option value="1">Primero</option>
				<option value="2">Segundo</option>
				<option value="3">Tercero</option>
			</select>
		</div>
		<div class="contentCenter">
			<button type="submit" class="btn btn-primary">Aceptar</button>
		</div>
		<hr/>
	</form>
</body>
<?php
	include('footer.php');
?>
</html>