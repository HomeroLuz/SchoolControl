<?php 
	// Datos de comfiguracion para conexion con la base de datos
	$db_server = 'localhost';
	$db_database = 'schoolcontrol';
	$db_username = 'root';
	$db_password = '';
	$conexion = new mysqli($db_server, $db_username, $db_password, $db_database);
	if ($conexion->connect_errno) {
	    echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
	}
	/*echo $conexion->host_info . "\n";*/
?>