<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="<?= base_url('resources/css/bootstrap/css/bootstrap.min.css') ?>"  integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link rel="stylesheet" href="<?= base_url('resources/css/main.css') ?>" >

     <!-- Bootstrap Select -->
     <link rel="stylesheet" href="<?= base_url('resources/bootstrap-select-1.13.0-beta/css/bootstrap-select.min.css') ?>" >

    <!--Glyphicons-->
    <script defer src="<?= base_url('resources/glyphicons/fontawesome-free-5.0.8/fontawesome-all.js')?>"></script>

    <title>DJVYV</title>
  </head>

  <body>
  	<?php if(isset($auth)):  $this->load->view($vista_menu) ; ?>
  		<br>

    	<div class="container">
    		<?php if(isset($vista_cuerpo))$this->load->view($vista_cuerpo) ;?>
		  </div>
			<?php  else: $this->load->view('error403'); 
		endif ?>
	<br>
	<br>
	<br>

	<footer >
        <p class="text-center">
        	<small>
        	© 2018 Copyright: DJVYV "... Y levantarán alas como las águilas.." 
        	</small>
        </p>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="<?= base_url('resources/css/bootstrap/js/bootstrap.min.js')  ?>" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="<?= base_url('resources/bootstrap-select-1.13.0-beta/js/bootstrap-select.min.js') ?>"> </script>

  </body>

</html>