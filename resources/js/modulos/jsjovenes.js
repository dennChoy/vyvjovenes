/**********************************************
CONFIGURACIONES DE DATETIMEPICKER
**********************************************/
$(function() {
  $('#iptFechaNacimiento').datetimepicker({
    locale: 'es',
    format: 'L'
    /*icons: {
                time: "fas fa-clock",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            }*/
  });

  $('#iptFechaInicioEstudio').datetimepicker({
    locale: 'es',
    viewMode: 'years',
    format: 'L'
  });

  $('#iptFechaFinEstudio').datetimepicker({
    locale: 'es',
    viewMode: 'years',
    format: 'L'
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

  $('#iptFechaFinTrabajo').datetimepicker({
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
$( document ).ready(function() 
  {//DATOS DE ESTUDIOS
    
    $("form#formEstudios").submit(function(e){
        //Carga el gif mientras se completa la solicitud
        loadingMtnJovenes(1,'estudio');
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
    
    
    //DATOS DE TRABAJO
    $("form#formTrabajo").submit(function(e){
        //Carga el gif mientras se completa la solicitud
        loadingMtnJovenes(1,'trabajo');
        e.preventDefault(e);
        var url = base_url + "index.php/Jovenes/mtnDatosPersonales_Trabajo";   
        $.ajax({
          url: url,
          data: $('form#formTrabajo').serialize(),
          type: "POST",
          dataType: "json",
          success: function (data) {
            //console.log('dato '+data);
            $("tbody#tbody-trabajo").html(data);
            limpiarDatos(2);
          },
          error: function() {
            console.log("error")
          }
        });
    });   
    
    //CONFIGURACION EN JAVASCRIPT DEL FORMULARIO

      //Desactiva el input de nombre de carrera para que se habilitado solo para las diversificdo en adelante
      $('#iptNombreCarreraEstudio').prop("disabled", true);

      //Validaciones para activar el input de nombre de carrera
      $('select#iptTipoNivelEstudio').change(function()
      {
        if(this.value == 'B'){
          $('#iptNivelEstudio').attr("disabled", false);
          $('#iptNombreCarreraEstudio').prop("disabled", true);

        }else if(this.value == 'D'){
          $('#iptNombreCarreraEstudio').prop("disabled", false);
          $('#iptNivelEstudio').attr("disabled", false);
        }else{
          $('#iptNombreCarreraEstudio').prop("disabled", false);
          $('#iptNivelEstudio').attr("disabled", true);
        }
      });

      //Validaciones para colocar el nivel de básico cuando seleccionen la opción de básicos
      $('select#iptNivelEstudio').change(function(){

        if($('select#iptTipoNivelEstudio').val() == 'B')
        {
          switch(this.value){
            case 'B-1':
              $('#iptNombreCarreraEstudio').val('Primero Básico');
              break;

            case 'B-2':
              $('#iptNombreCarreraEstudio').val('Segundo Básico');
              break;

            case 'B-3':
              $('#iptNombreCarreraEstudio').val('Tercero Básico');
              break;

            default:
              $('#iptNombreCarreraEstudio').val('');

          }
        }
      });

      //Validaciones para oculatar o mostrar los inputs de trabajo de sábado
      $("#divRowSabado").hide();
      $('#iptSabado').change(function() {
        if(this.checked) {
          $("#divRowSabado").show();
        }else{
          $("#divRowSabado").hide();
        }
      });
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
              //console.log(data);
              cargaDataInput(tipoBusqueda, data);
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

function loadingMtnJovenes(tipo, table){
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
function limpiarDatos(tipoBusqueda)
{
  if(tipoBusqueda == 1){
    $("#iptIdEscolaridad").val("0");
    $("#iptTipoNivelEstudio").val(1);
    $("#iptJornadaEstudio").val(1);
    $("#iptNivelEstudio").val(1);
    $("#iptNombreInstitucionEstudio").val("");
    $("#iptNombreCarreraEstudio").val("");
    $("#iptFechaInicioEstudioInput").val("");
    $("#iptFechaFinEstudioInput").val("");
    $("#iptHoraInicioEstudioInput").val("");
    $("#iptHoraFinEstudioInput").val("");
    $("#iptActualEstudio").prop("checked", false)
  }else{
     $('#iptIdTrabajo').val("");
      $("#iptNombreTrabajo").val("");
      $("#iptPuestoTrabajo").val("");
      $("#iptFechaInicioTrabajoInput").val("");
      $("#iptFechaFinTrabajoInput").val("");
      $("#iptHoraInicioTrabajoInput").val("");
      $("#iptHoraFinTrabajoInput").val("");
      //$("#iptHoraFinEstudioInput").val(data.horafin);
      $("#iptHoraInicioTrabajoSabadoInput").val("");
      $("#iptHoraFinTrabajoSabadoInput").val("");
      $("#iptActualTrabajo").prop("checked", false)
      $("#iptSabado").prop("checked", false);
      $("#divRowSabado").hide();
  }
}

function cargaDataInput(tipoBusqueda, data)
{
  if(tipoBusqueda == 1)
  {
    //Estudios
    $.each(data, function(i, val){
      $('#iptIdEscolaridad').val(data.id_datop_escolar);
      $("#iptNombreInstitucionEstudio").val(data.nombre_centroestudios);
      $("#iptNombreCarreraEstudio").val(data.nombrecarrera);
      $("#iptFechaInicioEstudioInput").val(data.fechainicio);
      $("#iptFechaFinEstudioInput").val(data.fechafin);
      $("#iptHoraInicioEstudioInput").val(data.horainicio);
      $("#iptHoraFinEstudioInput").val(data.horafin);
      $("#iptTipoNivelEstudio").val(data.tipo_nivel_escolar);
      $("#iptJornadaEstudio").val(data.id_jornada);
      $("#iptNivelEstudio").val(data.id_nivel_escolar);
      if(data.actual == 1){ $("#iptActualEstudio").prop('checked', true);}
      else{ $("#iptActualEstudio").prop('checked', false); }

      
    });
  }else{
    //Trabajo
    $.each(data, function(i, val){
      $('#iptIdTrabajo').val(data.id_datop_trabajo);
      $("#iptNombreTrabajo").val(data.nombre_trabajo);
      $("#iptPuestoTrabajo").val(data.puesto);

      $("#iptFechaInicioTrabajoInput").val(formatDate(data.fechainicio));
      $("#iptFechaFinTrabajoInput").val(data.fechafin);
      $("#iptHoraInicioTrabajoInput").val(data.horainicio);
      $("#iptHoraFinTrabajoInput").val(data.horafin);
      
      //$("#iptHoraFinEstudioInput").val(data.horafin);
      $("#iptHoraInicioTrabajoSabadoInput").val(data.horainicio_sabado);
      $("#iptHoraFinTrabajoSabadoInput").val(data.horafin_sabado);
      
      if(data.actual == 1){ $("#iptActualTrabajo").prop('checked', true);}
      else{ $("#iptActualTrabajo").prop('checked', false); }
      if(data.sabado == 1)
      {
        $("#iptSabado").prop("checked", true);
        $("#divRowSabado").show();
      }else{
        $("#iptSabado").prop("checked", false);
        $("#divRowSabado").hide();
      }
    });
  }
}

function formatDate(dateString) {
  var p = dateString.split(/\D/g)
  return [p[2],p[1],p[0] ].join("/")
}