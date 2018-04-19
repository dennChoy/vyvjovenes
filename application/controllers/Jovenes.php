<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jovenes extends CI_Controller 
{
	 function __construct() {
        parent::__construct();

        if(isset($_SESSION['ID_USERNAME'])){
	        $this->load->model('Sistema_model');
	        $this->load->model('Jovenes_model');
	        $this->data = array('menuPadre' => $this->Sistema_model->cargaMenu(),
						    	'vista_menu'=> 'menubase',
						    	'mnActive'	=> 6,//id_menu_opcion de Sistema
	    						);	

	    }else{
	    	redirect('Login', 'refresh');
	    }
    }

	public function index()
	{
		$this->data['auth']			= $this->Sistema_model->MenuAutorizacion('Inicio')->auth;
		$this->data['vista_menu']	= 'menubase';
		$this->data['vista_cuerpo']	= 'inicio/cuerpo';
		
		$this->load->view('viewbase', $this->data);
	}

	public function mtnJovenes()
	{
		$this->data['auth']			= $this->Sistema_model->MenuAutorizacion('Jovenes/listadoGeneral');
		$this->data['catNivel_O1']	= $this->Jovenes_model->verCatalogoEstudio('O1', null);
		$this->data['catNivel_O2']	= $this->Jovenes_model->verCatalogoEstudio('SEC', null);

		if($this->uri->segment(3) > 0){
			$id = $this->uri->segment(3);
			$this->data['datoPersonal'] = $this->Jovenes_model->verDatosxId($id);
			$this->data['datoEscolar']	= $this->Jovenes_model->verDatoEscolarxPersona($id);
			$this->data['datoLaboral']	= $this->Jovenes_model->verDatoTrabajoxPersona($id);
			$this->data['vista_cuerpo'] = 'jovenes/mtnjovenes_edit';
		}else{
			$this->data['vista_cuerpo'] = 'jovenes/mtnjovenes';
		}


		$this->load->view('viewbase', $this->data);
	}

	/*
	* INGRESO DE UNA NUEVA PERSONA
	*/
	public function guardarNuevaPersona()
	{
		$datopersonal = array(	'nombres' 			=> $this->input->post('iptNombres'),
								'apellidos' 		=> $this->input->post('iptApellidos'),
								'fechaNacimiento'	=> $this->input->post('iptFechaNacimiento'),
								'direccion'			=> $this->input->post('iptDireccion'),
								'sexo'				=> $this->input->post('iptSexo')
							);
		
		$idDatoPersonal = $this->Jovenes_model->insertDatoPersonal($datopersonal);

		switch ($this->input->post('iptNivelEstudio')) {
			case 'B-1':
              $iptCarrera = 'Primero Básico';
              break;

            case 'B-2':
              $iptCarrera = 'Segundo Básico';
              break;

            case 'B-3':
              $iptCarrera = 'Tercero Básico';
              break;

            default:
              $iptCarrera = $this->input->post('iptNombreCarreraEstudio');
              break;
		}
		$escolaridad = array(	'TipoNivel'			=> $this->input->post('iptTipoNivelEstudio'),
								'idJornada'			=> $this->input->post('iptJornadaEstudio'),
								'nombreCentro'		=> $this->input->post('iptNombreInstitucionEstudio'),
								'nivelEstudio'		=> $this->input->post('iptNivelEstudio'),
								'nombreCarrera'		=> $iptCarrera,
								'fechaInicio'		=> $this->input->post('iptFechaInicioEstudio'),
								'fechaFin'			=> $this->input->post('iptFechaFinEstudio'),
								'horaInicio'		=> $this->input->post('iptHoraInicioEstudio'),
								'horaFin'			=> $this->input->post('iptHoraFinEstudio'),
								'actual'			=> "on",
							);

		$this->Jovenes_model->insertDatoPersonal_Escolar($escolaridad, $idDatoPersonal);

		$trabajo = array('nombre'			=> $this->input->post('iptNombreTrabajo'),
						'puesto'			=> $this->input->post('iptPuestoTrabajo') ,
						'fechaInicio'		=> $this->input->post('iptFechaInicioTrabajo'),
						'horaInicio'		=> $this->input->post('iptHoraInicioTrabajo'),
						'horaFin'			=> $this->input->post('iptHoraFinTrabajo'),
						'horaInicioSabado'	=> $this->input->post('iptHoraInicioTrabajoSabado'),
						'horaFinSabado'		=> $this->input->post('iptHoraFinTrabajoSabado'),
						'sabado'			=> $this->input->post('iptSabado'),
						'actual'			=> 'on',
						);


		$this->Jovenes_model->insertDatoPersonal_Trabajo($trabajo, $idDatoPersonal);

		redirect('Jovenes/listadoGeneral', 'refresh');
	}
	public function listadoGeneral()
	{
		$this->data['vista_cuerpo']	= 'jovenes/listadoGeneral';
		$this->data['auth']			= $this->Sistema_model->MenuAutorizacion('Jovenes/listadoGeneral');
		$this->data['todosJovenes'] = $this->Jovenes_model->verListadoGeneral();
		$this->load->view('viewbase', $this->data);
	}

	/*
	* MANTENIMIENTO DE DATOS PERSONALES
	*/	
	public function actualizarDatoPersonal()
	{
		
        $foto = "";
        $message[] = "";
		$datopersonal = array(	'idDatoPersonal'	=> $this->input->post('iptIdDatoPersonal'),
								'nombres' 			=> $this->input->post('iptNombres'),
								'apellidos' 		=> $this->input->post('iptApellidos'),
								'fechaNacimiento'	=> $this->input->post('iptFechaNacimiento'),
								'direccion'			=> $this->input->post('iptDireccion'),
								'sexo'				=> $this->input->post('iptSexo'),
								'foto'				=> "",
							);

        //Variables para configuracion de subida de imagenes
		$config['upload_path']          = getcwd()."/resources/images/jovenes/";//base_url('/resources/images/jovenes/');
        $config['allowed_types']        = 'gif|jpg|png|JPG|jpeg';
        $config['max_size']             = 100;
        $config['max_width']            = 700;
        $config['max_height']           = 700;
        
        $this->load->library('upload', $config);

        if (empty($_FILES['iptFoto']['name'])) 
        {
        	$message = array('mensaje' 		=> 'Los datos se han actualizado correctamente.<br> No se detecto una imagen para subir', 
							 'class_span'	=> 'alert-success',
							 'encabezado'	=> 'Exito!'	
							);
		}else{
	    	//Validaciones para subir la imagen
	        if (!$this->upload->do_upload('iptFoto'))
	        {
	        	//echo "Error al subir fotos<br>";
	            $message = array('mensaje' 		=> $this->upload->display_errors(),
	        					 'class_span'	=> 'alert-danger',
	        					 'encabezado'	=> 'Error!'
	        					);
	        }
	        else
	        {
	            $data = array('upload_data' => $this->upload->data());
	            $datopersonal['foto'] = $data['upload_data']['file_name'];
	    		$message = array('mensaje' 		=> 'Los datos se han actualizado correctamente. <br>Imagen actualizada.', 
	    						 'class_span'	=> 'alert-success',
	    						 'encabezado'	=> 'Exito!'	
	    						);
	        }
		}

        $this->session->set_flashdata($message);
		$exito = $this->Jovenes_model->updateDatoPersonal($datopersonal);
		if($exito){
			redirect('Jovenes/mtnJovenes/'.$this->input->post('iptIdDatoPersonal'), 'refresh');
		}
	}

	//Busqueda de datos mediante ajax
	public function buscarDatoEstudioPersonal()
	{
		$data = array(	'idDatoPersonal'=> $this->input->get('idDatoPersonal'), 
						'idDato'		=> $this->input->get('idDatoEstudio')
					);

		$response = $this->Jovenes_model->buscarEstudioxId($data);

		echo json_encode($response);
	}

	public function buscarDatoTrabajoPersonal()
	{
		$data = array(	'idDatoPersonal'=> $this->input->get('idDatoPersonal'), 
						'idDato'		=> $this->input->get('idDatoTrabajo')
					);

		$response = $this->Jovenes_model->buscarTrabajoxId($data);

		echo json_encode($response);
	}

	//Actualización de datos mediante Ajax
	public function mtnDatosPersonales_Estudio()
	{
		$idEstudio = $this->input->post('iptIdEscolaridad');
		$idPersona = $this->input->post('iptIdDatoPersonal');
		$iptCarrera = "";
		switch ($this->input->post('iptNivelEstudio')) {
			case 'B-1':
              $iptCarrera = 'Primero Básico';
              break;

            case 'B-2':
              $iptCarrera = 'Segundo Básico';
              break;

            case 'B-3':
              $iptCarrera = 'Tercero Básico';
              break;

            default:
              $iptCarrera = $this->input->post('iptNombreCarreraEstudio');
              break;
		}

		$escolaridad = array(	'TipoNivel'			=> $this->input->post('iptTipoNivelEstudio'),
								'idJornada'			=> $this->input->post('iptJornadaEstudio'),
								'nombreCentro'		=> $this->input->post('iptNombreInstitucionEstudio'),
								'nivelEstudio'		=> $this->input->post('iptNivelEstudio'),
								'nombreCarrera'		=> $iptCarrera,
								'fechaInicio'		=> $this->input->post('iptFechaInicioEstudio'),
								'fechaFin'			=> $this->input->post('iptFechaFinEstudio'),
								'horaInicio'		=> $this->input->post('iptHoraInicioEstudio'),
								'horaFin'			=> $this->input->post('iptHoraFinEstudio'),
								'actual'			=> $this->input->post('iptActualEstudio'),
							);

		if($idEstudio == 0){
			$query = $this->Jovenes_model->insertDatoPersonal_Escolar($escolaridad, $idPersona);
		}else{
			$query = $this->Jovenes_model->updateDatoPersonal_Escolar($escolaridad, $idPersona, $idEstudio);
		}
		
		
		if($query){
			$data = $this->Jovenes_model->verDatoEscolarxPersona($idPersona);
			$tbody = "";
			foreach ($data as $estudio) 
			{
				$tbody = $tbody."<tr>
							 		<td>
							 			<button id='btnEditarEstudio' class='btn btn-dark btn-sm' onClick='buscarDatoxId(1, $estudio->id_datop_escolar, ".$idPersona.")'>
							 				<i class='fas fa-edit'></i>
							 			</button>";
				if($estudio->actual == 1) { $tbody = $tbody . " <span class='badge badge-warning'> Actual</span>"; }
				$tbody = $tbody."</td>
									<td>$estudio->nombre_tipo_nivel</td>
									<td>$estudio->nombrecarrera</td>
									<td>$estudio->nombre_centroestudios</td>
									<td>$estudio->fechainicio - $estudio->fechafin</td>
								</tr>";
		}

			//	$tbody = $tbody . "</tbody>";
			echo json_encode($tbody);
		}else{
			echo json_encode("<tr><td colspan='5' class='text-center mt-3'><b>Hubo un error al guardar la información, por favor presione F5</b></td></tr>");
		}
	}

	public function mtnDatosPersonales_Trabajo()
	{
		$idTrabajo = $this->input->post('iptIdTrabajo');
		$idPersona = $this->input->post('iptIdDatoPersonal');
		
		
		$trabajo = array('nombre'			=> $this->input->post('iptNombreTrabajo'),
						'puesto'			=> $this->input->post('iptPuestoTrabajo') ,
						'fechaInicio'		=> $this->input->post('iptFechaInicioTrabajo'),
						'fechaFin'			=> $this->input->post('iptFechaFinTrabajo'),
						'horaInicio'		=> $this->input->post('iptHoraInicioTrabajo'),
						'horaFin'			=> $this->input->post('iptHoraFinTrabajo'),
						'horaInicioSabado'	=> $this->input->post('iptHoraInicioTrabajoSabado'),
						'horaFinSabado'		=> $this->input->post('iptHoraFinTrabajoSabado'),
						'sabado'			=> $this->input->post('iptSabado'),
						'actual'			=> $this->input->post('iptActualTrabajo'),
						);
		if($idTrabajo == 0){
			$query = $this->Jovenes_model->insertDatoPersonal_Trabajo($trabajo, $idPersona);
		}else{
			$query = $this->Jovenes_model->updateDatoPersonal_Trabajo($trabajo, $idPersona, $idTrabajo);
		}

		if($query){
			$data = $this->Jovenes_model-> verDatoTrabajoxPersona($idPersona);
			$tbody = "";
			foreach ($data as $trabajo) 
			{
				$tbody = $tbody."<tr>
							 		<td>
							 			<button id='btnEditarEstudio' class='btn btn-dark btn-sm' onClick='buscarDatoxId(2, $trabajo->id_datop_trabajo, ".$idPersona.")'>
							 				<i class='fas fa-edit'></i>
							 			</button>";
				if($trabajo->actual == 1) { $tbody = $tbody . " <span class='badge badge-warning'> Actual</span>"; }
				$tbody = $tbody."</td>
									<td>$trabajo->nombre_trabajo</td>
									<td>$trabajo->puesto</td>
									<td>$trabajo->fechainicio - $trabajo->fechafin</td>
								</tr>";
			}
	
			echo json_encode($tbody);
		}else{
			echo json_encode("<tr><td colspan='5' class='text-center mt-3'><b>Hubo un error al guardar la información, por favor presione F5</b></td></tr>");
		}
	}

}
