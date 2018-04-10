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
        <br>
    	<div id="listadoJovenes" class="table-responsive" >
            <table class="table table-hover table-bordered ">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Edad</th>
                        <th>Sexo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($todosJovenes as $persona) 
                        {
                            echo "  <tr>
                                        <td>
                                            $persona->id_datopersonal
                                            <a href='".base_url('index.php/Jovenes/mtnJovenes/')."$persona->id_datopersonal' id='btnVerDetallePersona' class='btn btn-warning btn-sm' role='button'>
                                                <i class='fas fa-edit'></i>
                                            </a>
                                        </td>
                                        <td>$persona->nombres</td>
                                        <td>$persona->apellidos</td>
                                        <td>$persona->edad</td>
                                        <td>$persona->sexo</td>
                                    </tr>";
                        }
                    ?>
                </tbody>
            </table>
    	</div>
    </div>