var log = false;
function showlpw(){
	if(log){
		document.getElementById("lpassword").setAttribute("type", "password");
		document.getElementById("log").className = "fa fa-eye";
		log = false;

	} else{
		document.getElementById("lpassword").setAttribute("type", "text");
		document.getElementById("log").className = "fa fa-eye-slash";
		log = true;
	}
}

var reg = false;
function showrpw(){
	if(reg){
		document.getElementById("rpassword").setAttribute("type", "password");
		document.getElementById("r1").className = "fa fa-eye";
		reg = false;

	} else{
		document.getElementById("rpassword").setAttribute("type", "text");
		document.getElementById("r1").className = "fa fa-eye-slash";
		reg = true;
	}
}

var reg2 = false;
function showr2pw(){
	if(reg2){
		document.getElementById("r2password").setAttribute("type", "password");
		document.getElementById("r2").className = "fa fa-eye";
		reg2 = false;

	} else{
		document.getElementById("r2password").setAttribute("type", "text");
		document.getElementById("r2").className = "fa fa-eye-slash";
		reg2 = true;
	}
}