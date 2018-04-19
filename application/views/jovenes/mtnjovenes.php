<?php
//print_r($datoPersonal);
?>
<script src="<?=base_url('resources/js/modulos/jsjovenes.js')?>"> </script>

<div class="card">
	<div class="card-header">
		<b>Formulario de Ingreso </b>
	</div>
	<div class="card-body">
		<form class="row" action="guardarNuevaPersona" method="POST">
			<div class="row col-sm-12">
				<h4 >Datos Generales</h4>
			</div>
			<br>
			<div class="row col-sm-9">
				<div class="col-sm-12 row" >
					<div class="row col-sm-12"  >	
						<div class="form-group col-sm-5">
							<label for="iptNombres">Nombres: </label>
							<input type="text" class="form-control" id="iptNombres" name="iptNombres" >
						</div>
						<div class="form-group col-sm-5">
							<label for="iptApellidos">Apellidos: </label>
							<input type="text" class="form-control" id="iptApellidos" name="iptApellidos">
						</div>
						<div class="form-group col-sm-2">
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
					<div class="row col-sm-12" >
						<div class="form-group col-sm-4">
							<label for="iptFechaNacimiento"> Fecha de Nacimiento: </label>
							<div class="input-group date" id="iptFechaNacimiento" data-target-input="nearest">
				            	<input type="text" class="form-control datetimepicker-input" data-target="#iptFechaNacimiento" name="iptFechaNacimiento" />
				              	<div class="input-group-append" data-target="#iptFechaNacimiento" data-toggle="datetimepicker">
				                	<div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				              	</div>
				            </div>
						</div>
						<div class="form-group col-sm-8">
							<label for="iptDireccion"> Dirección </label>
							<input type="text" class="form-control" id="iptDireccion" name="iptDireccion" ">
						</div>
					</div>
				</div>
			</div>

			<!-- DATOS DE ESTUDIOS -->
			<div class="row col-sm-12">
				<h4 class="mt-5">Estudios Actuales</h4>
			</div>
			<br>
			<div class="row col-sm-12">
				<div class="form-group col-sm-3">
					<label for="iptTipoNivelEstudio">Nivel de Escolaridad</label>
					<select class="selectpicker" name="iptTipoNivelEstudio" id="iptTipoNivelEstudio">
						<?php
						foreach ($catNivel_O1 as $nivel) {
							echo "<option value='$nivel->id_nivel'>$nivel->nombre</option>";
						}
						?>
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
					<label for="iptNivelEstudio">Grado</label>
					<select class="selectpicker" name="iptNivelEstudio" id="iptNivelEstudio">
						<?php
						foreach ($catNivel_O2 as $sec) {
							echo "<option value='$sec->id_nivel'>$sec->nombre</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="row col-sm-12">
				<div class="form-group col-sm-6">
					<label for="iptNombreInstitucionEstudio">Nombre de Centro de Estudios:</label>
					<input type="text" class="form-control" name="iptNombreInstitucionEstudio" id="iptNombreInstitucionEstudio">
				</div>
				<div class="form-group col-sm-6" id="divNombreCarrera">
					<label for="iptNombreCarreraEstudio">Nombre de Carrera:</label>
					<input type="text" class="form-control" name="iptNombreCarreraEstudio" id="iptNombreCarreraEstudio">
				</div>
			</div>
			<div class="row col-sm-12">
				<div class="form-group col-sm-3">
					<label for="iptFechaInicioEstudio">Fecha de Inicio</label>
					<div class="input-group date" id="iptFechaInicioEstudio" data-target-input="nearest">
		            	<input type="text" class="form-control datetimepicker-input" data-target="#iptFechaInicioEstudio" name="iptFechaInicioEstudio"/>
		              	<div class="input-group-append" data-target="#iptFechaInicioEstudio" data-toggle="datetimepicker">
		                	<div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
		              	</div>
		            </div>
				</div>
				<div class="form-group col-sm-3">
					<label for="iptFechaFinEstudio">Fecha de Finalización</label>
					<div class="input-group date" id="iptFechaFinEstudio" data-target-input="nearest">
						<input type="text" class="form-control datetimepicker-input" date-target="#iptFechaFinEstudio" name="iptFechaFinEstudio">
						<div class="input-group-append" data-target="#iptFechaFinEstudio" data-toggle="datetimepicker">
							<div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
						</div>
					</div>
				</div>
				<div class="form-group col-sm-3">
					<label for="iptHoraInicioEstudio">Hora de Inicio</label>
					<div class="input-group date" id="iptHoraInicioEstudio" data-target-input="nearest">
						<input type="text" class="form-control datetimepicker-input" date-target="#iptHoraInicioEstudio" name="iptHoraInicioEstudio">
						<div class="input-group-append" data-target="#iptHoraInicioEstudio" data-toggle="datetimepicker">
							<div class="input-group-text"><i class="far fa-clock"></i></div>
						</div>
					</div>
				</div>
				<div class="form-group col-sm-3">
					<label for="iptHoraFinEstudio">Hora de Salida</label>
					<div class="input-group date" id="iptHoraFinEstudio" data-target-input="nearest">
						<input type="text" class="form-control datetimepicker-input" date-target="#iptHoraFinEstudio" name="iptHoraFinEstudio">
						<div class="input-group-append" data-target="#iptHoraFinEstudio" data-toggle="datetimepicker">
							<div class="input-group-text"><i class="far fa-clock"></i></div>
						</div>
					</div>
				</div>
			</div>
			<!-- FIN DATOS DE ESTUDIOS -->
			<!-- INICIO DATOS LABORALES -->
			<div class="row col-sm-12">
				<h4 class="mt-5">Datos Laborales </h4>
			</div>
			<div class="row col-sm-12">
				<div class="form-group col-sm-6">
					<label for="iptNombreTrabajo"> Nombre de Empresa o Negocio </label>
					<input type="text" class="form-control" name="iptNombreTrabajo" id="iptNombreTrabajo">
				</div>
				<div class="form-group col-sm-6">
					<label for="iptPuestoTrabajo"> Puesto que ocupa </label>
					<input type="text" class="form-control" name="iptPuestoTrabajo" id="iptPuestoTrabajo">
				</div>
			</div>
			<div class="row col-sm-12">
				<div class="form-group col-sm-3">
					<label for="iptFechaInicioTrabajo">Fecha de Inicio</label>
					<div class="input-group date" id="iptFechaInicioTrabajo" data-target-input="nearest">
						<input type="text" class="form-control datetimepicker-input" date-target="#iptFechaInicioTrabajo" name="iptFechaInicioTrabajo">
						<div class="input-group-append" data-target="#iptFechaInicioTrabajo" data-toggle="datetimepicker">
							<div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
						</div>
					</div>
				</div>
				<div class="form-group col-sm-3">
					<label for="iptHoraInicioTrabajo">Hora de Inicio</label>
					<div class="input-group date" id="iptHoraInicioTrabajo" data-target-input="nearest">
						<input type="text" class="form-control datetimepicker-input" date-target="#iptHoraInicioTrabajo" name="iptHoraInicioTrabajo">
						<div class="input-group-append" data-target="#iptHoraInicioTrabajo" data-toggle="datetimepicker">
							<div class="input-group-text"><i class="far fa-clock"></i></div>
						</div>
					</div>
				</div>
				<div class="form-group col-sm-3">
					<label for="iptHoraFinTrabajo">Hora de Salida</label>
					<div class="input-group date" id="iptHoraFinTrabajo" data-target-input="nearest">
						<input type="text" class="form-control datetimepicker-input" date-target="#iptHoraFinTrabajo" name="iptHoraFinTrabajo">
						<div class="input-group-append" data-target="#iptHoraFinTrabajo" data-toggle="datetimepicker">
							<div class="input-group-text"><i class="far fa-clock"></i></div>
						</div>
					</div>
				</div>
			</div>
			<div class="row col-sm-12 p-3">
				<h5>
					<div class="checkbox">
					  <label>¿Trabaja Sábados?<input type="checkbox" class="ml-2" name="iptSabado" id="iptSabado" value=""></label>
					</div>
				</h5>
				<div class="row col-sm-12" id="divRowSabado">
					<div class="form-group col-sm-4">
						<label for="iptHoraInicioTrabajoSabado">Hora de Inicio</label>
						<div class="input-group date" id="iptHoraInicioTrabajoSabado" data-target-input="nearest">
							<input type="text" class="form-control datetimepicker-input" date-target="#iptHoraInicioTrabajoSabado" name="iptHoraInicioTrabajoSabado">
							<div class="input-group-append" data-target="#iptHoraInicioTrabajoSabado" data-toggle="datetimepicker">
								<div class="input-group-text"><i class="far fa-clock"></i></div>
							</div>
						</div>
					</div>
					<div class="form-group col-sm-4">
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
			<div class="row col-sm-12 text-center">
				<button type="submit" class="btn btn-primary btn-lg ml-2"> <i class="fas fa-save"></i> Guardar Datos</button>
			</div>
		</form>
	</div><!-- CARD BODY -->
</div><!-- CARD -->
