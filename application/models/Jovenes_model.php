<?php
class Jovenes_model extends CI_Model
{
	function __construct() 
	{
        parent::__construct();
    }

  	function FormatoDBFecha($StringDate)
  	{	
  		if($StringDate!= ""){
	  		$date = str_replace('/', '-', $StringDate);
	  		return date('Y-m-d', strtotime($date));
  		}else{
  			return '1900-01-01';
  		}
  	}
	public function insertDatoPersonal($data)
	{
		$dbData = array('nombres' 				=> $data['nombres'] ,
						'apellidos' 			=> $data['apellidos'],
						'fecha_nacimiento'		=> $this->FormatoDBFecha($data['fechaNacimiento']),
						'direccion_residencia'	=> $data['direccion'],
						'sexo'					=> $data['sexo']
					);

		$this->db->insert('datopersonal', $dbData);
		$insert_id = $this->db->insert_id();
   		return $insert_id;
	}

	public function insertDatoPersonal_Escolar($estudio, $idDato)
	{
		//$carrera = $estudio['nombreCarrera'] === '' ? $estudio['nivelEstudio'] : $estudio['nombreCarrera'];
		$actual = $estudio['actual'] === 'on'? true: false;
		if($estudio['nombreCentro'] != "")
		{
			$dbData = array('id_datopersonal'		=> $idDato,
							'tipo_nivel_escolar'	=> $estudio['TipoNivel'],
							'nombre_centroestudios' => $estudio['nombreCentro'],
							'nombrecarrera'			=> $estudio['nombreCarrera'],
							'id_jornada'			=> $estudio['idJornada'],
							'fechainicio'			=> $this->FormatoDBFecha($estudio['fechaInicio']),
							'fechafin'				=> $this->FormatoDBFecha($estudio['fechaFin']),
							'horainicio'			=> $estudio['horaInicio'],
							'horafin'				=> $estudio['horaFin'],
							'actual'				=> $actual,
							);
			$query = $this->db->insert('datop_escolar', $dbData);

			if($query){
				return true;
			}else{
				return false;
			}

		}
	}

	public function insertDatoPersonal_Trabajo($trabajo, $idDato)
	{
		//$dateInicio = str_replace('/', '-', $trabajo['fechaInicio']);
		$sabado = $trabajo['sabado'] === 'on'? true: false;
		$actual = $trabajo['actual'] === 'on'? true: false;
		if($trabajo['nombre'] != "")
		{
			$dbData = array('id_datopersonal'	=> $idDato, 
							'nombre_trabajo'	=> $trabajo['nombre'],
							'puesto'			=> $trabajo['puesto'],
							'fechainicio'		=> $this->FormatoDBFecha($trabajo['fechaInicio']),	
						//	'fechafin'			=> $this->FormatoDBFecha($trabajo['fechaFin']),
							'horainicio'		=> $trabajo['horaInicio'],
							'horafin'			=> $trabajo['horaFin'],
							'sabado'			=> $sabado,
							'horainicio_sabado'	=> $trabajo['horaInicioSabado'],
							'horafin_sabado'	=> $trabajo['horaFinSabado'],
							'actual'			=> $actual,
							);
			$query = $this->db->insert('datop_trabajo', $dbData);

			if($query){
				return true;
			}else{
				return false;
			}
		}
	}

