<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_model extends CI_Model {

	function getdata($table)
	{
		$q = $this->db->get($table);
		return $q;
	}

	function savedata($table,$data)
	{
		$q = $this->db->insert($table, $data);
		return $q;
	}

}

/* End of file app_model.php */
/* Location: ./application/models/app_model.php */