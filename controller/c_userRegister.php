<?php
	include('../config/config.php');

	$personalNameIn = $_POST['personalName'];
	$emailAddressIn = $_POST['emailAddress'];
	$userNameIn = $_POST['userName'];
	$inputPasswordIn = $_POST['inputPassword'];
	$confirmPasswordIn = $_POST['confirmPassword'];
	
	if($inputPasswordIn != $confirmPasswordIn) {
		die('Las contraseñas no coinciden, verifique y vuelva a intentarlo <br /> <a href="../views/userRegister.php">Volver</a>');
	}

	$findUser = "SELECT * FROM user WHERE userName = '$userNameIn'";
	$result = $conexion->query($findUser);
	$count = mysqli_num_rows($result);

	if ($count > 0) {
		 echo "<br />". "El nombre de usuario ya existe" . "<br />";
		 echo "<a href='../views/userRegister.php'>Por favor escoja uno diferente</a>";
	} else{
		$hash = password_hash($inputPasswordIn, PASSWORD_BCRYPT);
		$registrationDate = date('Y-m-d h:i:s');
		$query = "INSERT INTO user (userName, name, email, password, registrationDate, type) 
							VALUES ('$userNameIn', '$personalNameIn', '$emailAddressIn', '$hash', '$registrationDate', '2')";
		if ($conexion->query($query) === TRUE) {
			echo "<br />" . "<h2>" . "Usuario Creado Exitosamente!" . "</h2>";
			echo "<h4>" . "Bienvenido: " . $personalNameIn . "</h4>" . "\n\n";
			echo "<h5>" . "Puede ingresar: " . "<a href='../views/login.php'>Login</a>" . "</h5>";
		} else {
			echo "Error al crear el usuario: " . $query . "<br>" . $conexion->errno . "<br>" . $conexion->error;
		}
	}

	mysqli_close($conexion);
?>