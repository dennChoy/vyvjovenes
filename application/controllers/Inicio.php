<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller 
{
	 function __construct() {
        parent::__construct();

        if(isset($_SESSION['ID_USERNAME'])){
	        $this->load->model('Sistema_model');
	        $this->data = array('menuPadre' => $this->Sistema_model->cargaMenu(),
						    	'vista_menu'=> 'menubase',
						    	'mnActive'	=> 1,//id_menu_opcion de Sistema
	    						);	
	    }else{
	    	redirect('Login', 'refresh');
	    }
    }

	public function index()
	{
		/*foreach($_SESSION as $valor => $value)
		{
			echo $valor.'->'.$value.'<br>';
		}*/
		
		$this->data['auth']			= $this->Sistema_model->MenuAutorizacion('Inicio')->auth;
		$this->data['vista_menu']	= 'menubase';
		$this->data['vista_cuerpo']	= 'inicio/cuerpo';
		
		$this->load->view('viewbase', $this->data);
	}	
}
