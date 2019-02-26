<!--
	@Autor: Homero Luz
-->
<?php
	include('../controller/usersession.php');
	include('../config/config.php');

	$studentKeySelected = $_GET['opc'];
	$studentInformation = "SELECT student.idStudent, student.name, student.paternalSurname, student.maternalSurname, student.birthDate, student.gender, student.curp, student.studentKey, student.address, student.phone, student.registrationDate, student.idCreator, schoolgroup.idGroup, schoolgroup.name as groupName, schoolgroup.grade, schoolgroup.groupKey FROM student INNER JOIN schoolgroup ON student.idGroup = schoolgroup.idGroup WHERE student.studentKey = '$studentKeySelected'";
	$result = $conexion->query($studentInformation);
	$row = $result->fetch_assoc();
	
?>
<!DOCTYPE html>
<html lang="en">
<head>	
	<title>Detalle de grupo</title>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="../css/bootstrap.css"> 
    <link rel="stylesheet" href="../css/main.css">
</head>
<body class=" ">
	<?php
		include('menu.php');
	?>
	<div class="jumbotron">
		<h1 class="display-4"><?php echo $row['paternalSurname'] ." ". $row['maternalSurname'] ." ". $row['name'] ?></h1><br/>
		<table class="table">
			<tr>
				<td><label>Fecha de nacimiento:</label> <?php echo $row['birthDate'] ?></td>
				<td>
					<label>Género:</label> 
					<?php 
					if ($row['gender'] == 1) {
						echo " Masculino";
					} else if($row['gender'] == 2){
						echo " Femenino";
					}?>
				</td>
				<td><label>CURP:</label> <?php echo $row['curp'] ?> </td>
			</tr>
			<tr>
				<td><label>Domicilio:</label> <?php echo $row['address'] ?></td>
				<td><label>Contacto:</label> <?php echo $row['phone'] ?></td>
				<td><label>Fecha de registro:</label> <?php echo $row['registrationDate'] ?></td>
			</tr>
			<tr>
				<td><label>Clave en sistema:</label> <?php echo $row['studentKey'] ?></td>
				<td><label>Grado:</label> <?php echo $row['grade'] ?></td>
				<td><label>Inscrito a grupo:</label> <?php echo $row['groupName'] ?></td>
			</tr>
		</table>
	</div>
	<p class="lead contentCenter">
		<a class="btn btn-primary btn-lg" href="showStudents.php" role="button">Atras</a>
	</p>
</body>
<?php
    include('footer.php');
?>
</html>