<script src="<?=base_url('resources/js/modulos/jsjovenes.js')?>"> </script>
<?php
	$msj = $this->session->flashdata();
	//print_r($msj);
	$idDatoPersonal = $this->uri->segment(3);
	$formatFechaNacimiento = new DateTime($datoPersonal->fecha_nacimiento);
	
?>

<div class="card">
	<div class="card-header bg-secondary text-white">
		<h4>Datos Personales </h4>
	</div>
	<div class="card-body">
		<form class="row" action="<?= base_url('index.php/Jovenes/actualizarDatoPersonal') ?>" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="iptIdDatoPersonal" value="<?= $idDatoPersonal ?>">
			<?php if($msj){ ?>
					<div class="alert <?=$msj['class_span'];?> alert-dismissible fade show" role="alert">
					  <strong><?= $msj['encabezado']; ?></strong> <?= $msj['mensaje']; ?>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>
			<?php }?>
			<div class="row col-sm-9">
				<div class="col-sm-12 row" >
					<div class="row col-sm-12"  >	
						<div class="form-group col-sm-5">
							<label for="iptNombres">Nombres: </label>
							<input type="text" class="form-control" id="iptNombres" name="iptNombres" value="<?php if(isset($datoPersonal)){echo $datoPersonal->nombres; }?>">
						</div>
						<div class="form-group col-sm-5">
							<label for="iptApellidos">Apellidos: </label>
							<input type="text" class="form-control" id="iptApellidos" name="iptApellidos" value="<?php if(isset($datoPersonal)){echo $datoPersonal->apellidos; }?>">
						</div>
						<div class="form-group col-sm-2">
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
					<div class="row col-sm-12" >
						<div class="form-group col-sm-4">
							<label for="iptFechaNacimiento"> Fecha de Nacimiento: </label>
							<div class="input-group date" id="iptFechaNacimiento" data-target-input="nearest">
				            	<input type="text" class="form-control datetimepicker-input" data-target="#iptFechaNacimiento" name="iptFechaNacimiento" value="<?= $formatFechaNacimiento->format('d/m/Y');?>" />
				              	<div class="input-group-append" data-target="#iptFechaNacimiento" data-toggle="datetimepicker">
				                	<div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
				              	</div>
				            </div>
						</div>
						<div class="form-group col-sm-8">
							<label for="iptDireccion"> Dirección </label>
							<input type="text" class="form-control" id="iptDireccion" name="iptDireccion" value="<?php if(isset($datoPersonal)){echo $datoPersonal->direccion_residencia; }?>">
						</div>
					</div>
				</div>
				<div class="ml-4">
					<button type="submit" class="btn btn-primary ml-2" id="btnSubmitFormEstudios"> 
						<i class="fas fa-save"></i> Actualizar Datos
					</button>
				</div>
			</div>
			<div class = "row col-sm-3" >
				<img src="  
					<?php if($datoPersonal->foto == ''){
						echo base_url('resources/images/jovenes/image3.jpg');
					}else{
						//echo "data:image;base64,'".base64_encode($datoPersonal->foto)."'";
						echo base_url('resources/images/jovenes/').$datoPersonal->foto;
						//echo $datoPersonal->foto;
					}
					?>"
				alt="" class="rounded" height="250" width="250" >

				<div class="form-group">
	                <input type="file" name="iptFoto" class="form-control" id="iptFoto">
	            </div>
			</div>
		</form>
	</div>
