function validar() {

	var valor = document.getElementById("numero").value;
	
// != sinha de diferença
	if(valor.length != 16) {
		return false;	
	}
	else{
		return true;
	}
}
