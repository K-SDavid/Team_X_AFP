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

var npw = false;
function shownpw(){
	if(npw){
		document.getElementById("npassword").setAttribute("type", "password");
		document.getElementById("npw").className = "fa fa-eye";
		npw = false;

	} else{
		document.getElementById("npassword").setAttribute("type", "text");
		document.getElementById("npw").className = "fa fa-eye-slash";
		npw = true;
	}
}

var npw2 = false;
function shownpw2(){
	if(npw2){
		document.getElementById("npassword2").setAttribute("type", "password");
		document.getElementById("npw2").className = "fa fa-eye";
		npw2 = false;

	} else{
		document.getElementById("npassword2").setAttribute("type", "text");
		document.getElementById("npw2").className = "fa fa-eye-slash";
		npw2 = true;
	}
}