</div>
<div class="card mt-3">
	<div class="card-header bg-secondary text-white">
		<h4>Estudios</h4>
	</div>
	<div class="card-body">
		<form action="<?= base_url('index.php/Jovenes/mtnDatosPersonales_Estudio')?>" method="POST" id="formEstudios">
			<input type="hidden" name="iptIdDatoPersonal" id="iptIdDatoPersonal" value="<?= $idDatoPersonal ?>">
			<input type="hidden" name="iptIdEscolaridad"  id="iptIdEscolaridad">
			<div class="checkbox">
				<h5>Actual<input type="checkbox" class="ml-2" name="iptActualEstudio" id="iptActualEstudio" ></h5>
			</div>
			<div class="row">
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
			<div class="row">
				<div class="form-group col-sm-5">
					<label for="iptNombreInstitucionEstudio">Nombre de Centro de Estudios:</label>
					<input type="text" class="form-control" name="iptNombreInstitucionEstudio" id="iptNombreInstitucionEstudio" required>
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
								 			<button id='btnEditarEstudio' class='btn btn-dark btn-sm' onClick='buscarDatoxId(1, $estudio->id_datop_escolar, ".$this->uri->segment(3).")'>
								 				<i class='fas fa-edit'></i>
								 			</button>";

								if($estudio->actual == 1) { echo " <span class='badge badge-warning'> Actual</span>"; }

								echo "</td>
										<td>$estudio->nombre_tipo_nivel</td>
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
	<div class="card-header bg-secondary text-white">
		<h4>Datos Laborales</h4>
	</div>
	<div class="card-body">
		<form action="<?= base_url('index.php/Jovenes/mtnDatosPersonales_Trabajo')?>" method="POST" id="formTrabajo">
			<input type="hidden" name="iptIdDatoPersonal" id="iptIdDatoPersonal" value="<?= $idDatoPersonal ?>">
			<input type="hidden" name="iptIdTrabajo" id="iptIdTrabajo">
			<div class="checkbox">
				<h5>Actual<input type="checkbox" class="ml-2" name="iptActualTrabajo" id="iptActualTrabajo" ></h5>
			</div>
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
						<input type="text" class="form-control datetimepicker-input" date-target="#iptFechaInicioTrabajo" name="iptFechaInicioTrabajo" id="iptFechaInicioTrabajoInput">
						<div class="input-group-append" data-target="#iptFechaInicioTrabajo" data-toggle="datetimepicker">
							<div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
						</div>
					</div>
				</div>
				<div class="form-group col-sm-3">
					<label for="iptFechaFinTrabajo">Fecha Final</label>
					<div class="input-group date" id="iptFechaFinTrabajo" data-target-input="nearest">
						<input type="text" class="form-control datetimepicker-input" date-target="#iptFechaFinTrabajo" name="iptFechaFinTrabajo" id="iptFechaFinTrabajoInput">
						<div class="input-group-append" data-target="#iptFechaFinTrabajo" data-toggle="datetimepicker">
							<div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
						</div>
					</div>
				</div>
				<div class="form-group col-sm-2">
					<label for="iptHoraInicioTrabajo">Hora de Inicio</label>
					<div class="input-group date" id="iptHoraInicioTrabajo" data-target-input="nearest">
						<input type="text" class="form-control datetimepicker-input" date-target="#iptHoraInicioTrabajo" name="iptHoraInicioTrabajo" id="iptHoraInicioTrabajoInput">
						<div class="input-group-append" data-target="#iptHoraInicioTrabajo" data-toggle="datetimepicker">
							<div class="input-group-text"><i class="far fa-clock"></i></div>
						</div>
					</div>
				</div>
				<div class="form-group col-sm-2">
					<label for="iptHoraFinTrabajo">Hora de Salida</label>
					<div class="input-group date" id="iptHoraFinTrabajo" data-target-input="nearest">
						<input type="text" class="form-control datetimepicker-input" date-target="#iptHoraFinTrabajo" name="iptHoraFinTrabajo" id="iptHoraFinTrabajoInput">
						<div class="input-group-append" data-target="#iptHoraFinTrabajo" data-toggle="datetimepicker">
							<div class="input-group-text"><i class="far fa-clock"></i></div>
						</div>
					</div>
				</div>
			</div>
			<div class="p-3">
				<h5>
					<div class="checkbox">
					  <label>¿Trabaja Sábados?<input type="checkbox" class="ml-2" name="iptSabado" id="iptSabado" ></label>
					</div>
				</h5>
				<div class="row" id="divRowSabado">
					<div class="form-group col-sm-2">
						<label for="iptHoraInicioTrabajoSabado">Hora de Inicio</label>
						<div class="input-group date" id="iptHoraInicioTrabajoSabado" data-target-input="nearest">
							<input type="text" class="form-control datetimepicker-input" date-target="#iptHoraInicioTrabajoSabado" name="iptHoraInicioTrabajoSabado" id="iptHoraInicioTrabajoSabadoInput">
							<div class="input-group-append" data-target="#iptHoraInicioTrabajoSabado" data-toggle="datetimepicker">
								<div class="input-group-text"><i class="far fa-clock"></i></div>
							</div>
						</div>
					</div>
					<div class="form-group col-sm-2">
						<label for="iptHoraFinTrabajoSabado">Hora de Salida</label>
						<div class="input-group date" id="iptHoraFinTrabajoSabado" data-target-input="nearest">
							<input type="text" class="form-control datetimepicker-input" date-target="#iptHoraFinTrabajoSabado" name="iptHoraFinTrabajoSabado" id="iptHoraFinTrabajoSabadoInput">
							<div class="input-group-append" data-target="#iptHoraFinTrabajoSabado" data-toggle="datetimepicker">
								<div class="input-group-text"><i class="far fa-clock"></i></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="ml-4">
				<div>
					<button type="button" class="btn btn-secondary ml-2" onClick="limpiarDatos(2);">
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
							<th colspan="5" class="text-center"> Historial de Trabajo</th>
						</tr>
						<tr>
							<th>Editar</th>
							<th>Nombre de Trabajo</th>
							<th>Puesto</th>
							<th>Tiempo de Labores</th>
						</tr>
					</thead>
					<tbody id="tbody-trabajo">
						<?php
							foreach ($datoLaboral as $trabajo) 
							{
								echo "<tr>
								 		<td>
								 			<button id='btnEditarEstudio' class='btn btn-dark btn-sm' onClick='buscarDatoxId(2, $trabajo->id_datop_trabajo, ".$this->uri->segment(3).")'>
								 				<i class='fas fa-edit'></i>
								 			</button>";
								if($trabajo->actual == 1) { echo " <span class='badge badge-warning'> Actual</span>"; }
								echo "</td>
										<td>$trabajo->nombre_trabajo</td>
										<td>$trabajo->puesto</td>
										<td>$trabajo->fechainicio - $trabajo->fechafin</td>
									</tr>";
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
		<!--FIN INICIO DATOS LABORALES -->
	</div><!-- CARD BODY -->
</div><!-- CARD -->

