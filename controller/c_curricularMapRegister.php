<!--
	@Autor: Homero Luz
-->
<?php
include('../config/config.php');
include('userSession.php');

	$schoolSubjectSelectIn = $_POST['schoolSubjectSelect'];
	$gradeIn = $_POST['grade'];

	$findCurricularMap = "SELECT idCurricularMap, grade FROM curricularMap WHERE grade = '$gradeIn' AND idSchoolSubject = '$schoolSubjectSelectIn'";
	$result = $conexion->query($findCurricularMap);
	$count = mysqli_num_rows($result);

	if($count > 0){
		echo "<br />". "La meteria ya fue asignada al grado seleccionado" . "<br />";
		echo "<a href='../views/curricularMapRegister.php'>Valide su información</a>";
	} else {
		$registrationDate = date('Y-m-d h:i:s');
		$grade = (int)$gradeIn;
		$idSchoolSubject = (int)$schoolSubjectSelectIn;

		$query = "INSERT INTO curricularMap(grade, registrationDate, idSchoolSubject)
						 VALUES ('$grade', '$registrationDate', '$idSchoolSubject')";
		if ($conexion->query($query) === TRUE) {
			echo "<br />" . "<h2>" . "Materia asignada correctamente!" . "</h2>";
			echo "<h5>" . " " . "<a href='../views/curricularMapRegister.php'>Volver</a>" . "</h5>";
		} else {
			echo "Error al asignar materia: " . $query . "<br>" . $conexion->errno . "<br>" . $conexion->error;
		}
	}
	mysqli_close($conexion);
?>