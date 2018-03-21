<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller 
{

	public function index()
	{
		//$this->load->model('Test_model');
		$data = array(	'auth' 			=>  1,
						'vista_menu'	=> 'menubase',
						'vista_cuerpo'	=> 'inicio/cuerpo',
						//'dbdata'		=> $this->Test_model->sayHola()
					  );
		$this->load->view('viewbase', $data);
	}
}
