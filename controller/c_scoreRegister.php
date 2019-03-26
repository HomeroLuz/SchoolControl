<!--
	@Autor: Homero Luz
-->
<?php 
include('../config/config.php');
include('userSession.php');

$scoreList = "";
$idSchoolSubject = $_POST['idSchoolSubjectValue'];
$idStudent = $_POST['idStudentValue'];
$title = $_POST['scoreTitleValue'];

if (isset($idSchoolSubject)) {
	$findScore = "SELECT idScore, title, score, idSchoolSubject, idStudent FROM score WHERE idSchoolSubject = 1 AND idStudent = 1 ";
	$result = $conexion->query($findScore);
	$count = mysqli_num_rows($result);

	if ($count > 0) {
		$scoreList .= '
			<br />
			<label>El nombre de la evaluación ya existe agregue otro diferente</label>
			<br />
		';
	} else {
		$idCreator = $_SESSION['idUser'];
		$idModificator = $_SESSION['idUser'];

		$query = "INSERT INTO score (title, score, idCreator, idModificator, idSchoolSubject, idStudent) VALUES ('$title', '0', '$idCreator', '$idModificator', '$idSchoolSubject', '$idStudent')";
		if ($conexion->query($query) === TRUE) {
			$scoreList .= '
				<br /> <h3 class="messageInfo scoreTabMargin">Info: Se agrego una nueva evaluación con exito, presione el botón Recargar para ver cambios</h3> <br/>
			';
		} else {
			$scoreList .= '
				<br /><label class="messageError scoreTabMargin">Error al crear evaluación</label>	
			';
		}
	}
	mysqli_close($conexion);

	// Mostrar resultados
	echo $scoreList;
}

?>