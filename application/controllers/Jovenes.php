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
				
		if($this->uri->segment(3) > 0){
			$id = $this->uri->segment(3);
			$this->data['datoPersonal'] = $this->Jovenes_model->verDatosxId($id);
			$this->data['datoEscolar']	= $this->Jovenes_model->verDatoEscolarxPersona($id);
			$this->data['datoLaboral']	= $this->Jovenes_model->verDatoLaboralxPersona($id);
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

		$escolaridad = array(	'idNivel'			=> $this->input->post('iptIdNivelEstudio'),
								'idJornada'			=> $this->input->post('iptJornadaEstudio'),
								'nombreCentro'		=> $this->input->post('iptNombreInstitucionEstudio'),
								'nivelSecundario'	=> $this->input->post('iptNivelSecundario'),
								'nombreCarrera'		=> $this->input->post('iptNombreCarreraEstudio'),
								'fechaInicio'		=> $this->input->post('iptFechaInicioEstudio'),
								'fechaFin'			=> $this->input->post('iptFechaFinEstudio'),
								'horaInicio'		=> $this->input->post('iptHoraInicioEstudio'),
								'horaFin'			=> $this->input->post('iptHoraFinEstudio')
							);

		$this->Jovenes_model->insertDatoPersonal_Escolaridad($escolaridad, $idDatoPersonal);

		$trabajo = array('nombre'			=> $this->input->post('iptNombreTrabajo'),
						'puesto'			=> $this->input->post('iptPuestoTrabajo') ,
						'fechaInicio'		=> $this->input->post('iptFechaInicioTrabajo'),
						'horaInicio'		=> $this->input->post('iptHoraInicioTrabajo'),
						'horaFin'			=> $this->input->post('iptHoraFinTrabajo'),
						'horaInicioSabado'	=> $this->input->post('iptHoraInicioTrabajoSabado'),
						'horaFinSabado'		=> $this->input->post('iptHoraFinTrabajoSabado'),
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
	public function buscarDatoEstudioPersonal()
	{
		$data = array(	'idDatoPersonal'=> $this->input->get('idDatoPersonal'), 
						'idDato'		=> $this->input->get('idDatoEstudio')
					);

		$response = $this->Jovenes_model->buscarDatoEstudioPersonal($data);

		echo json_encode($response);
	}

	public function actualizarDatoPersonal()
	{
		$datopersonal = array(	'idDatoPersonal'	=> $this->input->post('iptIdDatoPersonal'),
								'nombres' 			=> $this->input->post('iptNombres'),
								'apellidos' 		=> $this->input->post('iptApellidos'),
								'fechaNacimiento'	=> $this->input->post('iptFechaNacimiento'),
								'direccion'			=> $this->input->post('iptDireccion'),
								'sexo'				=> $this->input->post('iptSexo')
							);
		
		$exito = $this->Jovenes_model->updateDatoPersonal($datopersonal);
		if($exito){
			redirect('Jovenes/mtnJovenes/'.$this->input->post('iptIdDatoPersonal'), 'refresh');
		}
	}

	public function mtnDatosPersonales_Estudio()
	{
		$idEstudio = $this->input->post('iptIdEscolaridad');
		$idPersona = $this->input->post('iptIdDatoPersonal');
		
		$escolaridad = array(	'idNivel'			=> $this->input->post('iptIdNivelEstudio'),
								'idJornada'			=> $this->input->post('iptJornadaEstudio'),
								'nombreCentro'		=> $this->input->post('iptNombreInstitucionEstudio'),
								'nivelSecundario'	=> $this->input->post('iptNivelSecundario'),
								'nombreCarrera'		=> $this->input->post('iptNombreCarreraEstudio'),
								'fechaInicio'		=> $this->input->post('iptFechaInicioEstudio'),
								'fechaFin'			=> $this->input->post('iptFechaFinEstudio'),
								'horaInicio'		=> $this->input->post('iptHoraInicioEstudio'),
								'horaFin'			=> $this->input->post('iptHoraFinEstudio')
							);

		if($idEstudio == 0){
			$query = $this->Jovenes_model->insertDatoPersonal_Escolaridad($escolaridad, $idPersona);
		}else{
			$query = $this->Jovenes_model->updateDatoPersonal_Escolaridad($escolaridad, $idPersona, $idEstudio);
		}
		
		
		if($query){
			$data = $this->Jovenes_model->verDatoEscolarxPersona($idPersona);
			$tbody = "";
			foreach ($data as $estudio) 
			{
				$tbody = $tbody."<tr>
						 		<td>
						 			<button id='btnEditarEstudio' class='btn btn-dark btn-sm' onClick='buscarDatoxId(1, $estudio->id_datop_escolaridad, ".$this->uri->segment(3).")'>
						 				<i class='fas fa-edit'></i>
						 			</button>
						 		</td>
								<td>$estudio->id_nivel_escolaridad</td>
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
}
