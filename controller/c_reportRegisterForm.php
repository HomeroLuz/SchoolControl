<!--
	@Autor: Homero Luz
-->
<?php 
include('../config/config.php');
include('userSession.php');

$reportForm = "";
$idStudent = $_POST['idStudentValue'];

if (isset($idStudent)) {

	$reportForm .= '
		<form id="newReportForm" method="POST">
			<div class="display-4"><h3>&emsp;Nuevo Reporte</h3></div>
			<div class="form-group">
                <label for="reason">&emsp;Motivo del reporte:</label>
                <textarea class="form-control" rows="5" name="reason" id="reason" required="true"></textarea>
                <small id="observationsHelp" class="form-text text-muted">&emsp;Razón por la cual se extiende este reporte</small>
            </div>

			<div class="form-group">
				<label for="reporter">&emsp;Quien Reporta</label>
				<input type="text" class="form-control" id="reporter" name="reporter" placeholder="i.e. Coordinador Jairo Vargas" required="true">
			</div>

			<div class="form-group">
				<label for="reportDate">&emsp;Fecha del reporte</label>
				<input type="date" class="form-control" id="reportDate" name="reportDate" required="true">
			</div>

			<div class="contentCenter">
				<button type="button" class="btn btn-primary" onclick="addReport( '. $idStudent .' )">Guardar</button>
			</div>
		</form>
	';
	// Mostrando resultados
	echo $reportForm;
}

?>