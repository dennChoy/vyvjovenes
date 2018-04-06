<?php
?>
<div class="card">
	<div class="card-header">
		<h4> Menú del Sistema </h4>
	</div>
	<div class="card-body">
		<div class="text-right">
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#sysMenuModal" id="btnSysMenuModal">
				<i class="fas fa-plus"></i> Nueva Opción
			</button>
		</div>
		<br>
		<br>
		<table class="table">
			<thead>
				<th class="text-center" colspan="2">Código</th>
				<th>Opción </th>
				<th>Opción Padre</th>
				<th>Path</th>
			</thead>	
			<tbody>
					<?php 
					
					foreach ($sysOpcion as $opcion) 
					{
						//data-toggle='modal' = data-target='#usuarioModal'
					 	echo "<tr>
					 			<td>
					 				<button id='btnEditarOpcion' onClick='buscarMenuOpcion($opcion->id_opcion, 1, 0)' class='btn btn-primary btn-sm' data-toggle='modal' = data-target='#sysMenuModal'	>
					 					<i class='fas fa-edit'></i>
					 				</button>
					 				<button id='btnMenuxRol' onClick='buscarMenuOpcion($opcion->id_opcion, 2, \"$opcion->nombre_opcion\")' class='btn btn-warning btn-sm' data-toggle='modal' = data-target='#sysMenuxRolModal'	>
					 					<i class='fas fa-edit'></i>
					 				</button>
					 			</td>
					 			<td>
					 				$opcion->id_opcion ";
					 			if($opcion->activo == 1)
		                        {
		                            echo "<span class='badge badge-success'> Activo</span>";
		                        }else{
		                            echo "<span class='badge badge-danger'> Inactivo</span>";
		                        }
					 	echo "</td>";
						echo"	<td>$opcion->nombre_opcion</td>
								<td>$opcion->nombre_parent</td>
								<td>$opcion->path</td>";
					}
					
					?>
			</tbody>
		</table>
	</div>	
</div>


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="sysMenuModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"> <i class="fas fa-bars"></i> Menú del Sistema</h5>
				<button type="button" class="btn btn-dark btn-sm" data-dismiss="modal"> <i class="fas fa-times"></i> </button>
			</div>	
			<div class="text-center pt-2" id="divLoadGif">
			</div>
			<div class="modal-body p-3">
				<form action='<?= base_url('index.php/Sistema/guardarOpcionMenu') ?>' method="POST">
					<input type="hidden" id="iptIdMenu" name="iptIdMenu">
                    <div class="form-group">
                        <label for="iptNombreMenu"> Nombre de la opción </label>
                        <input type="text" class="form-control" id="iptNombreMenu" name="iptNombreMenu">
                    </div>

                    <div class="form-group">
                        <label for="iptPath"> Ruta </label>
                        <input type="text" class="form-control" id="iptPath" name="iptPath">
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" onClick="chkParent();" id="iptParent" name="iptParent"> Es Padre
                        </label>
                    </div>
                    <br>
                    <div class="form-group" id="divIdPadre">
                        <label for="iptIdParent">Opción Padre</label><br>
                        <select class="selectpicker" data-live-search="true" id="iptIdParent" name="iptIdParent">
                        	<?php
                        	
                        		foreach ($sysOpcionPadre as $row) {
                        			echo "<option value='$row->id_opcion'>$row->nombre_opcion</option>";
                        		}
                        		
                        	?>
                        </select>
                    </div>


                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="iptActivo" name="iptActivo">Activo 
                        </label>
                    </div>
                    <div class='p-3 text-right'>
	        			<button type="submit" class="btn btn-primary btn-sm"> <i class="far fa-save"></i> Guardar </button>
	        			<a href="#" role="button" class="btn btn-danger btn-sm"> <i class="far fa-trash-alt"></i> Eliminar</a>
	        		</div>
    			</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade bd-example-modal-lg" id="sysMenuxRolModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"> <i class="fas fa-bars"></i> Roles asignados</h5>
				<button type="button" class="btn btn-dark btn-sm" data-dismiss="modal"> <i class="fas fa-times"></i> </button>
			</div>	
			<div class="text-center pt-2" id="divLoadGif">
			</div>
			<div class="modal-body p-3" id="divMenuxRol">
				 <fieldset class="form-group">
    				<legend ><p id="nombreRol"></p></legend>
					<form action='<?= base_url('index.php/Sistema/guardarMenuxRol') ?>' method="POST">
						<input type="hidden" id="iptIdMenuRol" name="iptIdMenuRol">
						<ul>
							<?php
								foreach ($sysRol as $rol) 
								{
									echo "  <li class='form-check'> 
												<label class='form-check-label'>
													<input type='checkbox' class='form-check-input' id='iptchk$rol->nombre_rol' name='chkRoles[$rol->id_rol_usuario]'>$rol->nombre_rol 
												</label>
											</li>";
								}
							?>
						</ul>
	                    <div class='p-3 text-right'>
		        			<button type="submit" class="btn btn-primary btn-sm"> <i class="far fa-save"></i> Guardar </button>
		        			<a href="#" role="button" class="btn btn-danger btn-sm"> <i class="far fa-trash-alt"></i> Eliminar</a>
		        		</div>
	    			</form>
	    		</fieldset>
			</div>
		</div>
	</div>
</div>
<script>

	function chkParent()
	{
		//Modal Editar/Ingresar ROL
		//Verifica si está activo el checkBox parent
		if($("#iptParent").prop('checked')){ 
			$('#divIdPadre').hide();
		}else{
			$('#divIdPadre').show();
		}	
	}

	//Click Nueva Opción: Limpia los inputs.
	$("#btnSysMenuModal").click(function(){
		chkParent();
		loading(1);
  		$('#iptIdMenu').val('0');
		$('#iptNombreMenu').val('');
		$('#iptPath').val('');
		$('#iptParent').prop('checked', false);
		$('#iptActivo').prop('checked', true);
		loading(2);
  	});

  	function buscarMenuOpcion(idOpcion, modal, nombreOpcion)
	{	
		loading(1);
		var url = "";
		if(modal == 1)
		{
			url = "buscarOpcion/"+idOpcion;
		}else{
			//Limpia los checkbox
			$('#divMenuxRol').find('input:checkbox').prop('checked', false);
			//Asigna a input el rol_id
			$('#iptIdMenuRol').val(idOpcion);		
			$('#nombreRol').text(nombreOpcion);		
			
	
			url = "buscarMenuxRol/"+idOpcion;
		}

		$.ajax({
	            url: url,
	            data: "",
	            type: "GET",
	            dataType: "json",
	            success: function (data) {
	                caragaInputMenu(data, modal);
	               // $('#iptsysAdmin').prop('checked', true);
	            },
	            error: function () {
	                console.log("Failed! Please try again.");
	            }
	        }); 
	}

	function caragaInputMenu(data, modal)
	{
		if(modal == 1)
		{
			$.each(data, function(i, val){
				$('#iptIdMenu').val(data.id_opcion);
				$('#iptNombreMenu').val(data.nombre_opcion);
				$('#iptPath').val(data.path);
				$('#iptParent').prop('checked', data.parent);
				$('#iptActivo').prop('checked', data.activo);
			});
			chkParent();
		}else{
			$.each(data, function(i, val){
				$('#iptchk'+val.nombre_rol).prop('checked', true);
			});
		}
		
		loading(2);
	}
</script>