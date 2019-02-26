<?php
	include('../config/config.php');
	include('userSession.php');
	include('keyGenerator.php');

	$nameIn = $_POST['name'];
	$numberHoursIn = $_POST['numberHours'];
	$creditsIn = $_POST['credits'];

	$findSchoolSubject = "SELECT idSchoolSubject, name FROM schoolsubject WHERE name = '$nameIn'";
	$result = $conexion->query($findSchoolSubject);
	$count = mysqli_num_rows($result);

	if ($count > 0) {
		echo "<br />". "El nombre de la materia ya fue utilizado" . "<br />";
		echo "<a href='../views/schoolSubjectRegister.php'>Por favor escoja otro nombre</a>";
	} else {
		$credits = (int)$creditsIn;
		$numberHours = (int)$numberHoursIn;
		$registrationDate = date('Y-m-d h:i:s');
		$schoolSubjectKeyIn = generateKey(13);
		$idCreator = $_SESSION['idUser'];

		$query = "INSERT INTO schoolsubject(name, schoolSubjectKey, numberHours, credits, registrationDate, idCreator)
						 VALUES ('$nameIn', '$schoolSubjectKeyIn', '$numberHours', '$credits', '$registrationDate', '$idCreator')";
		if ($conexion->query($query) === TRUE) {
			echo "<br />" . "<h2>" . "Materia Creada Exitosamente!" . "</h2>";
			echo "<h5>" . " " . "<a href='../views/schoolSubjectRegister.php'>Volver</a>" . "</h5>";
		} else {
			echo "Error al crear materia: " . $query . "<br>" . $conexion->errno . "<br>" . $conexion->error;
		}
	}
	mysqli_close($conexion);
?>