function getXMLHttpRequest(){
	var Versiones = [ "MSXML2.XMLHttp.5.0", "MSXML2.XMLHttp.4.0","MSXML2.XMLHttp.3.0", "MSXML2.XMLHttp","Microsoft.XMLHttp"];
	if (window.XMLHttpRequest){
		return new XMLHttpRequest();
	}else if(window.ActiveXObject){
		for(var i = 0; i < Versiones.length; i++){
			try{
				var oXmlHttp = new ActiveXObject(Versiones[i]);
				return oXmlHttp;
			}
			catch(error){
			}
		}
	}
}

function Ejecutar(Pagina, Elemento){
	document.getElementById(Elemento).innerHTML = "<img src='neon/assets/images/loader-1.gif' alt='Cargando...' />";
	var Pagina_Solicitada = getXMLHttpRequest();
	Pagina_Solicitada.onreadystatechange = function (){
		if (Pagina_Solicitada.readyState == 4 && (Pagina_Solicitada.status == 200 || window.location.href.indexOf ("http") == - 1))
		document.getElementById(Elemento).innerHTML = Pagina_Solicitada.responseText;
	}
	Pagina_Solicitada.open ('GET', Pagina, true);
	Pagina_Solicitada.send (null);
}