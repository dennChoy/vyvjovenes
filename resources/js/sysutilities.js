var base_url = 'http://localhost/ciprojects/vyv/vyvjovenes/';

function loading(tipo){
	//tipo1: Muestra Gif Loading
	//tipo2: Esconce Gif Loading
	switch(tipo)
	{
		case 1:
			$("#divLoadGif").html("<img src='"+base_url+"resources/images/loading/blueload.gif' width='50' height='50'/> <br>Cargando... Por favor, espere unos segundos");
			break;
		case 2:
			$("#divLoadGif").html("");
			break
		default:
			$("#divLoadGif").html("");
	}
}