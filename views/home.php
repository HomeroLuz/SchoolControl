<!--
	@Autor: Homero Luz
-->
<?php
    include ('../controller/usersession.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inicio</title>   
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="../css/bootstrap.css"> 
    <link rel="stylesheet" href="../css/main.css">
    <script src="../js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body>
	<?php
    	include('menu.php');
	?>
	<label class="formTitle">Bienvenido</label><br/>
    <p align="justify" class="col-md-8">El sistema de control escolar le ofrece una manera práctica de acceso a la información  ya que cuenta con administración de información de alumnos, personal de la institución y docentes.</p>
    <!-- <input type="button" id="secondaryButton" class="rounded" name="secondaryButton" value="Ejemplar sin registro">
	<a href=../controller/logout.php>Cerrar Sesion X </a> -->

    <?php
        include('footer.php');
    ?>
</body>
</html>