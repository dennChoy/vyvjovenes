<?php
class Login_model extends CI_Model
{
	function __construct() 
	{
        parent::__construct();
    }

    /******************* LOGIN *****************/
	public function dbValidaLogin($dataLogin)
	{
		$login = array( 'correo' 	=> $dataLogin['usuario'],
						'password' 	=> $dataLogin['password'],
						'activo'	=> 1	
					  );

		return  $this->db->select('id_usuario, usuario, id_rol, correo')->get_where('usuario', $login )->row();
	}
}