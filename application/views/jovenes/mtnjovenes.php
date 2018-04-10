<?php
//print_r($datoPersonal);
?>
<div class="card">
	<div class="card-header">
		<b>Formulario de Ingreso </b>
	</div>
	<div class="card-body">
		<form action="guardarNuevaPersona" method="POST">
			<h4>Datos Generales</h4>
			<br>
			<div class="row">	
				<div class="form-group col-sm-4">
					<label for="iptNombres">Nombres: </label>
					<input type="text" class="form-control" id="iptNombres" name="iptNombres">
				</div>
				<div class="form-group col-sm-4">
					<label for="iptApellidos">Apellidos: </label>
					<input type="text" class="form-control" id="iptApellidos" name="iptApellidos">
				</div>
				<div class="form-group col-sm-4">
	            	<label class="ml-2" for="divSexo">Sexo:</label>
	            	<div class="form-group" id="divSexo">
	            		<div class="radio ml-2">
	            			<label><input type="radio" name="iptSexo" value="M"> Hombre</label>
	            		</div>
	            		<div class="radio ml-2">
	            			<label><input type="radio" name="iptSexo" value="F"> Mujer</label>
	            		</div>
	            	</div>
	            </div>
			</div>
			<div class="row">
				<div class="form-group col-sm-3">
					<label for="iptFechaNacimiento"> Fecha de Nacimiento: </label>
					<div class="input-group date" id="iptFechaNacimiento" data-target-input="nearest">
		            	<input type="text" class="form-control datetimepicker-input" data-target="#iptFechaNacimiento" name="iptFechaNacimiento"/>
		              	<div class="input-group-append" data-target="#iptFechaNacimiento" data-toggle="datetimepicker">
		                	<div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
		              	</div>
		            </div>

				</div>
				<div class="form-group col-sm-7">
					<label for="iptDireccion"> Dirección </label>
					<input type="text" class="form-control" id="iptDireccion" name="iptDireccion">
				</div>
			</div>

			<!-- DATOS DE ESTUDIOS -->
			<h4 class="mt-5">Estudios Actuales</h4>
			<br>
			<div class="row">
				<div class="form-group col-sm-3">
					<label for="iptIdNivelEstudio">Nivel de Escolaridad</label>
					<select class="selectpicker" name="iptIdNivelEstudio" id="iptIdNivelEstudio">
						<option value="1">Básicos</option>
						<option value="2">Diversificado</option>
						<option value="3">Universidad - Licenciatura</option>
						<option value="4">Universidad - Posgrado</option>
						<option value="5">Otras</option>
					</select>
				</div>
				<div class="form-group col-sm-3">
					<label for="iptJornadaEstudio">Jornada</label>
					<select class="selectpicker" name="iptJornadaEstudio" id="iptJornadaEstudio">
						<option value="1">Diario Matutino</option>
						<option value="2">Diario Vespertino</option>
						<option value="3">Diario Nocturno</option>
						<option value="4">Sábados</option>
						<option value="5">Domingos</option>
					</select>
				</div>
				<div class="form-group col-sm-3" id="divSecundaria">
					<label for="iptNivelSecundario">Grado</label>
					<select class="selectpicker" name="iptNivelSecundario" id="iptNivelSecundario">
						<option value="1">Primero Básico</option>
						<option value="2">Segundo Básico</option>
						<option value="3">Tercero Básico</option>
						<option value="4">Cuarto Diversificado</option>
						<option value="5">Quinto Diversificado</option>
						<option value="6">Sexto Diversificado</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-5">
					<label for="iptNombreInstitucionEstudio">Nombre de Centro de Estudios:</label>
					<input type="text" class="form-control" name="iptNombreInstitucionEstudio" id="iptNombreInstitucionEstudio">
				</div>
				<div class="form-group col-sm-5" id="divNombreCarrera">
					<label for="iptNombreCarreraEstudio">Nombre de Carrera:</label>
					<input type="text" class="form-control" name="iptNombreCarreraEstudio" id="iptNombreCarreraEstudio">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-2">
					<label for="iptFechaInicioEstudio">Año de Inicio</label>
					<div class="input-group date" id="iptFechaInicioEstudio" data-target-input="nearest">
		            	<input type="text" class="form-control datetimepicker-input" data-target="#iptFechaInicioEstudio" name="iptFechaInicioEstudio"/>
		              	<div class="input-group-append" data-target="#iptFechaInicioEstudio" data-toggle="datetimepicker">
		                	<div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
		              	</div>
		            </div>
				</div>
				<div class="form-group col-sm-2">
					<label for="iptFechaFinEstudio">Año de Finalización</label>
					<div class="input-group date" id="iptFechaFinEstudio" data-target-input="nearest">
						<input type="text" class="form-control datetimepicker-input" date-target="#iptFechaFinEstudio" name="iptFechaFinEstudio">
						<div class="input-group-append" data-target="#iptFechaFinEstudio" data-toggle="datetimepicker">
							<div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
						</div>
					</div>
				</div>
				<div class="form-group col-sm-2">
					<label for="iptHoraInicioEstudio">Hora de Inicio</label>
					<div class="input-group date" id="iptHoraInicioEstudio" data-target-input="nearest">
						<input type="text" class="form-control datetimepicker-input" date-target="#iptHoraInicioEstudio" name="iptHoraInicioEstudio">
						<div class="input-group-append" data-target="#iptHoraInicioEstudio" data-toggle="datetimepicker">
							<div class="input-group-text"><i class="far fa-clock"></i></div>
						</div>
					</div>
				</div>
				<div class="form-group col-sm-2">
					<label for="iptHoraFinEstudio">Hora de Salida</label>
					<div class="input-group date" id="iptHoraFinEstudio" data-target-input="nearest">
						<input type="text" class="form-control datetimepicker-input" date-target="#iptHoraFinEstudio" name="iptHoraFinEstudio">
						<div class="input-group-append" data-target="#iptHoraFinEstudio" data-toggle="datetimepicker">
							<div class="input-group-text"><i class="far fa-clock"></i></div>
						</div>
					</div>
				</div>

				<?php if($this->uri->segment(3) > 0 ) { ?>
				<div class="p-3 col-sm-12">
					<table class="table table-sm">
						<thead class="thead-light">
							<tr>
								<th colspan="4" class="text-center"> Historial de Estudios </th>
							</tr>
							<tr>
								<th>Nivel</th>
								<th>Grado / Carrera</th>
								<th>Centro de Estudios</th>
								<th>Tiempo de Estudios</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Universidad</td>
								<td>Pregrado</td>
								<td>Universidad Mariano Gálvez</td>
								<td>2018 - 2019</td>
							</tr>
							
						</tbody>
					</table>
				</div>
				<?php } ?>
			</div>
			<!-- FIN DATOS DE ESTUDIOS -->
			<!-- INICIO DATOS LABORALES -->
			<h4 class="mt-5">Datos Laborales </h4>
			<div class="row">
				<div class="form-group col-sm-5">
					<label for="iptNombreTrabajo"> Nombre de Empresa o Negocio </label>
					<input type="text" class="form-control" name="iptNombreTrabajo" id="iptNombreTrabajo">
				</div>
				<div class="form-group col-sm-5">
					<label for="iptPuestoTrabajo"> Puesto que ocupa </label>
					<input type="text" class="form-control" name="iptPuestoTrabajo" id="iptPuestoTrabajo">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-3">
					<label for="iptFechaInicioTrabajo">Fecha de Inicio</label>
					<div class="input-group date" id="iptFechaInicioTrabajo" data-target-input="nearest">
						<input type="text" class="form-control datetimepicker-input" date-target="#iptFechaInicioTrabajo" name="iptFechaInicioTrabajo">
						<div class="input-group-append" data-target="#iptFechaInicioTrabajo" data-toggle="datetimepicker">
							<div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
						</div>
					</div>
				</div>
				<div class="form-group col-sm-2">
					<label for="iptHoraInicioTrabajo">Hora de Inicio</label>
					<div class="input-group date" id="iptHoraInicioTrabajo" data-target-input="nearest">
						<input type="text" class="form-control datetimepicker-input" date-target="#iptHoraInicioTrabajo" name="iptHoraInicioTrabajo">
						<div class="input-group-append" data-target="#iptHoraInicioTrabajo" data-toggle="datetimepicker">
							<div class="input-group-text"><i class="far fa-clock"></i></div>
						</div>
					</div>
				</div>
				<div class="form-group col-sm-2">
					<label for="iptHoraFinTrabajo">Hora de Salida</label>
					<div class="input-group date" id="iptHoraFinTrabajo" data-target-input="nearest">
						<input type="text" class="form-control datetimepicker-input" date-target="#iptHoraFinTrabajo" name="iptHoraFinTrabajo">
						<div class="input-group-append" data-target="#iptHoraFinTrabajo" data-toggle="datetimepicker">
							<div class="input-group-text"><i class="far fa-clock"></i></div>
						</div>
					</div>
				</div>
			</div>
			<div class="p-3">
				<h5>¿Trabaja Sábados?</h5>
				<div class="row">
					<div class="form-group col-sm-2">
						<label for="iptHoraInicioTrabajoSabado">Hora de Inicio</label>
						<div class="input-group date" id="iptHoraInicioTrabajoSabado" data-target-input="nearest">
							<input type="text" class="form-control datetimepicker-input" date-target="#iptHoraInicioTrabajoSabado" name="iptHoraInicioTrabajoSabado">
							<div class="input-group-append" data-target="#iptHoraInicioTrabajoSabado" data-toggle="datetimepicker">
								<div class="input-group-text"><i class="far fa-clock"></i></div>
							</div>
						</div>
					</div>
					<div class="form-group col-sm-2">
						<label for="iptHoraFinTrabajoSabado">Hora de Salida</label>
						<div class="input-group date" id="iptHoraFinTrabajoSabado" data-target-input="nearest">
							<input type="text" class="form-control datetimepicker-input" date-target="#iptHoraFinTrabajoSabado" name="iptHoraFinTrabajoSabado">
							<div class="input-group-append" data-target="#iptHoraFinTrabajoSabado" data-toggle="datetimepicker">
								<div class="input-group-text"><i class="far fa-clock"></i></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--FIN INICIO DATOS LABORALES -->
			<div class="text-center">
				<button type="submit" class="btn btn-primary btn-lg ml-2"> <i class="fas fa-save"></i> Guardar Datos</button>
			</div>
		</form>
	</div><!-- CARD BODY -->
</div><!-- CARD -->


<script>
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
    format: 'YYYY'
  });

  $('#iptFechaFinEstudio').datetimepicker({
    locale: 'es',
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
$( document ).ready(function() {
		/*
		$('#iptFechaNacimiento').datepicker({
    		language: "es"
		});
	 	$('#iptFechaInicioTrabajo').datepicker({
    		language: "es"
	 	});

	 	$('#iptFechaInicioEstudio').datepicker({
	 		minViewMode: 2,
    		language: "es"
	 	});

	 	$('#iptFechaFinEstudio').datepicker({
	 		minViewMode: 2,
    		language: "es"
	 	});
	 	*/

	 	
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
	}
);
</script> 