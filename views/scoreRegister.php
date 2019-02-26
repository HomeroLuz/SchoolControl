<!--
	@Autor: Homero Luz
-->
<?php
	include('../controller/usersession.php');
	include('../config/config.php');

	$groupList = "SELECT idGroup, name, adviser, quota, inscribed, low, groupKey, grade, registrationDate FROM schoolgroup";
	$groupResult = $conexion->query($groupList);

	/*$getStudentList = "SELECT student.idStudent, student.name, student.paternalSurname, student.maternalSurname, student.birthDate, student.gender, student.curp, student.studentKey, student.address, student.phone, student.registrationDate, student.idCreator, schoolgroup.idGroup, schoolgroup.name as groupName, schoolgroup.groupKey, schoolgroup.grade FROM student INNER JOIN schoolgroup ON student.idGroup = schoolgroup.idGroup";
	$result = $conexion->query($getStudentList);*/

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
	<form id="scoreRegisterForm" action="" method="POST">
		<label><h3>&ensp;DAR DE ALTA CALIFICACIÓN</h3></label><br/>
		<div class="form-group">
			<label for="studentSelected">&emsp;Grupo:</label>
			<select class="form-control" id="studentSelected" name="studentSelected">
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
			<button type="submit" class="btn btn-primary" onclick="getStudents()">Ver alumnos</button>
		</div>
		<hr/>
	</form>
</body>
<script src="../js/scoreRegister.js"></script>
<?php
	include('footer.php');
?>
</html>