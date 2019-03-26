<!--
	@Autor: Homero Luz
-->
<?php 
include('../config/config.php');
include('userSession.php');

$studentListTable = "";

// Variables de busqueda
$idGroupSearch = $_POST['idGroupValue'];

if(isset($idGroupSearch)){

	$getStudentList = "SELECT student.idStudent, student.name, student.paternalSurname, student.maternalSurname, student.studentKey, student.gender, schoolgroup.idGroup, schoolgroup.grade FROM student INNER JOIN schoolgroup ON student.idGroup = schoolgroup.idGroup WHERE student.idGroup = '$idGroupSearch' ORDER BY paternalSurname ASC";
	$result = $conexion->query($getStudentList);
	$studentListTable .= '
		<div class="instructionsText">Lista de alumnos del grupo, para continuar elija un alumno a evaluar:</div>
		<table class="table">
			<tr>
	            <th class="cellCenter">No</th>
	            <th>Apellido paterno</th>
	            <th>Apellido Materno</th>
	            <th>Nombre(s)</th>
	            <th>Materias</th>
	        </tr>
	        ';
	            $count = $result->num_rows;
	            if($count > 0){
	            	$i = 1;
	                while ($row = $result->fetch_array()) {
	                	$paternalSurnameTxt = $row['paternalSurname'];
	                	$maternalSurnameTxt = $row['maternalSurname'];
	                	$nameTxt = $row['name'];
	                	$idStudentTxt = $row['idStudent'];
	                	$gradeTxt = $row['grade'];
		                $studentListTable .= '
		                    <tr>
		                        <td class="cellCenter">'. $i .'</td>
		                        <td>'. $paternalSurnameTxt .'</td>
		                        <td>'. $maternalSurnameTxt .'</td>
		                        <td>'. $nameTxt .'</td>
		                        <td>
		                            <button type="button" class="btn btn-primary btn-sm" onclick="getSchoolSubject( '. $idStudentTxt .','. $gradeTxt . ')">Ver</button>
		                        </td>
		                    </tr>
		                ';
	                	$i++;
		            }
	            }
				$result->free();
				$conexion->close();
	    $studentListTable .= '</table>';
	// Mostrando resultados
	echo $studentListTable;
}
?>