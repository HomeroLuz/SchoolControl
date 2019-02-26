<!--
	@Autor: Homero Luz
-->
<?php
	include('../controller/usersession.php');
	include('../config/config.php');

	$curricularMapList = "SELECT schoolsubject.name, schoolsubject.numberHours, curricularmap.idCurricularMap, curricularmap.grade FROM schoolsubject INNER JOIN curricularmap ON schoolsubject.idSchoolSubject = curricularmap.idSchoolSubject ORDER BY grade ASC";
	$result = $conexion->query($curricularMapList);
	$isPrintTitle1 = 0;
	$isPrintTitle2 = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>	
	<title>Plan de estudios</title>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="../css/bootstrap.css"> 
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
	<?php
		include('menu.php');
	?>
	<h1 class="display-4">PLAN DE ESTUDIOS POR AÑO</h1>
	<table class="table">
		<tr>
			<td class="display-4">Primer año</td>
		</tr>
		<tr>
			<th>Materia</th>
			<th>Horas por semana</th>
			<th>Grado</th>
		</tr>
		<?php
			$count = $result->num_rows;
			if($count > 0){
				while ($row = $result->fetch_array()) {
					switch ($row['grade']) {
						case 1:
							?>
							<tr>
								<td><?php echo $row['name']?></td>
								<td><?php echo $row['numberHours']?></td>
								<td><?php echo $row['grade']?></td>
							</tr>
							<?php
							break;
						case 2:
							if ($isPrintTitle1 == 0) {
							?>
								<tr>
									<td class="display-4">Segundo año</td>
								</tr>

							<?php
							$isPrintTitle1 = 1;
							}
							?>
							<tr>
								<td><?php echo $row['name']?></td>
								<td><?php echo $row['numberHours']?></td>
								<td><?php echo $row['grade']?></td>
							</tr>
							<?php
							break;
						default:
							if ($isPrintTitle2 == 0) {
							?>
								<tr>
									<td class="display-4">Tercer año</td>
								</tr>

							<?php
							$isPrintTitle2 = 1;
							}
							?>
							<tr>
								<td><?php echo $row['name']?></td>
								<td><?php echo $row['numberHours']?></td>
								<td><?php echo $row['grade']?></td>
							</tr>
							<?php
							break;
					}
				}
			}
		?>
	</table>
	<?php
		$result->free();
		$conexion->close();
	?>
</body>
<?php
	include('footer.php');
?>
</html>