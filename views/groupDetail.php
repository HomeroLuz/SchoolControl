<!--
	@Autor: Homero Luz
-->
<?php
	include('../controller/usersession.php');
	include('../config/config.php');

	$groupKeySelected = $_GET['opc'];
	$men = 0;
	$women = 0;

	$groupInformation = "SELECT idGroup, name, adviser, quota, inscribed, low, groupKey, registrationDate FROM schoolgroup WHERE groupKey = '$groupKeySelected'";
	$getStudentList = "SELECT student.idStudent, student.name, student.paternalSurname, student.maternalSurname, student.studentKey, student.gender, schoolgroup.idGroup FROM student INNER JOIN schoolgroup ON student.idGroup = schoolgroup.idGroup WHERE schoolgroup.groupKey = '$groupKeySelected' ORDER BY paternalSurname ASC";

	$resultGruop = $conexion->query($groupInformation);
	$result = $conexion->query($getStudentList);
	$rowGroup = $resultGruop->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>	
	<title>Detalle de grupo</title>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="../css/bootstrap.css"> 
    <link rel="stylesheet" href="../css/main.css">
</head>
<body class=" ">
	<?php
		include('menu.php');
	?>
	<div class="jumbotron">
		<h1 class="display-4">Grupo: <?php echo $rowGroup['name']?></h1>
		<table class="table" border="0">
			<tr>
				<td><label>Asesor:</label> <?php echo $rowGroup['adviser'] ?></td>
				<td><label>Cupo:</label> <?php echo $rowGroup['quota'] ?></td>
			</tr>
			<tr>
				<td><label>Incritos:</label> <?php echo $rowGroup['inscribed'] ?></td>
				<td><label>Bajas:</label> <?php echo $rowGroup['low'] ?></td>
			</tr>
		</table>
	</div>
	<hr class="my-4">
	<div class="jumbotron-style">
		<table class="table">
			<tr>
	            <th>No</th>
	            <th>Apellido paterno</th>
	            <th>Apellido Materno</th>
	            <th>Nombre(s)</th>
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
	                        <td><?php echo $row['paternalSurname']?></td>
	                        <td><?php echo $row['maternalSurname']?></td>
	                        <td><?php echo $row['name']?></td>
	                        <td>
	                            <a href=" <?php echo "studentDetail.php?opc=". $row['studentKey'] ?> " class="link_detail">Ver perfil</a>
	                        </td>
	                    </tr>
	                <?php
		                $i++;
		                if ($row['gender'] == 1) {
		                	$men++;
		                } else if ($row['gender'] == 2) {
		                	$women++;
		                }
		            }
	            }
	            $resultGruop->free();
				$result->free();
				$conexion->close();
	        ?>
	    </table>
	    <label>&ensp;Total Hombres:</label> <?php echo $men . "<br/>";?> 
	    <label>&ensp;Total Mujeres:</label> <?php echo $women ?>
	    <p class="lead contentCenter">
			<a class="btn btn-primary btn-lg" href="showGroups.php" role="button">Atras</a>
		</p>
	</div>
</body>
<?php
    include('footer.php');
?>
</html>
