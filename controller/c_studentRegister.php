<!--
	@Autor: Homero Luz
-->
<?php
include('../config/config.php');
include('userSession.php');
include('keyGenerator.php');

	$personalNameIn = $_POST['personalName'];
	$paternalSurnameIn = $_POST['paternalSurname'];
	$maternalSurnameIn = $_POST['maternalSurname'];
	$birthDateIn = $_POST['birthDate'];
	$genderIn = $_POST['gender'];
	$curpIn = $_POST['curp'];
	$addressIn = $_POST['address'];
	$phoneIn = $_POST['phone'];
	$groupSelectIn = $_POST['groupSelect'];

	$findStudent = "SELECT name, curp FROM student WHERE curp = '$curpIn'";
	$result = $conexion->query($findStudent);
	$count = mysqli_num_rows($result);

	if($count > 0){
		echo "<br />". "El alumno con el CURP ingresado ya fue registrado" . "<br />";
		echo "<a href='../views/groupRegister.php'>Valide su información</a>";
	} else {
		$registrationDate = date('Y-m-d h:i:s');
		$idGroup = (int)$groupSelectIn;
		$gender = (int)$genderIn;
		$idCreator = $_SESSION['idUser'];
		$studentKeyIn = generateKey(10);
		$query = "
		INSERT INTO 
					student(
							name, 
							paternalSurname,
							maternalSurname, 
							birthDate, 
							gender, 
							curp, 
							studentKey, 
							address, 
							phone,
							registrationDate, 
							idCreator, 
							idGroup
						)
					VALUES(
							'$personalNameIn',
							'$paternalSurnameIn',
							'$maternalSurnameIn',
							'$birthDateIn',
							'$gender',
							'$curpIn',
							'$studentKeyIn',
							'$addressIn',
							'$phoneIn',
							'$registrationDate',
							'$idCreator',
							'$idGroup'
							)
				";
		$getGroup = "SELECT idGroup, inscribed FROM schoolGroup WHERE idGroup = '$idGroup'";
		$resultGetGroup = $conexion->query($getGroup);
		$row = $resultGetGroup->fetch_array(MYSQLI_ASSOC);
		$inscribedIn = $row['inscribed'];
		$inscribed = (int)$inscribedIn + 1;
		$updateGroup = "UPDATE schoolGroup SET inscribed = '$inscribed' WHERE idGroup = '$idGroup'";

		if ($conexion->query($query) === TRUE && $conexion->query($updateGroup) === TRUE) {
			echo "<br />" . "<h2>" . "Alumno registrado Exitosamente!" . "</h2>";
			echo "<h5>" . " " . "<a href='../views/studentRegister.php'>Volver</a>" . "</h5>";
		} else {
			echo "Error al crear el alumno: " . $query . "<br>" . $conexion->errno . "<br>" . $conexion->error;
		}
	}

	mysqli_close($conexion);
?>