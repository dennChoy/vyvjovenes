<?php
class Jovenes_model extends CI_Model
{
	function __construct() 
	{
        parent::__construct();
    }

	public function insertDatoPersonal($data)
	{
		$DBdate = DateTime::createFromFormat('d/m/Y', $data['fechaNacimiento']);
		
		$dbData = array('nombres' 				=> $data['nombres'] ,
						'apellidos' 			=> $data['apellidos'],
						'fecha_nacimiento'		=> $DBdate->format('Y-m-d'),
						'direccion_residencia'	=> $data['direccion'],
						'sexo'					=> $data['sexo']
					);

		$this->db->insert('datopersonal', $dbData);
		$insert_id = $this->db->insert_id();
   		return $insert_id;
	}

	public function insertDatoPersonal_Escolaridad($estudio, $idDato)
	{
		$carrera = $estudio['nombreCarrera'] === '' ? $estudio['nivelSecundario'] : $estudio['nombreCarrera'];
		if($estudio['nombreCentro'] != "")
		{
			$dbData = array('id_datopersonal'		=> $idDato,
							'id_nivel_escolaridad' 	=> $estudio['idNivel'],
							'nombre_centroestudios' => $estudio['nombreCentro'],
							'nombrecarrera'			=> $carrera,
							'id_jornada'			=> $estudio['idJornada'],
							'fechainicio'			=> $estudio['horaInicio'],
							'fechafin'				=> $estudio['fechaFin'],
							'horainicio'			=> $estudio['horaInicio'],
							'horafin'				=> $estudio['horaFin']
							);
			$this->db->insert('datop_escolaridad', $dbData);

		}
	}

	public function insertDatoPersonal_Trabajo($trabajo, $idDato)
	{
		$DBdate_Inicio = DateTime::createFromFormat('d/m/Y', $trabajo['fechaInicio']);

		if($trabajo['nombre'] != "")
		{
			$dbData = array('id_datopersonal'	=> $idDato, 
							'nombre_trabajo'	=> $trabajo['nombre'],
							'puesto'			=> $trabajo['puesto'],
							'fechainicio'		=> $DBdate_Inicio->format('Y-m-d'),
							'horainicio'		=> $trabajo['horaInicio'],
							'horafin'			=> $trabajo['horaFin'],
							'horainicio_sabado'	=> $trabajo['horaInicioSabado'],
							'horafin_sabado'	=> $trabajo['horaFinSabado'],
							);
			$this->db->insert('datop_trabajo', $dbData);
		}
	}

	public function updateDatoPersonal($data)
	{
		$DBdate = DateTime::createFromFormat('d/m/Y', $data['fechaNacimiento']);
		
		$dbData = array('nombres' 				=> $data['nombres'] ,
						'apellidos' 			=> $data['apellidos'],
						'fecha_nacimiento'		=> $DBdate->format('Y-m-d'),
						'direccion_residencia'	=> $data['direccion'],
						'sexo'					=> $data['sexo']
					);

		$idDatoPersonal = $data['idDatoPersonal'];

		$query = $this->db
						->where('id_datopersonal', $idDatoPersonal)
						->update('datopersonal', $dbData);
		if($query){
   			return true;
		}else{
			return false;
		}
	}
	public function updateDatoPersonal_Escolaridad($estudio, $idPersona, $idDato)
	{

		$carrera = $estudio['nombreCarrera'] === '' ? $estudio['nivelSecundario'] : $estudio['nombreCarrera'];
		if($estudio['nombreCentro'] != "")
		{
			$dbData = array('id_datopersonal'		=> $idDato,
							'id_nivel_escolaridad' 	=> $estudio['idNivel'],
							'nombre_centroestudios' => $estudio['nombreCentro'],
							'nombrecarrera'			=> $carrera,
							'id_jornada'			=> $estudio['idJornada'],
							'fechainicio'			=> $estudio['horaInicio'],
							'fechafin'				=> $estudio['fechaFin'],
							'horainicio'			=> $estudio['horaInicio'],
							'horafin'				=> $estudio['horaFin']
							);

			$query = $this->db->where('id_datop_escolaridad', $idDato)
							 ->where('id_datopersonal', $idPersona)
							 ->update('datop_escolaridad', $dbData);

			if($query){
				return true;
			}else{
				return false;
			}
		}
	}

	

	public function verListadoGeneral()
	{
		return $this->db->get('vw_datopersonal')->result();
	}

	/***
	***
	*** BUSCA INFROMACÓN POR ID
	***
	***/
	public function verDatosxId($id)
	{
		return $this->db->get_where('datopersonal', array('id_datopersonal' => $id, ))->row();
	}

	public function verDatoEscolarxPersona($id)
	{
		return $this->db->get_where('datop_escolaridad', array('id_datopersonal' => $id ))->result();
	}

	public function verDatoLaboralxPersona($id)
	{
		return $this->db->get_where('datop_trabajo', array('id_datopersonal' => $id ))->result();	
	}

	public function buscarDatoEstudioPersonal($data)
	{
		return $this->db->select('*')
						->from('datop_escolaridad')
						->where('id_datopersonal', $data['idDatoPersonal'])
						->where('id_datop_escolaridad', $data['idDato'])
						->get()
						->row();
	}
}