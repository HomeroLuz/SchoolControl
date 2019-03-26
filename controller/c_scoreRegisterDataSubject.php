<!--
	@Autor: Homero Luz
-->
<?php 
include('../config/config.php');
include('userSession.php');

$schoolSubjectTable = "";
$idStudentSearch = $_POST['idStudentValue'];
$grade = $_POST['gradeValue'];

if (isset($idStudentSearch)) {
	
	$getSchoolSubjectList = "SELECT schoolsubject.idSchoolSubject, schoolsubject.name, schoolsubject.schoolSubjectKey, schoolsubject.numberHours, schoolsubject.credits, schoolsubject.registrationDate, schoolsubject.idCreator FROM schoolsubject INNER JOIN curricularmap on schoolsubject.idSchoolSubject = curricularmap.idSchoolSubject WHERE curricularmap.grade = '$grade' ";
	$result = $conexion->query($getSchoolSubjectList);

	$schoolSubjectTable .= '
		<div class="instructionsText">Lista de materias de alumno:</div>
		<table class="table">
			<tr>
	            <th class="cellCenter">No</th>
	            <th>Materia</th>
	            <th>Horas por semana</th>
	            <th>Calificar</th>
	        </tr>
	        ';
    		$count = $result->num_rows;
            if($count > 0){
            	$i = 1;
                while ($row = $result->fetch_array()) {
                	$nameTxt = $row['name'];
                	$numberHoursTxt = $row['numberHours'];
                	$idSchoolSubjectTxt = $row['idSchoolSubject'];
	                $schoolSubjectTable .= '
	                    <tr>
	                        <td class="cellCenter">'. $i .'</td>
	                        <td>'. $nameTxt .'</td>
	                        <td>'. $numberHoursTxt .'</td>
	                        <td>
	                            <button type="button" class="btn btn-primary btn-sm" onclick="getScore( '. $idSchoolSubjectTxt .','. $idStudentSearch . ')">Abrir</button>
	                        </td>
	                    </tr>
	                ';
                	$i++;
	            }
            }
			$result->free();
			$conexion->close();
		$schoolSubjectTable .= '</table>';
	//Mostrando resutaldos
	echo $schoolSubjectTable;
}
?>