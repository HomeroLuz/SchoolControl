<!--
	@Autor: Homero Luz
-->
<?php
	include('../controller/usersession.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>	
	<title>Nuevo grupo</title>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="../css/bootstrap.css"> 
    <link rel="stylesheet" href="../css/main.css">
</head>
<body class=" ">
	<?php
		include('menu.php');
	?>
	<form id="groupRegisterForm" action="../controller/c_groupRegister.php" method="POST">
		<label><h3>&ensp;DAR DE ALTA NUEVO GRUPO</h3></label><br/>
		<div class="form-group">
			<label for="groupName">&emsp;Nombre</label>
			<input type="text" class="form-control" id="groupName" name="groupName" placeholder="i.e. 1A - Computación" required="true">
		</div>
		<div class="form-group">
			<label for="adviser">&emsp;Asesor</label>
			<input type="text" class="form-control" id="adviser" name="adviser" placeholder="Nombre completo de asesor" required="true">
		</div>
		<div class="form-group">
			<label for="quota">&emsp;Cupo</label>
			<input type="text" class="form-control" id="quota" name="quota" placeholder="i.e. 50" required="true">
		</div>
		<div class="contentCenter">
			<button type="submit" class="btn btn-primary">Registrar</button>
		</div>
	</form>
	<script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
	<script src="../js/vendor/bootstrap.js"></script>
	<script src="../js/main.js"></script>
	<?php
        include('footer.php');
    ?>
</body>
</html>