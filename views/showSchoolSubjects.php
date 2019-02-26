<!--
	@Autor: Homero Luz
-->
<?php
	include('../controller/usersession.php');
	include('../config/config.php');

	$schoolSubjectList = "SELECT idSchoolSubject, name, schoolSubjectKey, numberHours, credits, registrationDate, idCreator FROM schoolSubject";
	$result = $conexion->query($schoolSubjectList);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Materias</title>   
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="../css/bootstrap.css"> 
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
	<?php
		include('menu.php');
	?>
	<label class="formTitle">Materias impartidas</label><br/>
	<table class="table">
		<tr>
			<th>No</th>
			<th>Materia</th>
			<th>Horas por semana</th>
			<th>Créditos/valor curricular</th>
			<th>Clave en sistema</th>
			<th>Acciones</th>
		</tr>
		<?php
			$count = $result->num_rows;
			if($count > 0){
				$i = 1;
				while ($row = $result->fetch_array()) {
				?>
					<tr>
						<td><?php echo $i ?></td>
						<td><?php echo $row['name']?></td>
						<td><?php echo $row['numberHours']?></td>
						<td><?php echo $row['credits']?></td>
						<td><?php echo $row['schoolSubjectKey']?></td>
						<td>
							<a href="" class="link_detail">Editar</a>
						</td>
					</tr>
				<?php
				$i++;	
				}
			}
		?>		
	</table>
</body>
<?php
	include('footer.php');
?>
</html>