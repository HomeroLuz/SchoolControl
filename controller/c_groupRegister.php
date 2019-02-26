<?php
	include('../config/config.php');
	include('userSession.php');
	include('keyGenerator.php');

	$groupNameIn = $_POST['groupName'];
	$adviserIn = $_POST['adviser'];
	$quotaIn = $_POST['quota'];
	$gradeIn = $_POST['grade'];

	$findGroup = "SELECT name FROM schoolgroup WHERE name = '$groupNameIn'";
	$result = $conexion->query($findGroup);
	$count = mysqli_num_rows($result);

	if($count > 0){
		echo "<br />". "El nombre de grupo ya fue utilizado" . "<br />";
		echo "<a href='../views/groupRegister.php'>Por favor escoja otro nombre</a>";
	} else {
		$registrationDate = date('Y-m-d h:i:s');
		$quota = (int)$quotaIn;
		$grade = (int)$gradeIn;
		$groupKeyIn = generateKey(12);
		$idCreator = $_SESSION['idUser'];
		$query = "INSERT INTO schoolgroup(name, adviser, quota, inscribed, low, groupKey, grade, registrationDate, idCreator)
						VALUES ('$groupNameIn', '$adviserIn', '$quota', '0', '0', '$groupKeyIn', '$grade', '$registrationDate', '$idCreator')";
		if ($conexion->query($query) === TRUE) {
			echo "<br />" . "<h2>" . "Grupo Creado Exitosamente!" . "</h2>";
			echo "<h5>" . " " . "<a href='../views/groupRegister.php'>Volver</a>" . "</h5>";
		} else {
			echo "Error al crear el grupo: " . $query . "<br>" . $conexion->errno . "<br>" . $conexion->error;
		}
	}
	mysqli_close($conexion);
?>