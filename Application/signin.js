function studentshow() {
    var x = document.getElementById("student_sign_up");
	var y = document.getElementById("teacher_sign_up");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
		y.style.display = "none";
    }
}
function teachershow() {
    var z = document.getElementById("student_sign_up");
	var d = document.getElementById("teacher_sign_up");

    if (z.style.display === "block") {
        d.style.display = "none";
    } else {
        z.style.display = "block";
		d.style.display = "none";
    }
}