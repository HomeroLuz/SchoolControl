function getStudents() {
	var idGroup = $("#groupSelected").val();

	if (idGroup > 0) {
		console.log("Grupo seleccionado");
		$.post("../controller/c_reportRegisterDataStudent.php", {idGroupValue: idGroup}, function(studentListTable) {
			$("#resultStudents").html(studentListTable);
			/*$("#resultSchoolSubject").html('');
			$("#resultScore").html('');
			$("#resultShowScore").html('');*/
		});
	} else {
		("#resultStudents").html('No se ha seleccionado nada');
	}
};

function loadReportForm(idStudent){
	if (idStudent > 0) {
		$.post("../controller/c_reportRegisterForm.php", {idStudentValue: idStudent}, function(reportForm) {
			$("#resultForm").html(reportForm);
		});
	} else {
			$("#resultForm").html('No se ha seleccionado nada');
	}

}