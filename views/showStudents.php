<!--
	@Autor: Homero Luz
-->
<?php
	include('../controller/usersession.php');
	include('../config/config.php');

	$studentList = "SELECT idStudent, name, paternalSurname, maternalSurname, studentKey FROM student ORDER BY paternalSurname ASC";
	$result = $conexion->query($studentList);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Alumnos</title>   
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="../css/bootstrap.css"> 
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
	<?php
		include('menu.php');
	?>
	<label class="formTitle">Alumnos registrados</label><br/>
	<table class="table">
		<tr>
			<th>No</th>
			<th>Apellido paterno</th>
			<th>Apellido Materno</th>
			<th>Nombre(s)</th>
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
                        <td><?php echo $row['paternalSurname']?></td>
                        <td><?php echo $row['maternalSurname']?></td>
                        <td><?php echo $row['name']?></td>
                        <td><?php echo $row['studentKey']?></td>
                        <td>
                            <a href=" <?php echo "studentDetail.php?opc=". $row['studentKey'] ?> " class="link_detail">Ver perfil</a>
                        </td>
                    </tr>
                <?php
	            }
            }
			$result->free();
			$conexion->close();
        ?>
	</table>
</body>
<?php
    include('footer.php');
?>
</html>