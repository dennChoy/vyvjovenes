<?php
class Test_model extends CI_Model 
{
	public function sayHola()
	{
		$query = $this->db->get('prueba');
		return $query->result();
	}
}

?>