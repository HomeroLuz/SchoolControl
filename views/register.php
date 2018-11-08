<!--

-->
<!DOCTYPE html>
<html>
	<head>	
		<title>Registro</title>
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
	    <link rel="stylesheet" href="../css/bootstrap.css"> 
	    <link rel="stylesheet" href="../css/main.css">
	</head>
	<body>	
			<form action="../controller/c_register.php" method="POST">
				<!-- DATOS PERSONALES -->
				<hr/>
				<div class="form-group">
					<label for="firstName">Nombre</label>
					<input type="text" class="form-control" id="firstName" name="firstName" placeholder="1234 Main St" required="true">
				</div>
				<div class="form-group">
					<label for="paternalSurname">Apellido Paterno</label>
					<input type="text" class="form-control" id="paternalSurname" name="paternalSurname" placeholder="1234 Main St" required="true">
				</div>
				<div class="form-group">
					<label for="maternalSurname">Apellido Materno</label>
					<input type="text" class="form-control" id="maternalSurname" name="maternalSurname" placeholder="1234 Main St">
				</div>
				<div class="form-group">
					<label for="date">Fecha de nacimiento</label>
					<input type="date" class="form-control" id="birthDate" name="birthDate" required="true">
				</div>
				<!-- DATOS ACADEMICOS -->
				<hr/>
				<div class="divider"/>
				<div class="form-group">
					<label for="career">Programa de licenciatura</label>
					<input type="text" class="form-control" id="career" name="career" placeholder="1234 Main St" required="true">
				</div>
				<div class="form-group">
					<label for="career">Matricula</label>
					<input type="text" class="form-control" id="enrollment" name="enrollment" placeholder="1234 Main St" required="true">
				</div>
				<div class="form-group">
					<label for="yearOfIncome">Año de ingreso</label>
					<input type="text" class="form-control" id="yearOfIncome" name="yearOfIncome" placeholder="1234 Main St" required="true">
				</div>
				<div class="form-group">
					<label for="yearOfGraduation">Año de egreso</label>
					<input type="text" class="form-control" id="yearOfGraduation" name="yearOfGraduation" placeholder="1234 Main St" required="true">
				</div>
				<div class="form-check">
					<input type="checkbox"  class="form-check-input" id="isProfessional" name="isProfessional">
					<label class="form-check-label" for="isProfessional">Con Título Profesional</label>
				</div>
				<!-- DATOS DE USUARIO -->
				<hr/>

				<div class="divider"/>
				<div class="form-group">
					<label for="emailAddress">Correo electrónico</label>
					<input type="email" class="form-control" id="emailAddress" name="emailAddress" aria-describedby="emailHelp" placeholder="Enter email" required="true">
					<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
				</div>
				<div class="form-group">
					<label for="inputPassword">Contraseña</label>
					<input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password" required="true">
				</div>
				<div class="form-group">
					<label for="inputPassword">Confirmar Contraseña</label>
					<input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required="true">
				</div>
				<hr/>
				<button type="submit" class="btn btn-primary">Registrarse</button>
			</form>
	</body>
</html>


