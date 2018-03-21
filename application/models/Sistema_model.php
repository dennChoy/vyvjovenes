<?php
class Sistema_model extends CI_Model
{
	function __construct() 
	{
        parent::__construct();
    }
	/* * * * * * * * * * * * * * * * *
	* * * * * * * R O L * * * * * * *
	* * * * * * * * * * * * * * * * */
	//Muestra todos los roles disponibles par su mantenimiento
	public function listarRoles()
	{	
		return $this->db->get('rol_usuario')->result();	
	}

	//Muestra los roles activos para asignarlos a un usuario
	public function listarRolesActivos()
	{
		return $this->db->get_where('rol_usuario', array('activo' => 1))->result();
	}

	public function listarRol($idRol)
	{
		return $this->db->get_where('rol_usuario', array('id_rol_usuario' => $idRol))->result();
	}

	public function insertRol($data)
	{
		$rolActivo = $data['activo'] === 'on'? true: false;
		$dbData = array('nombre_rol' => $data['rol'],
						'motivo_rol' => $data['motivoRol'], 
						'activo'	 => $rolActivo,
						);
		if($this->db->insert('rol_usuario', $dbData))
		{
			return true;
		}
	}

	public function updateRol($data)
	{
		$rolActivo = $data['activo'] === 'on'? true: false;
		$dbData = array('nombre_rol' => $data['rol'],
						'motivo_rol' => $data['motivoRol'], 
						'activo'	 => $rolActivo,
						);

		$query = $this->db
						->where('id_rol_usuario', $data['idrol'])
						->update('rol_usuario', $dbData);
		if($query)
		{
			return true;
		}
	}

	/* * * * * * * * * * * * * * * * * * * 
	* * * * * * U S U A R I O * * * * * * *
	* * * * * * * * * * * * * * * * * * * */
	public function verUsuarios()
	{
		return $this->db
					->select('u.idusuario, u.usuario, u.correo, u.activo, ru.nombre_rol')
					->from('usuario u')
					->join('rol_usuario ru', 'u.id_rol = ru.id_rol_usuario')
					->get()
					->result();

	}

	public function insertUser($data)
	{
		$activo = $data['activo'] === 'on'? true: false;
		$dbData = array('usuario' => $data['usuario'],
						'id_rol'  => $data['rol'], 
						'correo'  => $data['correo'], 
						'activo'  => $activo,
						);

		if($this->db->insert('usuario', $dbData))
		{
			return true;
		}
	}

	public function updateUser($data)
	{
		$activo = $data['activo'] === 'on'? true: false;
		$dbData = array('usuario' => $data['usuario'],
						'id_rol'  => $data['rol'], 
						'correo'  => $data['correo'], 
						'activo'  => $activo,
						);
	
		$query = $this->db
						->where('id_usuario', $data['idUsuario'])
						->update('usuario', $dbData);
		if($query)
		{
			return true;
		}
	}
}

?>