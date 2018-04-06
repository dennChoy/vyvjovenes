<!-- Filtros -->
    <div class="container-fluid filtro">
    <h4> Filtros</h4>
    <form class="form-inline">
        <label class="col-form-label"><b>Rango de Edades</b> </label>
        <div class="form-row p-2" >
            <div class="form-group col-sm-4">
                De: <select id="iptEdadInicio" class="selectpicker ml-1">
		                <option selected>Edad...</option>
		                <option>1</option>
		                <option>2</option>
		                <option>3</option>
		                <option>4</option>
	            	</select>
	        </div>
	        <div class="form-group col-sm-4">
            	<label class="ml-2">A</label>:  
            	<select id="iptEdadFin" class="selectpicker ml-1">
		                <option selected>Edad...</option>
		                <option>1</option>
		                <option>2</option>
		                <option>3</option>
		                <option>4</option>
	            	</select>
            </div>
            <div class="form-group col-sm-4">
            	<label class="ml-2"><b>Sexo:</b> </label>
            	<label class="radio-inline ml-2">
			      <input type="radio" name="optradio"> Masculino
			    </label>
			    <label class="radio-inline ml-2">
			      <input type="radio" name="optradio"> Femenino
			    </label>
            </div>
        </div>
    	<button type="submit" class="btn btn-info"> <i class="fas fa-search"></i> Generar Reporte</button>
        
    </form>
    </div>
<!-- CUERPO DEL REPORTE -->
    <div class="card mt-2 p-3">
    	<div class="text-right">
    		<a class="btn btn-success" role="button" href="<?= base_url('index.php/Jovenes/mtnJovenes')?>"> <i class="fas fa-user-plus"></i> Agregar Persona</a>
    	</div>
    	<div id="listadoJovenes">

    	</div>
    </div>

    
     <script>
         //$( document ).ready(function() {
         $('#fechaInicio').datepicker();
         $('#fechaFin').datepicker();
         //});
    </script> 