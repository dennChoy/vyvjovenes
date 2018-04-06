<?php
?>
<div class="card">
	<div class="card-header">
		<h4> Usuarios </h4>
	</div>
	<div class="card-body">
		<div class="text-right">
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#usuarioModal" id="btnNuevoUsuario">
				Nuevo Usuario <i class="fas fa-user-plus"></i>
			</button>
		</div>
		<br>
		<br>
		<table class="table">
			<thead>
				<th class="text-center" colspan="2">Codigo</th>
				<th>Nombre de Usuario </th>
				<th>Rol</th>
				<th>Correo</th>
			</thead>
			<tbody>
					<?php 
					foreach ($sysUsers as $user) 
					{
						//data-toggle='modal' = data-target='#usuarioModal'
					 	echo "<tr>
					 			<td>
					 				<button id='btnEditarUsuario' onClick='buscarUsuario($user->id_usuario)' class='btn btn-primary btn-sm' data-toggle='modal' = data-target='#usuarioModal'	>
					 					<i class='fas fa-edit'></i>
					 			</td>
					 			<td>
					 				</button> $user->id_usuario ";
					 			if($user->activo == 1)
		                        {
		                            echo "<span class='badge badge-success'> Activo</span>";
		                        }else{
		                            echo "<span class='badge badge-danger'> Inactivo</span>";
		                        }
					 	echo "</td>";
						echo"	<td>$user->usuario</td>
								<td>$user->nombre_rol</td>
								<td>$user->correo</td>";
		
						
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
				<button type="button" class="btn btn-dark btn-sm" data-dismiss="modal"> <i class="fas fa-times"></i> </button>
			</div>	
			<div class="text-center pt-2" id="divLoadGif">

			</div>
			<div class="modal-body p-3">
				<form action='<?= base_url('index.php/Sistema/guardarUsuario') ?>' method="POST">
					<input type="hidden" id="iptIdUsuario" name="iptIdUsuario">
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
                    <div class='p-3 text-right'>
	        			<button type="submit" class="btn btn-primary btn-sm"> <i class="far fa-save"></i> Guardar </button>
	        			<a href="#" role="button" class="btn btn-danger btn-sm"> <i class="far fa-trash-alt"></i> Eliminar</a>
	        		</div>
    			</form>
			</div>
		</div>
	</div>
</div>
<script>
	$("#btnNuevoUsuario").click(function(){
		loading(1);
  		$('#iptIdUsuario').val('0');
		$('#iptUsuario').val('');
		$('#iptMail').val('');
		loading(2);
  	});

	function buscarUsuario(idUsuario)
	{	
		loading(1);
	  	$.ajax({
            url: "buscarUsuario/"+idUsuario,
            data: "",
            type: "GET",
            dataType: "json",
            success: function (data) {
                caragaInputUsuario(data);
            },
            error: function () {
                console.log("Failed! Please try again.");
            }
        }); 
	}

	function caragaInputUsuario(data)
	{
		$.each(data, function(i, val){
			$('#iptIdUsuario').val(data.id_usuario);
			$('#iptUsuario').val(data.usuario);
			$('#iptMail').val(data.correo);
			$('#iptActivo').prop('checked', data.activo);
			$('#iptRol').val(data.id_rol);
		});
		loading(2);
	}
</script>