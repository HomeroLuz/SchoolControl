<?php
	include("../config/config.php");

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

	$findUser = "SELECT * FROM user WHERE userName = '$userNameIn'";
	$result = $conexion->query($findUser);
	$count = mysqli_num_rows($result);
	echo "Count: " . $count;

	if ($count > 0) {
		 echo "<br />". "El Nombre de Usuario ya a sido tomado." . "<br />";
		 echo "<a href='index.html'>Por favor escoga otro Nombre</a>";
	} else{
		if($userTypeIn == 'Administrador'){
			$userType = 0;
		} else if ($userTypeIn == 'Capturador') {
			$userType = 1;
		} else {
			$userType = 2;
		}

		$hash = password_hash($inputPasswordIn, PASSWORD_BCRYPT);
		$registrationDate = date('Y-m-d h:i:s');
		$query = "INSERT INTO user (userName, name, email, password, registrationDate, type) 
							VALUES ('$userNameIn', '$personalNameIn', '$emailAddressIn', '$hash', '$registrationDate', '$userType')";
		if ($conexion->query($query) === TRUE) {
			echo "<br />" . "<h2>" . "Usuario Creado Exitosamente!" . "</h2>";
			echo "<h4>" . "Bienvenido: " . $personalNameIn . "</h4>" . "\n\n";
			echo "<h5>" . "Hacer Login: " . "<a href='login.php'>Login</a>" . "</h5>";
		} else {
			echo "Error al crear el usuario: " . $query . "<br>" . $conexion->errno . "<br>" . $conexion->error;
		}
	}

	mysqli_close($conexion);
?>