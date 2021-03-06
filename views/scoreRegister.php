<!--
	@Autor: Homero Luz
-->
<?php
	include('../controller/usersession.php');
	include('../config/config.php');

	$groupList = "SELECT idGroup, name, adviser, quota, inscribed, low, groupKey, grade, registrationDate FROM schoolgroup";
	$groupResult = $conexion->query($groupList);

?>
<!DOCTYPE html>
<html lang="en">
<head>	
	<title>Calificar</title>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="../css/bootstrap.css"> 
    <link rel="stylesheet" href="../css/main.css">
</head>
<body class=" ">
	<?php
		include('menu.php');
	?>
	<form id="scoreRegisterForm" method="POST">
		<label><h3>&ensp;DAR DE ALTA CALIFICACIÓN</h3></label><br/>
		<div class="instructionsText">Para dar de alta una calificación seleccione el grupo</div>
		<div class="form-group">
			<label for="groupSelected">&emsp;Grupo:</label>
			<select class="form-control" id="groupSelected" name="groupSelected">
				<option selected value="0">Seleccione una opción</option>
				<?php    
			    while ( $groupRow = $groupResult->fetch_array() )    
				{
			        ?>
					<option value=" <?php echo $groupRow['idGroup'] ?> " >
						<?php echo $groupRow['name'] . " - " . $groupRow['adviser'] . " - " . $groupRow['grade'] ?>
					</option>
					<?php
				}
				$groupResult->free();
				$conexion->close();
				?>     
			</select>
		</div>		
		<div class="contentCenter">
			<button type="button" class="btn btn-primary" onclick="getStudents()">Ver alumnos</button>
		</div>
		<hr/>
	</form>
	<div id="resultStudents"></div>
	<div id="resultSchoolSubject"></div>
	<div id="resultScore"></div>
	<div id="resultShowScore"></div>

</body>
<script src="../js/scoreRegister.js"></script>
<?php
	include('footer.php');
?>
</html>