function getStudents() {
	var idGroup = $("#groupSelected").val();

	if (idGroup > 0) {
		console.log("Grupo seleccionado");
		$.post("../controller/c_scoreRegisterDataStudent.php", {idGroupValue: idGroup}, function(studentListTable) {
			$("#resultStudents").html(studentListTable);
			$("#resultSchoolSubject").html('');
			$("#resultScore").html('');
			$("#resultShowScore").html('');
		});
	} else {
		("#resultStudents").html('No se ha seleccionado nada');
	}
};

function getSchoolSubject(idStudent, grade){

	if (idStudent > 0) {
		$.post("../controller/c_scoreRegisterDataSubject.php", {idStudentValue: idStudent, gradeValue: grade}, function(schoolSubjectTable) {
			$("#resultSchoolSubject").html(schoolSubjectTable);
		});
	} else {
			$("#resultSchoolSubject").html('No se ha seleccionado nada');
	}
};

function getScore(idSchoolSubject, idStudent){

	if (idSchoolSubject > 0) {
		$.post("../controller/c_scoreRegisterDataScore.php", {idSchoolSubjectValue: idSchoolSubject, idStudentValue: idStudent}, function(scoreTable) {
			$("#resultScore").html(scoreTable);
			$("#resultShowScore").html('');
		});
	} else {
		$("#resultScore").html('No se ha seleccionado nada');
	}
};

function addScore(idSchoolSubject, idStudent){
	var scoreTitle = $("#scoreTitle").val();

	if (scoreTitle != 0) {
		console.log('Si hay titulo');
		console.log(idSchoolSubject);
		console.log(idStudent);
		$.post("../controller/c_scoreRegister.php", {scoreTitleValue: scoreTitle, idSchoolSubjectValue: idSchoolSubject, idStudentValue: idStudent}, function(scoreList) {
			$("#resultShowScore").html(scoreList);
		});
	} else {
		$("#resultShowScore").html('<label class="messageError scoreTabMargin">Error: Debe ingresar un título para la evaluación</label>');
	}
}

function addPartialScore(idScore){
	var partialScore = $("#partialScore" + idScore).val();

	if (partialScore != "") {
		console.log('si hay registro');
		$.post("../controller/c_partialScoreRegister.php", {partialScoreValue: partialScore, idScoreValue: idScore}, function(scoreList){
			$("#resultShowScore").html(scoreList);
		});
	} else {
		$("#resultShowScore").html('<label class="messageError scoreTabMargin">Error: Debe ingresar una calificación</label>');
	}
}