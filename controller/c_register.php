<?php
	include("../config/config.php");
	include('keyGenerator.php');
	date_default_timezone_set('UTC');
	
	//obtenemos los valores del formulario
	$userNameIn = $_POST['userName'];
	$personalNameIn = $_POST['personalName'];
	$emailAddressIn = $_POST['emailAddress'];
	$userTypeIn = $_POST['userType'];
	$inputPasswordIn = $_POST['inputPassword'];
	$confirmPasswordIn = $_POST['confirmPassword'];

	//se confirma la contraseña
	if($inputPasswordIn != $confirmPasswordIn) {
		die('Las contraseñas no coinciden, Verifique <br /> <a href="index.html">Volver</a>');
	}

	$findUser = "SELECT userName FROM user WHERE userName = '$userNameIn'";
	$result = $conexion->query($findUser);
	$count = mysqli_num_rows($result);

	if ($count > 0) {
		 echo "<br />". "El Nombre de Usuario ya a sido tomado." . "<br />";
		 echo "<a href='index.html'>Por favor escoga otro Nombre</a>";
	} else{
		$userType = (int)$userTypeIn;
		$hash = password_hash($inputPasswordIn, PASSWORD_BCRYPT);
		$registrationDate = date('Y-m-d H:i:s');
		$userCodeIn = generateKey(11);
		$query = "INSERT INTO user (userName, name, email, password, registrationDate, type, userCode) 
							VALUES ('$userNameIn', '$personalNameIn', '$emailAddressIn', '$hash', '$registrationDate', '$userType', '$userCodeIn')";
		if ($conexion->query($query) === TRUE) {
			echo "<br />" . "<h2>" . "El usuario " . $personalNameIn . " fue creado Exitosamente!" . "</h2>";
			echo "<h5>" . " " . "<a href='../views/home.php'>Volver</a>" . "</h5>";
		} else {
			echo "Error al crear el usuario: " . $query . "<br>" . $conexion->errno . "<br>" . $conexion->error;
		}
	}

	mysqli_close($conexion);
?>