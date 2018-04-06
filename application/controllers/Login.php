<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	 function __construct() {
        parent::__construct();
        $this->load->model('Login_model');
    }

	public function index()
	{
			  
		$this->load->view('inicio/login');
	}

	public function validarDatosLogin()
	{
		//$this->session->unset_userdata($array_items);
		$dataLogin = array(	'usuario' => $this->input->post('inputEmail'), 
							'password'=> $this->input->post('inputPassword')
						);

		
		$valida = $this->Login_model->dbValidaLogin($dataLogin);
		if(isset($valida))
		{
			$sessionData['ID_USERNAME']  = $valida->id_usuario;
			$sessionData['USERNAME']  	= $valida->usuario;
			$sessionData['ROL_USUARIO']	= $valida->id_rol;
			
			$this->session->set_userdata($sessionData);
			
			redirect('Inicio', 'refresh');
			
			//$this->session->unset_userdata($sessionData);
		}else{
			redirect('Login', 'refresh');
		}

	}

	public function cerrarSession()
	{	
		//session_destroy();

		$sessionData['ID_USERNAME'] = $_SESSION['ID_USERNAME'];
		$sessionData['USERNAME'] 	= $_SESSION['USERNAME'];
		$sessionData['ROL_USUARIO'] = $_SESSION['ROL_USUARIO'];

		$this->session->unset_userdata($sessionData);

		redirect('Login', 'refresh');
	}


}
