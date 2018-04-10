<script src="<?=base_url('resources/js/modulos/jsjovenes.js')?>"> </script>
<?php
	$idDatoPersonal = $this->uri->segment(3);
	//print_r($datoPersonal);
	$formatFechaNacimiento = new DateTime($datoPersonal->fecha_nacimiento);
	
?>

<div class="card">
	<div class="card-header">
		<h4>Datos Personales </h4>
	</div>
	<div class="card-body">
		<form action="<?= base_url('index.php/Jovenes/actualizarDatoPersonal') ?>" method="POST">
			<input type="hidden" name="iptIdDatoPersonal" value="<?= $idDatoPersonal ?>">
			<div class="row">	
				<div class="form-group col-sm-4">
					<label for="iptNombres">Nombres: </label>
					<input type="text" class="form-control" id="iptNombres" name="iptNombres" value="<?php if(isset($datoPersonal)){echo $datoPersonal->nombres; }?>">
				</div>
				<div class="form-group col-sm-4">
					<label for="iptApellidos">Apellidos: </label>
					<input type="text" class="form-control" id="iptApellidos" name="iptApellidos" value="<?php if(isset($datoPersonal)){echo $datoPersonal->apellidos; }?>">
				</div>
				<div class="form-group col-sm-4">
	            	<label class="ml-2" for="divSexo">Sexo:</label>
	            	<div class="form-group" id="divSexo">
	            		<div class="radio ml-2">
	            			<label><input type="radio" name="iptSexo" value="M" <?php if($datoPersonal->sexo == "M"){echo "checked";} ?>> Hombre</label>
	            		</div>
	            		<div class="radio ml-2">
	            			<label><input type="radio" name="iptSexo" value="F" <?php if($datoPersonal->sexo == "F"){echo "checked";} ?>> Mujer</label>
	            		</div>
	            	</div>
	            </div>
			</div>
			<div class="row">
				<div class="form-group col-sm-3">
					<label for="iptFechaNacimiento"> Fecha de Nacimiento: </label>
					<div class="input-group date" id="iptFechaNacimiento" data-target-input="nearest">
		            	<input type="text" class="form-control datetimepicker-input" data-target="#iptFechaNacimiento" name="iptFechaNacimiento" value="<?= $formatFechaNacimiento->format('d/m/Y');?>" />
		              	<div class="input-group-append" data-target="#iptFechaNacimiento" data-toggle="datetimepicker">
		                	<div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
		              	</div>
		            </div>
				</div>
				<div class="form-group col-sm-7">
					<label for="iptDireccion"> Dirección </label>
					<input type="text" class="form-control" id="iptDireccion" name="iptDireccion" value="<?php if(isset($datoPersonal)){echo $datoPersonal->direccion_residencia; }?>">
				</div>
			</div>
			<div class="ml-4">
				<button type="submit" class="btn btn-primary ml-2" id="btnSubmitFormEstudios"> 
					<i class="fas fa-save"></i> Actualizar Datos
				</button>
			</div>
		</form>
	</div>
