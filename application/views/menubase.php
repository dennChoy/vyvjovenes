<?php ?>
<!--navbar navbar-expand-lg navbar-light bg-light-->
<nav class="navbar navbar-expand-lg navbar-dark" id = "menu">
      <a class="navbar-brand" href="#">DJVYV</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <!-- INICIO DE SUB MENÚ -->
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Jóvenes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Finanzas</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Actividades
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Seguridad
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="<?= base_url('index.php/Sistema/mtnUsuario') ?>">Usuarios</a>
              <a class="dropdown-item" href="<?= base_url('index.php/Sistema/mtnRol')?>">Roles</a>
              <a class="dropdown-item" href="<?= base_url('index.php/Sistema/mtnMenu')?>">Menú</a>
            </div>
          </li>
        </ul>
        <!-- FIN DE SUB MENU -->
      </div>
    </nav>
