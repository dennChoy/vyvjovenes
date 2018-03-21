<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sistema extends CI_Controller 
{
	 function __construct() {
        parent::__construct();
        $this->load->model('Sistema_model');
    }

	/**************************************************************
	*************************************************************
						U S U A R I O S
	*************************************************************
	*************************************************************
	*/
	public function mtnUsuario()
	{
		
		$data = array(	'auth' 			=>  1,
						'vista_menu'	=> 'menubase',
						'vista_cuerpo'	=> 'Sistema/usuarios',
						'roles'			=> $this->Sistema_model->listarRolesActivos(),
						'sysUsers'		=> $this->Sistema_model->verUsuarios(),
						//'dbdata'		=> $this->Test_model->sayHola()
					  );
		$this->load->view('viewbase', $data);
	}

	public function guardarUsuario()
	{
		$dbData = array('idUsuario' => $this->input->post('iptIdUsuario'),
						'usuario'	=> $this->input->post('iptUsuario'),
						'correo'  	=> $this->input->post('iptMail'),
						'activo'  	=> $this->input->post('iptActivo'),
						'rol'	  	=> $this->input->post('iptRol')	
						);

		if($this->input->post('iptIdUsuario')==0){
			$exitoDB = $this->Sistema_model->insertUser($dbData);
		}else{
			$exitoDB = $this->Sistema_model->updateUser($dbData);
		}
		
		if($exitoDB == true){
			redirect('Sistema/mtnUsuario', 'refresh');
		}else{
			echo "fracaso";
		}
	}

	/**************************************************************
	*************************************************************
							R O L E S
	*************************************************************
	*************************************************************
	*/
	public function mtnRol()
	{
		$data = array(	'auth' 			=>  1,
						'vista_menu'	=> 'menubase',
						'vista_cuerpo'	=> 'Sistema/rol',
						'sysRol'		=> $this->Sistema_model->listarRoles(),
						'registroRol'	=> $this->Sistema_model->listarRol($this->uri->segment(3)),
					  );
		
		$this->load->view('viewbase', $data);
	}

	public function guardarRol()
	{
		$dbData =  array(	'idrol' 	=> $this->input->post('iptCodigoRol'), 
							'rol'		=> $this->input->post('iptRol'),
							'motivoRol' => $this->input->post('iptMotivoRol'),
							'activo'	=> $this->input->post('iptActivo'),
							
						);
		
		if($this->input->post('iptCodigoRol')==0){
			$exitoDB = $this->Sistema_model->insertRol($dbData);
		}else{
			$exitoDB = $this->Sistema_model->updateRol($dbData);
		}
		
		if($exitoDB == true){
			redirect('Sistema/mtnRol', 'refresh');
		}else{
			echo "fracaso";
		}
		
	}

	/**************************************************************
	*************************************************************
				O P C I O N E S   D E L   M E N Ú
	*************************************************************
	*************************************************************
	*/
	public function mtnMenu()
	{
		$data = array(	'auth' 			=>  1,
						'vista_menu'	=> 'menubase',
						'vista_cuerpo'	=> 'Sistema/rol',
						//'dbdata'		=> $this->Test_model->sayHola()
					  );
		$this->load->view('viewbase', $data);
	}
}

?>