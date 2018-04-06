<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jovenes extends CI_Controller 
{
	 function __construct() {
        parent::__construct();

        if(isset($_SESSION['ID_USERNAME'])){
	        $this->load->model('Sistema_model');
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
		$this->data['vista_cuerpo'] = 'jovenes/mtnjovenes';
		$this->load->view('viewbase', $this->data);
	}

	public function guardarNuevaPersona()
	{
		$datopersonal = array(	'nombres' 			=> $this->input->post('iptNombres'),
								'apellidos' 		=> $this->input->post('iptApellidos'),
								'fechaNacimiento'	=> $this->input->post('iptFechaNacimiento'),
								'direccion'			=> $this->input->post('iptDireccion')
							);

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

		$trabajo = array('nombre'			=> $this->input->post('iptNombreTrabajo'),
						'puesto'			=> $this->input->post('iptPuestoTrabajo') ,
						'fechaInicio'		=> $this->input->post('iptFechaInicioTrabajo'),
						'horaInicio'		=> $this->input->post('iptHoraInicioTrabajo'),
						'horaFin'			=> $this->input->post('iptHoraFinTrabajo'),
						'horaInicioSábado'	=> $this->input->post('iptHoraInicioTrabajoSabado'),
						'horaFinSábado'		=> $this->input->post('iptHoraFinTrabajoSabado'),
						);

		echo "<pre>";
		print_r($datopersonal);
		print_r($escolaridad);
		print_r($trabajo);
		echo "</pre>";
	}
	public function listadoGeneral()
	{
		$this->data['vista_cuerpo']	= 'jovenes/listadoGeneral';
		$this->data['auth']			= $this->Sistema_model->MenuAutorizacion('Jovenes/listadoGeneral');
		$this->load->view('viewbase', $this->data);
	}	

}
