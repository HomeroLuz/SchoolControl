<?php
	session_start();

	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
		/*echo "Usuario tipo: " . $_SESSION['type'];*/
	} else {
		echo "Esta pagina es solo para usuarios registrados.<br>";
		echo "<br><a href='../views/login.php'>Login</a>";
	exit;
	}

	$now = time();
	if($now > $_SESSION['expire']) {
		session_destroy();
		echo "Su sesion a terminado,
		<a href='../views/login.php'>Necesita Hacer Login</a>";
		exit;
	}
?>