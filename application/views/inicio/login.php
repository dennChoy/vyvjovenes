<?php
?>
<!doctype html>
<html lang="es">
  	<head>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<link rel="stylesheet" href="<?= base_url('resources/css/login/login.css') ?>" >
		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="<?= base_url('resources/js/login/login.js') ?>"></script>
		<title>DJVYV</title>
	</head>
	<body>
	    <div class="container">
	        <div class="card card-container">
	            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
	            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
	            <p id="profile-name" class="profile-name-card"></p>
	            <form action="Login/validarDatosLogin" method="POST" class="form-signin">
	                <span id="reauth-email" class="reauth-email"></span>
	                <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email" required autofocus>
	                <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Contraseña" required>
	                <div id="remember" class="checkbox">
	                </div>
	                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Ingresar</button>
	            </form><!-- /form -->
	            <a href="#" class="forgot-password">
	                ¿Olvidaste tu contraseña?
	            </a>
	        </div><!-- /card-container -->
	    </div><!-- /container -->
	</body>
</html>