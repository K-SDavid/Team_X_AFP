var state = false;
function showlpw(){
	if(state){
		document.getElementById("lpassword").setAttribute("type", "password");
		state = false;

	} else{
		document.getElementById("lpassword").setAttribute("type", "text");
		state = true;
	}
}