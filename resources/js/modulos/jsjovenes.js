/**********************************************
CONFIGURACIONES DE DATETIMEPICKER
**********************************************/
$(function() {
  $('#iptFechaNacimiento').datetimepicker({
    locale: 'es',
    format: 'L'
  });

  $('#iptFechaInicioEstudio').datetimepicker({
   // locale: 'es',
    viewMode: 'years',
    format: 'MM/YYYY'
  });

  $('#iptFechaFinEstudio').datetimepicker({
    locale: 'es',
    viewMode: 'years',
    format: 'YYYY'
  });

  $('#iptHoraInicioEstudio').datetimepicker({
    locale: 'es',
    format: 'LT'
  });

  $('#iptHoraFinEstudio').datetimepicker({
    locale: 'es',
    format: 'LT'
  });

  $('#iptFechaInicioTrabajo').datetimepicker({
  	locale: 'es',
  	format: 'L'
  });

  $('#iptHoraInicioTrabajo').datetimepicker({
    locale: 'es',
    format: 'LT'
  });  

  $('#iptHoraFinTrabajo').datetimepicker({
    locale: 'es',
    format: 'LT'
  });  

  $('#iptHoraInicioTrabajoSabado').datetimepicker({
    locale: 'es',
    format: 'LT'
  });  

  $('#iptHoraFinTrabajoSabado').datetimepicker({
    locale: 'es',
    format: 'LT'
  });  
});

/**************************************************
* ACCESO DE DATOS A BASE DE DATOS
***************************************************/
//DATOS DE ESTUDIOS
$( document ).ready(function() { 	
  $("form#formEstudios").submit(function(e){
      //Carga el gif mientras se completa la solicitud
      loadingJovenes(1,'estudio');
      e.preventDefault(e);
      var url = base_url + "index.php/Jovenes/mtnDatosPersonales_Estudio";   
      $.ajax({
        url: url,
        data: $('form#formEstudios').serialize(),
        type: "POST",
        dataType: "json",
        success: function (data) {
         // console.log(data)
          $("tbody#tbody-estudio").html(data);
          limpiarDatos(1);
        },
        error: function() {
          console.log("error")
        }
      });
  });
/*
	 	$('#divNombreCarrera').hide();

	 	$('select#iptIdNivelEstudio').change(function(){
	 		if(this.value == 1 ){
	 			$('#divSecundaria').show();
	 			$('#divNombreCarrera').hide()
	 		}else{
	 			$('#divSecundaria').hide();
	 			$('#divNombreCarrera').show()
	 		}
	 	});
    */
	}
);

function buscarDatoxId(tipoBusqueda, idDato, idDatoPersonal)
{
  var url = base_url + "index.php/Jovenes/";
  if(tipoBusqueda == 1)
  {
    url = url + "buscarDatoEstudioPersonal?idDatoEstudio="+idDato+"&idDatoPersonal="+idDatoPersonal;
  }else{
     url = url + "buscarDatoTrabajoPersonal?idDatoTrabajo="+idDato+"&idDatoPersonal="+idDatoPersonal;
  }
  
  $.ajax({
            url: url,
            data: "",
            type: "GET",
            dataType: "json",
            success: function (data) {
              cargaDataInput(data);
              // $('#iptsysAdmin').prop('checked', true);
            },
            error: function () {
                console.log("Failed! Please try again.");
            }
        }); 
}
/**********************************************************
* FUNCIONES COMPLEMENTARIAS
***********************************************************/

function loadingJovenes(tipo, table){
  //tipo1: Muestra Gif Loading / tipo2: Esconce Gif Loading
  //table1: Datos Escolares / table2: Datos Laborales
  switch(tipo)
  {
    case 1:
      $("#tbody-"+table).html("<tr><td class='text-center' colspan='5'><img src='"+base_url+"resources/images/loading/blueload.gif' width='50' height='50'/> <br>Cargando... Por favor, espere unos segundos</td></tr>");
      break;
    case 2:
      $("#tbody-"+table).html("");
      break
    default:
      $("#tbody-"+table).html("");
  }
}
function limpiarDatos(tipoData)
{
  $("#iptIdEscolaridad").val("0");
  $("#iptIdNivelEstudio").val(1);
  $("#iptJornadaEstudio").val(1);
  $("#iptNivelSecundario").val(1);
  $("#iptNombreInstitucionEstudio").val("");
  $("#iptNombreCarreraEstudio").val("");
  $("#iptFechaInicioEstudioInput").val("");
  $("#iptFechaFinEstudioInput").val("");
  $("#iptHoraInicioEstudioInput").val("");
  $("#iptHoraFinEstudioInput").val("");
}

function cargaDataInput(data)
{
  $.each(data, function(i, val){
    $('#iptIdEscolaridad').val(data.id_datopersonal);
    $("#iptNombreInstitucionEstudio").val(data.nombre_centroestudios);
    $("#iptNombreCarreraEstudio").val(data.nombrecarrera);
    $("#iptFechaInicioEstudioInput").val(data.fechainicio);
    $("#iptFechaFinEstudioInput").val(data.fechafin);
    $("#iptHoraInicioEstudioInput").val(data.horainicio);
    $("#iptHoraFinEstudioInput").val(data.horafin);
    $("#iptIdNivelEstudio").val(data.id_nivel_escolaridad);
    $("#iptJornadaEstudio").val(data.id_jornada);
  });
}

