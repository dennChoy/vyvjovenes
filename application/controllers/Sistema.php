<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sistema extends CI_Controller 
{
	 function __construct() {
        parent::__construct();
        if(isset($_SESSION['ID_USERNAME'])){
	        $this->load->model('Sistema_model');
	       
	        $this->data = array('menuPadre' => $this->Sistema_model->cargaMenu(),
						    	'vista_menu'=> 'menubase',
						    	'mnActive'	=> 2,//id_menu_opcion de Sistema
	    						);	
        }else{
        	redirect('Login', 'refresh');
        }
    }

	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
	** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
									U S U A R I O S
	** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	*/
	public function mtnUsuario()
	{
		$this->data['auth']			= $this->Sistema_model->MenuAutorizacion('Sistema/mtnUsuario');
		$this->data['vista_cuerpo']	= 'Sistema/usuarios';
		$this->data['roles']		= $this->Sistema_model->listarRolesActivos();
		$this->data['sysUsers']		= $this->Sistema_model->verUsuarios();
        
		$this->load->view('viewbase', $this->data);
	}

	public function buscarUsuario()
	{
		$usuario = $this->Sistema_model->verUsuario($this->uri->segment(3));

		echo json_encode($usuario);		
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
		$this->data['auth']			= $this->Sistema_model->MenuAutorizacion('Sistema/mtnRol');
		$this->data['vista_cuerpo']	= 'Sistema/rol';
		$this->data['sysRol']		= $this->Sistema_model->listarRoles();
		$this->data['registroRol']	= $this->Sistema_model->listarRol($this->uri->segment(3));
		
		$this->load->view('viewbase', $this->data);
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
		$this->data['auth']			= $this->Sistema_model->MenuAutorizacion('Sistema/mtnMenu');
		$this->data['vista_cuerpo']	 = 'Sistema/menu';
		$this->data['sysOpcion']	 = $this->Sistema_model->verOpcionesMenu();
		$this->data['sysOpcionPadre']= $this->Sistema_model->verOpcionPadre();
		$this->data['sysRol']		 = $this->Sistema_model->listarRolesActivos();
					  
		$this->load->view('viewbase', $this->data);
	}

	public function buscarOpcion()
	{
		$opcion = $this->Sistema_model->verOpcion($this->uri->segment(3));	
		echo json_encode($opcion);
	}

	public function buscarMenuxRol()
	{
		$opcion = $this->Sistema_model->verMenuxRol($this->uri->segment(3));
		echo json_encode($opcion);
	}

	public function guardarOpcionMenu()
	{
		$dbData = array('idOpcionMenu'	=> $this->input->post('iptIdMenu'),
						'nombreOpcion'	=> $this->input->post('iptNombreMenu'),
						'parent'  		=> $this->input->post('iptParent'),
						'idParent'  	=> $this->input->post('iptIdParent'),
						'path'  		=> $this->input->post('iptPath'),
						'activo'	  	=> $this->input->post('iptActivo')	
						);

		if($this->input->post('iptIdMenu')==0){
			$exitoDB = $this->Sistema_model->insertOpcionMenu($dbData);
		}else{
			$exitoDB = $this->Sistema_model->updateOpcionMenu($dbData);
		}
		
		
		if($exitoDB == true){
			redirect('Sistema/mtnMenu', 'refresh');
		}else{
			echo "fracaso";
		}
		
	}

	public function guardarMenuxRol()
	{
		$dbData = array('idMenu' 	=> $this->input->post('iptIdMenuRol'),
						'roles'		=> $this->input->post('chkRoles'),
						);
		$this->Sistema_model->insertMenuxRol($dbData);
		redirect('Sistema/mtnMenu', 'refresh');
	}
}

?>