</div>
<div class="card mt-3">
	<div class="card-header">
		<h4>Estudios</h4>
	</div>
	<div class="card-body">
		<form action="<?= base_url('index.php/Jovenes/mtnDatosPersonales_Estudio')?>" method="POST" id="formEstudios">
			<input type="hidden" name="iptIdEscolaridad"  id="iptIdEscolaridad">
			<input type="hidden" name="iptIdDatoPersonal" id="iptIdDatoPersonal" value="<?= $idDatoPersonal ?>">
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
					<input type="text" class="form-control" name="iptNombreInstitucionEstudio" id="iptNombreInstitucionEstudio" required>
				</div>
				<div class="form-group col-sm-5" id="divNombreCarrera">
					<label for="iptNombreCarreraEstudio">Nombre de Carrera:</label>
					<input type="text" class="form-control" name="iptNombreCarreraEstudio" id="iptNombreCarreraEstudio" required>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-sm-2">
					<label for="iptFechaInicioEstudio">Año de Inicio</label>
					<div class="input-group date" id="iptFechaInicioEstudio" data-target-input="nearest">
		            	<input type="text" class="form-control datetimepicker-input" data-target="#iptFechaInicioEstudio" name="iptFechaInicioEstudio" id="iptFechaInicioEstudioInput" required />
		              	<div class="input-group-append" data-target="#iptFechaInicioEstudio" data-toggle="datetimepicker">
		                	<div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
		              	</div>
		            </div>
				</div>
				<div class="form-group col-sm-2">
					<label for="iptFechaFinEstudio">Año de Finalización</label>
					<div class="input-group date" id="iptFechaFinEstudio" data-target-input="nearest">
						<input type="text" class="form-control datetimepicker-input" date-target="#iptFechaFinEstudio" name="iptFechaFinEstudio" id="iptFechaFinEstudioInput">
						<div class="input-group-append" data-target="#iptFechaFinEstudio" data-toggle="datetimepicker">
							<div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
						</div>
					</div>
				</div>
				<div class="form-group col-sm-2">
					<label for="iptHoraInicioEstudio">Hora de Inicio</label>
					<div class="input-group date" id="iptHoraInicioEstudio" data-target-input="nearest">
						<input type="text" class="form-control datetimepicker-input" date-target="#iptHoraInicioEstudio" name="iptHoraInicioEstudio" id="iptHoraInicioEstudioInput">
						<div class="input-group-append" data-target="#iptHoraInicioEstudio" data-toggle="datetimepicker">
							<div class="input-group-text"><i class="far fa-clock"></i></div>
						</div>
					</div>
				</div>
				<div class="form-group col-sm-2">
					<label for="iptHoraFinEstudio">Hora de Salida</label>
					<div class="input-group date" id="iptHoraFinEstudio" data-target-input="nearest">
						<input type="text" class="form-control datetimepicker-input" date-target="#iptHoraFinEstudio" name="iptHoraFinEstudio" id="iptHoraFinEstudioInput">
						<div class="input-group-append" data-target="#iptHoraFinEstudio" data-toggle="datetimepicker">
							<div class="input-group-text"><i class="far fa-clock"></i></div>
						</div>
					</div>
				</div>
			</div>
			<div class="ml-4">
				<div>
					<button type="button" class="btn btn-secondary ml-2" onClick="limpiarDatos(1);">
						<i class="far fa-file"></i> Nuevo Registro
					</button>
					<button type="submit" class="btn btn-primary ml-2" id="btnSubmitFormEstudios"> 
						<i class="fas fa-save"></i> 
						Guardar Datos
					</button>
				</div>
			</div>
		</form>
		<div class="row">
			<div class="p-3 col-sm-12">
				<table class="table table-sm">
					<thead class="thead-light">
						<tr>
							<th colspan="5" class="text-center"> Historial de Estudios </th>
						</tr>
						<tr>
							<th>Editar</th>
							<th>Nivel</th>
							<th>Grado / Carrera</th>
							<th>Centro de Estudios</th>
							<th>Tiempo de Estudios</th>
						</tr>
					</thead>
					<tbody id="tbody-estudio">
						<?php
							foreach ($datoEscolar as $estudio) 
							{
								echo "<tr>
								 		<td>
								 			<button id='btnEditarEstudio' class='btn btn-dark btn-sm' onClick='buscarDatoxId(1, $estudio->id_datop_escolaridad, ".$this->uri->segment(3).")'>
								 				<i class='fas fa-edit'></i>
								 			</button>
								 		</td>
										<td>$estudio->id_nivel_escolaridad</td>
										<td>$estudio->nombrecarrera</td>
										<td>$estudio->nombre_centroestudios</td>
										<td>$estudio->fechainicio - $estudio->fechafin</td>
									</tr>";
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="card mt-3">
	<div class="card-header">
		<h4>Datos Laborales</h4>
	</div>
	<div class="card-body">
		<form>
			<input type="text" name="iptIdDatoPersonal" id="iptIdDatoPersonal" value="<?= $idDatoPersonal ?>">
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
		</form>
		<!--FIN INICIO DATOS LABORALES -->
	</div><!-- CARD BODY -->
</div><!-- CARD -->

