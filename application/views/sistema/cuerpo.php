<?php
?>
<div class="row">
     <div class="col-2">
        <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">
                Usuarios
            </a>
            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">
                Agregar nuevos
            </a>
            <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">
                Messages
            </a>
            <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">
                Settings
            </a>
        </div>
    </div>
    <div class="col-10">
        <div class="card">
            <div class="card-header">
                <b>Ingreso de Nuevo Usuario</b>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="txtUsuario"> Nombre de Usuario </label>
                        <input type="text" class="form-control" id="txtUsuario">
                    </div>

                    <div class="form-group">
                        <label for="txtMail"> Email </label>
                        <input type="text" class="form-control" id="txtMail">
                    </div>

                    <div class="form-group">
                        <label for="txtRolUsuario">Rol de Usuario</label>
                        <select class="form-control" id="txtRolUsuario">

                        </select>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input"> Usuario Activo 
                        </label>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary"> Guardar Usuario </button>
                </form>
            </div>
        </div>
    </div>
</div>