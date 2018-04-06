<!--navbar navbar-expand-lg navbar-light bg-light-->
<nav class="navbar navbar-expand-lg navbar-dark" id = "menu">
  <a class="navbar-brand" href="#">DJVYV</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <!-- INICIO DE SUB MENÚ -->
    <ul class="navbar-nav">
      <?php

        $i = 0;
        foreach ($menuPadre as $menu) 
        { 
          
          $csactive = "";
          if($mnActive == $menu->id_opcion)
          {
            $csactive = "active";
          }
          //Validacion para opciones con submenu
          //Asigna a variables id del menú padre y la cantidad de submenus
          if($menu->parent == 1 and $menu->submenu > 0)
          {
            $idParent = $menu->id_opcion;
            $cSubMenu = $menu->submenu;
          }

          //Valida si es menú padre y no tiene submenu
          if($menu->parent == 1 and $menu->submenu == 0)
          {
            echo "<li class='nav-item'>
                    <a class='nav-link $csactive' href='".base_url($menu->path)."'> $menu->nombre_opcion</a>
                  </li>";
          //valida si es opción padre y tiene submenú
          }else if($menu->parent == 1 and $menu->submenu > 0)
          {
            echo "<li class='nav-item dropdown'>
                      <a class='nav-link dropdown-toggle $csactive' href='#'' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        $menu->nombre_opcion
                      </a>
                      <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>";   

          //Valida si es submenu
          }else if($menu->parent == 0 and $menu->submenu == 0 and $menu->idparent = $idParent)
          {   
                echo "<a class='dropdown-item' href='".base_url($menu->path)."'> $menu->nombre_opcion</a>"; 
            //Valida si es el ulitmo sub menú para cerrar el tag
            $cSubMenu = $cSubMenu - 1;
            if($cSubMenu == 0)
            {
              echo"   </div>
                  </li>";
            }
          }
        }
      ?>
    </ul>
    <!-- FIN DE SUB MENU -->
     <ul class="navbar-nav ml-auto mr-5">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navUserDDM" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php if(isset($_SESSION['USERNAME'])){echo $_SESSION['USERNAME'];}?>
        </a>  
        <div class="dropdown-menu" aria-labelledby="navUserDDM">
          <a class="dropdown-item" href="#"> Editar Perfil </a>
          <a class="dropdown-item" href="<?= base_url('index.php/Login/cerrarSession') ?>"> Salir </a>
        </div>
      </li>
      <img src="<?= base_url('resources/images/users/user.png') ?>" alt="" width="40" height="40">
     </ul>
  </div>
</nav>
