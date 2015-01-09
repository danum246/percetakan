<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class auth extends CI_Controller {

	function index()
	{
		 if ($this->session->userdata('session_logged') == TRUE) {
		 	//echo "sudah masuk";
		 	redirect('dashboard','refresh');
		 }else{
		 	$this->load->view('login');
		 }
	}

	function login(){
		$user = $this->input->post('userid');
		$pass = md5($this->input->post('password'));
		$cek = $this->login_model->cekuser($user,$pass);
		if ($cek->result() == TRUE) {
			foreach ($cek->result() as $row) {
				$session_user = $row->username;
				$level = $row->level;
			}
			$this->session->set_userdata('session_logged', $session_user);
			$this->session->set_userdata('session_level', $level);
            $this->index();
		} else {
			echo "Login Gagal. <a href=".base_url()."> kembali >></a>";
		}	
	}

	function logout() {
        $this->session->sess_destroy();
        redirect('auth', 'refresh');
    }

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */