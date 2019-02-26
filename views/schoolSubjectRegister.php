<!--
	@Autor: Homero Luz
-->
<?php
	include('../controller/usersession.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>	
	<title>Nueva materia</title>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="../css/bootstrap.css"> 
    <link rel="stylesheet" href="../css/main.css">
</head>
<body class=" ">
	<?php
		include('menu.php');
	?>
	<form id="schoolSubjectRegisterForm" action="../controller/c_schoolSubjectRegister.php" method="POST">
		<label><h3>&ensp;DAR DE ALTA NUEVA MATERIA</h3></label><br/>
		<div class="form-group">
			<label for="name">&emsp;Nombre</label>
			<input type="text" class="form-control" id="name" name="name" placeholder="i.e. Español" required="true">
		</div>
		<div class="form-group">
			<label for="numberHours">&emsp;Horas por semana</label>
			<input type="text" class="form-control" id="numberHours" name="numberHours" placeholder="i.e. 6" required="true">
		</div>
		<div class="form-group">
			<label for="credits">&emsp;Créditos</label>
			<input type="text" class="form-control" id="credits" name="credits" placeholder="i.e. 8" required="true">
		</div>
		<div class="contentCenter">
			<button type="submit" class="btn btn-primary">Registrar</button>
		</div>
		<hr/>
	</form>
</body>
<?php
    include('footer.php');
?>
</html>