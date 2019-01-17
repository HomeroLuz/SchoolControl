<!--
	@Autor: Homero Luz
-->
<?php
	include('../controller/usersession.php');
	include('../config/config.php');

	$listGroups = "SELECT idGroup, name, adviser, quota, inscribed, low, groupKey, registrationDate FROM schoolgroup";
	$result = $conexion->query($listGroups);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Grupos</title>   
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="../css/bootstrap.css"> 
    <link rel="stylesheet" href="../css/main.css">
</head>
<body class=" ">
	<?php
		include('menu.php');
	?>
	<label class="formTitle">Lista de grupos</label><br/>
	<table class="table">
		<tr>
			<th>No</th>
			<th>Nombre</th>
			<th>Asesor</th>
			<th>Cupo</th>
			<th>Inscritos</th>
			<th>Bajas</th>
			<th>Clave</th>
			<th>Fecha de Alta</th>
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
						<td><?php echo $row['adviser']?></td>
						<td><?php echo $row['quota']?></td>
						<td><?php echo $row['inscribed']?></td>
						<td><?php echo $row['low']?></td>
						<td><?php echo $row['groupKey']?></td>
						<td><?php echo $row['registrationDate']?></td>
						<td>
							<a href=" <?php echo "groupDetail.php?opc=". $row['groupKey'] ?> " class="link_detail">Ver detalle</a>
						</td>
					</tr>
				<?php
				$i++;	
				}
			}
		?>
	</table>
	<?php
		$result->free();
		$conexion->close();
	?>
	<script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
	<script src="../js/vendor/bootstrap.js"></script>
	<script src="../js/main.js"></script>
	<?php
		include('footer.php');
	?>
</body>
</html>