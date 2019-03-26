<!--
	@Autor: Homero Luz
-->
<?php 
include('../config/config.php');
include('userSession.php');

$scoreTable = "";
$idSchoolSubject = $_POST['idSchoolSubjectValue'];
$idStudent = $_POST['idStudentValue'];

if (isset($idSchoolSubject)) {
	$getScoreList = "SELECT idScore, title, score, idSchoolSubject, idStudent FROM score WHERE idSchoolSubject = '$idSchoolSubject' AND idStudent = '$idStudent' ";
	$getAverage = "SELECT AVG(score) as averageScore FROM score WHERE idSchoolSubject = '$idSchoolSubject' AND idStudent = '$idStudent' ";
	$resultScore = $conexion->query($getScoreList);
	$resultAverage = $conexion->query($getAverage);
	$rowAverage = $resultAverage->fetch_assoc();

	$scoreAverage = $rowAverage['averageScore'];
	$scoreTable .= '
			<div class="scoreTab">
				<div class="scoreTabMargin">
					<label><h3>LISTA DE EVALUACIONES PARA LA MATERIA SELECCIONADA&ensp;</h3></label><button type="button" class="btn btn-primary btn-sm" onclick="getScore( '. $idSchoolSubject .','. $idStudent . ')">Recargar</button><br/>
					<label>Promedio actual con base en evaluaciones: '. $scoreAverage .'</label>
					<table class="table">';

	while ($row = $resultScore->fetch_array()) {
		$titleTxt = $row['title'];
		$scoreTxt = $row['score'];
		$idScoreTxt = $row['idScore'];

		$scoreTable .= '
						<tr>
							<td><label>'. $titleTxt .'</lable>&emsp;';
					if ($scoreTxt > 0) {
						$scoreTable .= ''. $scoreTxt . '
						<input type="text" class="form-control" id="partialScore'.$idScoreTxt.'" name="partialScore" placeholder="i.e. 8" required="true">
						<button type="button" class="btn btn-primary buttonTable2" onclick="addPartialScore( '. $idScoreTxt .')">Agregar calificación</button><br/>';
					} else {
						$scoreTable .= '
							<input type="text" class="form-control" id="partialScore'.$idScoreTxt.'" name="partialScore" placeholder="i.e. 8" required="true">
							<button type="button" class="btn btn-primary buttonTable2" onclick="addPartialScore( '. $idScoreTxt .')">Agregar calificación</button><br/>';
					}
					// Obteniendo calificaciones parciales
					$getPartialScoreList = "SELECT idPartialScore, partialScore, idCreator, idModificator, idScore FROM partialscore WHERE idScore = '$idScoreTxt'";

					$resultPartialScore = $conexion->query($getPartialScoreList);
					$count = $resultPartialScore->num_rows;
					$scoreTable .= '
							<hr/>
							<table class="table">
								<tr>
									<th>No</th>';
					$i=1;
					$j=0;
					while ($j < $count) {
						/*$scorePartialTxt = $rowPartialScore['partialScore'];*/
							$scoreTable .= '<th>'. $i .'</th>';
						$i++;
						$j++;
					}
					
					$scoreTable .= '
								</tr>
								<tr>
									<td>Calificación</td>';
					while ($rowPartialScore = $resultPartialScore->fetch_array(MYSQLI_ASSOC)) {
						$scorePartialTxt = $rowPartialScore['partialScore'];
							$scoreTable .= '<td>'. $scorePartialTxt .'</td>';
					}
					$resultPartialScore->free();
					$scoreTable .= '
								</tr>
							</table>

							</td>
						</tr>';
	}
	$scoreTable .= '</table>
				</div>
			</div>';

	$resultScore->free();
	$resultAverage->free();
	$conexion->close();

	$scoreTable .= '
		<form id="newScoreForm" method="POST">
			<div class="display-4"><h3>&emsp;Nueva Evaluación</h3></div>
			<div class="form-group">
				<label for="scoreTitle">&emsp;Título</label>
				<input type="text" class="form-control" id="scoreTitle" name="scoreTitle" placeholder="i.e. P1" required="true">
				<small id="msgHelp" class="form-text text-muted">&emsp;Puede agregar una nueva evaluación sin numero limite</small>
			</div>
			<div class="contentCenter">
				<button type="button" class="btn btn-primary" onclick="addScore( '. $idSchoolSubject .', '. $idStudent .' )">Guardar</button>
			</div>
		</form>
	';

	//Mostrando resutaldos
	echo $scoreTable;
}
?>