	public function updateDatoPersonal($data)
	{
		$dbData = array('nombres' 				=> $data['nombres'] ,
						'apellidos' 			=> $data['apellidos'],
						'fecha_nacimiento'		=> $this->FormatoDBFecha($data['fechaNacimiento']),
						'direccion_residencia'	=> $data['direccion'],
						'sexo'					=> $data['sexo'],
						//'foto'					=> $data['foto'],
					);
		if($data['foto'] != "")
		{
			$dbData['foto'] = $data['foto'];
		}

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
	public function updateDatoPersonal_Escolar($estudio, $idPersona, $idDato)
	{
		$actual = $estudio['actual'] === 'on'? true: false;

		if($estudio['nombreCentro'] != "")
		{
			$dbData = array('id_datopersonal'		=> $idPersona,
							'tipo_nivel_escolar'	=> $estudio['TipoNivel'],
							'nombre_centroestudios' => $estudio['nombreCentro'],
							'nombrecarrera'			=> $estudio['nombreCarrera'],
							'id_nivel_escolar'		=> $estudio['nivelEstudio'],
							'id_jornada'			=> $estudio['idJornada'],
							'fechainicio'			=> $this->FormatoDBFecha($estudio['fechaInicio']),
							'fechafin'				=> $this->FormatoDBFecha($estudio['fechaFin']),
							'horainicio'			=> $estudio['horaInicio'],
							'horafin'				=> $estudio['horaFin'],
							'actual'				=> $actual
							);

			$query = $this->db->where('id_datop_escolar', $idDato)
							 ->where('id_datopersonal', $idPersona)
							 ->update('datop_escolar', $dbData);

			if($query){
				return true;
			}else{
				return false;
			}
		}
	}

	public function updateDatoPersonal_Trabajo($trabajo, $idPersona, $idDato)
	{
		$sabado = $trabajo['sabado'] === 'on'? true: false;
		$actual = $trabajo['actual'] === 'on'? true: false;

		if($trabajo['nombre'] != "")
		{
			$dbData = array('nombre_trabajo'	=> $trabajo['nombre'],
							'puesto'			=> $trabajo['puesto'],
							'fechainicio'		=> $this->FormatoDBFecha($trabajo['fechaInicio']),
							'fechafin'			=> $this->FormatoDBFecha($trabajo['fechaFin']),
							'horainicio'		=> $trabajo['horaInicio'],
							'horafin'			=> $trabajo['horaFin'],
							'horainicio_sabado'	=> $trabajo['horaInicioSabado'],
							'horafin_sabado'	=> $trabajo['horaFinSabado'],
							'sabado'			=> $sabado,
							'actual'			=> $actual,
								);
			
			$query = $this->db->where('id_datopersonal', $idPersona)
								->where('id_datop_trabajo', $idDato)
								->update('datop_trabajo', $dbData);

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
	*** BUSCA INFROMACIÓN POR ID
	***
	***/
	public function verDatosxId($id)
	{
		return $this->db->get_where('datopersonal', array('id_datopersonal' => $id, ))->row();
	}

	public function verDatoEscolarxPersona($id)
	{
		return $this->db->select('de.id_datop_escolar, de.id_datopersonal,  Nne.id_nivel as id_tipo_nivel, Nne.nombre as nombre_tipo_nivel, de.id_jornada, de.nombrecarrera, de.nombre_centroestudios, 
								year(de.fechainicio) as fechainicio, year(de.fechafin) as fechafin, de.horainicio, de.horafin,
								Ine.id_nivel, Ine.nombre as nombre_nivel, de.actual')
						->from('datop_escolar de')
						->join('nivel_escolar Nne', 'de.tipo_nivel_escolar = Nne.id_nivel')
						->join('nivel_escolar Ine', 'de.id_nivel_escolar = Ine.id_nivel', 'left')
						->where('de.id_datopersonal', $id)
						->get()
						->result();
	}

	public function verDatoTrabajoxPersona($id)
	{
		return $this->db->get_where('datop_trabajo', array('id_datopersonal' => $id ))->result();	
	}

	//Busca datos x id y id_datopersonal para el mantenimiento
	public function buscarEstudioxId($data)
	{
		return $this->db->select('*')
						->from('datop_escolar')
						->where('id_datopersonal', $data['idDatoPersonal'])
						->where('id_datop_escolar', $data['idDato'])
						->get()
						->row();
	}

	public function buscarTrabajoxId($data)
	{
		return $this->db->select('*')
						->from('datop_trabajo')
						->where('id_datopersonal', $data['idDatoPersonal'])
						->where('id_datop_trabajo', $data['idDato'])
						->get()
						->row();
	}

	/*
	* BUSCA CATÁLOGOS DE INFORMACIÓN DE ESTUDIOS
	*/

	public function verCatalogoEstudio($tipoNivel, $idNivel)
	{
		//return $this->db->get_where('nivel_escolar', array('tipo_nivel' => $tipoNivel))->result();
		$query = "SELECT * FROM nivel_escolar
					WHERE tipo_nivel = IFNULL('$tipoNivel', tipo_nivel)
					"
					;

		return $this->db->query($query)->result();
	}
}