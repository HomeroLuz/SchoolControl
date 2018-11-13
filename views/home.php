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
	<label class="formTitle">Alta de alumno</label><br/>
    <p>Para iniciar con una nueva solicitud seleccione la opcion correspondiente:</p>
    <input type="button" id="secondaryButton" class="rounded" name="secondaryButton" value="Ejemplar sin registro">
	<a href=../controller/logout.php>Cerrar Sesion X </a>

	<script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
    <script src="../js/vendor/bootstrap.js"></script>
    <script src="../js/main.js"></script>
    <?php
        include('footer.php');
    ?>
</body>
</html>