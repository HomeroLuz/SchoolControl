<!--
	@Autor: Homero Luz
-->
<?php 
include('../config/config.php');
include('userSession.php');

$scoreList = "";
$partialScore = $_POST['partialScoreValue'];
$idScore = $_POST['idScoreValue'];
$partialScoreDouble = doubleval($partialScore);

if (isset($partialScore)) {
	$idCreator = $_SESSION['idUser'];
	$idModificator = $_SESSION['idUser'];

	$query = "INSERT INTO partialscore (partialScore, idCreator, idModificator, idScore) VALUES ('$partialScoreDouble', '$idCreator', '$idModificator', '$idScore')";

	if ($conexion->query($query) === TRUE) {
		// calcular promedio
		$getAverage = "SELECT AVG(partialScore) as calAverage FROM partialscore WHERE idScore = '$idScore'";
		$resultAverage = $conexion->query($getAverage);
		$rowAverage = $resultAverage->fetch_assoc();

		$calAverage = $rowAverage['calAverage'];
		$updateScore = "UPDATE score SET score = '$calAverage' WHERE score.idScore = $idScore";
		$conexion->query($updateScore);

		$scoreList .= '
			<br /> <h3 class="messageInfo scoreTabMargin">Info: Se agregó una nueva calificación a la evaluación seleccionada, presione el botón Recargar para ver cambios</h3> <br/>
		';
	} else {
		$scoreList .= '
			<br /><label class="messageError scoreTabMargin">Error al agregar calificación</label><br/>' . $conexion->errno . '<br/>' . $conexion->error .'<br/>
		';
	}
	$resultAverage->free();
	mysqli_close($conexion);

	// Mostrar resultados
	echo $scoreList;
}
?>