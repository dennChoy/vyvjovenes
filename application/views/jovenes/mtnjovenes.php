<div class="card">
	<div class="card-header">
		<b>Formulario de Ingreso </b>
	</div>
	<div class="card-body">
		<form action="guardarNuevaPersona" method="POST">
			<h4>Datos Generales</h4>
			<br>
			<div class="row">	
				<div class="form-group col-sm-5">
					<label for="iptNombres">Nombres: </label>
					<input type="text" class="form-control" id="iptNombres" name="iptNombres">
				</div>
				<div class="form-group col-sm-5">
					<label for="iptApellidos">Apellidos: </label>
					<input type="text" class="form-control" id="iptApellidos" name="iptApellidos">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-3">
					<label for="iptFechaNacimiento"> Fecha de Nacimiento: </label>
					<input type="text" class="form-control" id="iptFechaNacimiento" name="iptFechaNacimiento">
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
				<div class="form-group col-sm-3">
					<label for="iptFechaInicioEstudio">Año de Inicio</label>
					<input type="text" class="form-control" name="iptFechaInicioEstudio" id="iptFechaInicioEstudio">
				</div>
				<div class="form-group col-sm-3">
					<label for="iptFechaFinEstudio">Año de Finalización</label>
					<input type="text" class="form-control" name="iptFechaFinEstudio" id="iptFechaFinEstudio">
				</div>
				<div class="form-group col-sm-2">
					<label for="iptHoraInicioEstudio">Hora de Inicio</label>
					<input type="text" class="form-control" id="iptHoraInicioEstudio" name="iptHoraInicioEstudio">
				</div>
				<div class="form-group col-sm-2">
					<label for="iptHoraFinEstudio">Hora de Salida</label>
					<input type="text" class="form-control" id="iptHoraFinEstudio" name="iptHoraFinEstudio">
				</div>
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
					<input type="text" class="form-control" id="iptFechaInicioTrabajo" name="iptFechaInicioTrabajo">
				</div>
				<div class="form-group col-sm-2">
					<label for="iptHoraInicioTrabajo">Hora de Inicio</label>
					<input type="text" class="form-control" id="iptHoraInicioTrabajo" name="iptHoraInicioTrabajo">
				</div>
				<div class="form-group col-sm-2">
					<label for="iptHoraFinTrabajo">Hora de Salida</label>
					<input type="text" class="form-control" id="iptHoraFinTrabajo" name="iptHoraFinTrabajo">
				</div>
			</div>
			<div class="p-3">
				<h5>¿Trabaja Sábados?</h5>
				<div class="row">
					<div class="form-group col-sm-2">
						<label for="iptHoraInicioTrabajoSabado">Hora de Inicio</label>
						<input type="text" class="form-control" id="iptHoraInicioTrabajoSabado" name="iptHoraFinTrabajoSabado">
					</div>
					<div class="form-group col-sm-2">
						<label for="iptHoraFinTrabajoSabado">Hora de Salida</label>
						<input type="text" class="form-control" id="iptHoraFinTrabajoSabado" name="iptHoraInicioTrabajoSabado">
					</div>
				</div>
			</div>
			<!--FIN INICIO DATOS LABORALES -->
			<button type="submit" class="btn btn-primary btn-lg ml-2"> <i class="fas fa-save"></i> Guardar Datos</button>
		</form>
	</div><!-- CARD BODY -->
</div><!-- CARD -->


<script>
$( document ).ready(function() {
		$('#iptFechaNacimiento').datepicker({
    		language: "es"
		});
	 	$('#iptFechaInicioTrabajo').datepicker({
	 		minViewMode: 2,
    		language: "es"
	 	});
	 	$('#divNombreCarrera').hide();

	 	$('select#iptIdNivelEstudio').change(function(){
	 		if(this.value == 1 || this.value == 2){
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