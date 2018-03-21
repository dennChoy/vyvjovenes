<?php

foreach ($registroRol as $row){
    $iptIdRol       = $row->id_rol_usuario;
    $iptNombreRol   = $row->nombre_rol;
    $iptMotivoRol   = $row->motivo_rol;
    $iptActivoRol   = $row->activo;
}
?>
<div class="row">
     <div class="col-6">
        <div class="card">
            <div class="card-header"> 
                <b>Roles del Sistema</b>
            </div>
            <div class="card-body">
                <div class="text-right pb-3">
                    <a href="<?= base_url('index.php/Sistema/mtnRol') ?>" role='button' class='btn btn-info'>
                        <i class='fas fa-plus-square'></i> Nuevo Rol
                    </a>
                </div>
                <table class="table">
                    <thead>
                        <th>Codigo</th>
                        <th>Rol</th>
                        <th>Creado por/para</th>
                        <th>Activo</th>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($sysRol as $rol) 
                            {
                                echo "<tr>
                                        <td>$rol->id_rol_usuario <a href='".base_url('index.php/Sistema/mtnRol/').$rol->id_rol_usuario."' role='button' class='btn btn-dark btn-sm' aria-pressed='true'><i class='fas fa-edit'></i></td>
                                        <td>$rol->nombre_rol</td>
                                        <td><small>$rol->motivo_rol<small></td>";
                                
                                if($rol->activo == 1)
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
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <b>Modificar/Agregar Rol</b>
            </div>
            <div class="card-body">
                <form action='<?= base_url('index.php/Sistema/guardarRol') ?>' method="POST">

                    <div class="form-group">
                        <input type="hidden" id="txtCodigo" name="iptCodigoRol" value="<?php if(isset($iptIdRol)): echo $iptIdRol; endif?>" >
                    </div>

                    <div class="form-group">
                        <label for="txtRol"> Nombre de Rol: </label>
                        <input type="text" class="form-control" id="txtRol" name="iptRol" value="<?php if(isset($iptNombreRol)): echo $iptNombreRol; endif?>" required>
                    </div>

                    <div class="form-group">
                        <label for="txtMotivoRol"> Creado por/para: </label>
                        <input type="text" class="form-control" id="txtMotivoRol" name="iptMotivoRol" value="<?php if(isset($iptMotivoRol)): echo $iptMotivoRol; endif?>">
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="txtActivo" name="iptActivo" <?php if(isset($iptActivoRol)){ if($iptActivoRol == 1){ echo "checked"; } }?>> Activo </label>
                        </label>
                    </div>
                    <br>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary"> <i class="far fa-save"></i> Guardar</button>

                        <button type="button" class="btn btn-danger ml-2" disabled> <i class="far fa-trash-alt"></i> Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>