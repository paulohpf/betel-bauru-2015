function mostraCampo(id) {
    document.getElementById(id).style.display = 'block';
}

function escondeCampo(id) {
    document.getElementById(id).style.display = 'none';
}

function valor(id, valor){
	if(valor==null){
		retorno = document.getElementById(id).value;
		 return retorno;
	}else{
		document.getElementById(id).value = valor;
		return valor;
	}
}

function valor_div(id, valor){
	if(valor==null){
		retorno = document.getElementById(id).innerHTML;
		 return retorno;
	}else{
		document.getElementById(id).innerHTML = valor;
		return valor;
	}	
}

function focus(id){
	document.getElementById(id).scrollIntoView();
	document.getElementById(id).focus();
}


function mudarClass(id, valor){
	if(valor==null){
		retorno = document.getElementById(id).className;
		 return retorno;
	}else{
		document.getElementById(id).className = valor;
		return valor;
	}		
}

function alerta(texto){
	alert(texto);
}