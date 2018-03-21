<?php
?>
<div class="card">
	<div class="card-header">
		<h5 class="modal-title"> <i class="far fa-user"></i> Usuario</h5>
	</div>
	<div class="card-body">
		<div class="text-right">
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#usuarioModal">
				Nuevo Usuario <i class="fas fa-user-plus"></i>
			</button>
		</div>
		<br>
		<br>
		<table class="table">
			<thead>
				<th>Codigo</th>
				<th>Nombre de Usuario </th>
				<th>Rol</th>
				<th>Correo</th>
				<th>Modificar</th>
			</thead>
			<tbody>
					<?php 
					foreach ($sysUsers as $user) 
					{
					 	echo "<tr>
					 			<td>$user->idusuario <a href='".base_url('index.php/Sistema/mtnUsuario/').$user->idusuario."' role='button' class='btn btn-primary btn-sm'> <i class='fas fa-edit'></i></button> </td>
								<td>$user->usuario</td>
								<td>$user->nombre_rol</td>
								<td>$user->correo</td>";

								
						if($user->activo == 1)
                        {
                            echo "<td><span class='badge badge-success'> Activo</span></td>";
                        }else{
                            echo "<td><span class='badge badge-danger'> Inactivo</span></td>";
                        }
					}
					?>
			</tbody>
		</table>
	</div>	
</div>


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="usuarioModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"> <i class="far fa-user"></i> Usuario</h5>
			</div>	
			<div class="modal-body p-3">
				<form action='<?= base_url('index.php/Sistema/guardarUsuario') ?>' method="POST">
					<input type="text" id="iptIdUsuario">
                    <div class="form-group">
                        <label for="txtUsuario"> Nombre de Usuario </label>
                        <input type="text" class="form-control" id="iptUsuario" name="iptUsuario">
                    </div>

                    <div class="form-group">
                        <label for="txtMail"> Email </label>
                        <input type="text" class="form-control" id="iptMail" name="iptMail">
                    </div>

                    <div class="form-group">
                        <label for="txtRolUsuario">Rol de Usuario</label>
                        <select class="selectpicker" data-live-search="true" id="iptRol" name="iptRol">
                        	<?php
                        		foreach ($roles as $row) {
                        			echo "<option value='$row->id_rol_usuario'>$row->nombre_rol</option>";
                        		}
                        	?>
                        </select>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="iptActivo" name="iptActivo"> Usuario Activo 
                        </label>
                    </div>
                
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        		<button type="submit" class="btn btn-primary">Guardar Cambios</button>
        		</form>
			</div>
		</div>
	</div>
</div>
