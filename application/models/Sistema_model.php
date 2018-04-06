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

	//Muestra roles x usuarios - mtnMenu
	//Es llamdo por ajax y se devuelve mediante json
	public function verMenuxRol($idOpcion)
	{
		$query = "SELECT ru.id_rol_usuario, nombre_rol, activo = 1
					FROM rol_usuario ru
					LEFT JOIN rol_menu_usuario rmu ON ru.id_rol_usuario = rmu.id_rol_usuario
					WHERE rmu.id_opcion_menu = $idOpcion AND ru.activo = 1";
		return $this->db->query($query)->result();
					

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
					->select('u.id_usuario, u.usuario, u.correo, u.activo, ru.nombre_rol')
					->from('usuario u')
					->join('rol_usuario ru', 'u.id_rol = ru.id_rol_usuario')
					->get()
					->result();

	}

	public function verUsuario($idUsuario)
	{
		return $this->db
					->select('u.id_usuario, u.usuario, u.correo, u.activo, u.id_rol, ru.nombre_rol')
					->from('usuario u')
					->join('rol_usuario ru', 'u.id_rol = ru.id_rol_usuario')
					->where('u.id_usuario', $idUsuario)
					->get()
					->row();

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

	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
	* * * * * * * * * * * * M E N Ú * * * * * * * * * * * *
	* * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

	public function verOpcionesMenu()
	{
		return $this->db
					->select('m.id_opcion, m.nombre_opcion, m.parent, mp.nombre_opcion as nombre_parent, m.path, m.activo,
							(SELECT COUNT(parent) FROM menu WHERE parent = m.id_opcion) as submenu')
					->from('menu m')
					->join('menu mp', 'm.id_parent = mp.id_opcion', 'left')
					->get()
					->result();	
	}

	public function verOpcionPadre()
	{
		return $this->db->get_where('menu', array('parent' => 1, 'activo' => 1))->result();
	}

	public function verOpcion($idOpcion)
	{
		return $this->db
					->select('*')
					->from('menu')
					->where('id_opcion', $idOpcion)
					->get()
					->row();	
	}

	public function insertOpcionMenu($data)
	{
		$activo = $data['activo'] === 'on'? true: false;
		$parent = $data['parent'] === 'on'? true: false;

		$dbData = array('nombre_opcion' 	=> $data['nombreOpcion'],
						'parent'  		=> $parent, 
						'path'  		=> $data['path'], 
						'id_parent'		=> $data['idParent'],
						'activo'  		=> $activo,
						);

		if($this->db->insert('menu', $dbData))
		{
			if($parent == true)
			{
				//Si es opción padre acutaliza el campo idparent con el id que se acaba de insertar
				$insert_id = $this->db->insert_id();
				$updateID = array('id_parent' => $insert_id);

				$this->db->where('id_opcion', $insert_id)->update('menu', $updateID);
			}
			return true;
		}
	}

	public function updateOpcionMenu($data)
	{
		$activo = $data['activo'] === 'on'? true: false;
		$parent = $data['parent'] === 'on'? true: false;


		$idParent = $data['parent'] === 'on'? $data['idOpcionMenu']: $data['idParent'];
		$dbData = array('nombre_opcion' => $data['nombreOpcion'],
						'parent' 	  	=> $parent, 
						'id_parent' 	=> $idParent, 
						'path'  	  	=> $data['path'], 
						'activo' 	  	=> $activo,
						);

		$query = $this->db
						->where('id_opcion', $data['idOpcionMenu'])
						->update('menu', $dbData);
		if($query)
		{
			return true;
		}
	}

	public function insertMenuxRol($data)
	{
		//Elimina todos los roles de la opción
		$this->db->delete('rol_menu_usuario', array('id_opcion_menu' => $data['idMenu'])); 

		//Proceso para insertar los nuevos roles
		$dbData['id_opcion_menu'] = $data['idMenu'];

		if(isset($data['roles']))
		{
			foreach ($data['roles'] as $key => $value) 
			{
				$dbData['id_rol_usuario'] = $key;
				$this->db->insert('rol_menu_usuario', $dbData);
			}		
		}
	
	}
	
	/****************** CARGA MENÚ DEL SISTEMA ****************/

	public function cargaMenu()
	{ 
		/*
		* Carga el menú según el rol del usuario en session. 
		*/
		return $this->db
					->select('m.id_opcion, m.nombre_opcion, m.parent, mp.nombre_opcion as nombre_parent, m.path, m.activo,
							(SELECT COUNT(id_parent) FROM menu sm 
								INNER JOIN rol_menu_usuario rmusm ON sm.id_opcion = rmusm.id_opcion_menu 
								WHERE sm.id_parent = m.id_opcion AND sm.parent = 0 AND sm.activo = 1
								and rmusm.id_rol_usuario = '.$_SESSION['ROL_USUARIO'].') as submenu')
					->from('menu m')
					->join('menu mp', 'm.id_parent = mp.id_opcion', 'left')
					->join('rol_menu_usuario rmu', 'm.id_opcion = rmu.id_opcion_menu')
					->where('m.activo', 1)
					->where('rmu.id_rol_usuario', $_SESSION['ROL_USUARIO'])
					->where('m.id_parent IN (SELECT mm.id_opcion
											FROM menu mm
											INNER JOIN rol_menu_usuario rmum ON mm.id_opcion = rmum.id_opcion_menu
											WHERE mm.activo = 1
											AND rmum.id_rol_usuario = '.$_SESSION['ROL_USUARIO'].'
											AND mm.id_opcion = m.id_parent)', NULL, FALSE)
					//->order_by('mp.id_parent, m.parent DESC')
					->get()
					->result();	
	}

	public function MenuAutorizacion($path){
		return $this->db
					->select('1 as auth')
					->from('rol_menu_usuario rmu')
					->join('menu m','rmu.id_opcion_menu = m.id_opcion')
					->where('rmu.id_rol_usuario', $_SESSION['ROL_USUARIO'])
					->where('m.activo', 1)
					->where('m.path', 'index.php/'.$path)
					->get()
					->row();
	}
}

?>