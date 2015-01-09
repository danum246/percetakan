<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model {

	function cekuser($user,$pass)
	{
		$this->db->where('username', $user);
		$this->db->where('password', $pass);
		$q = $this->db->get('tbl_user_login');
		return $q;
	}

}

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */