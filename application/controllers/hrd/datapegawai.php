<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class datapegawai extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('app_model');
	}

	function index()
	{
		$data['pegawai'] = $this->app_model->getdata('view_pegawai')->result();
		$data['jabatan'] = $this->app_model->getdata('tbl_jabatan')->result();
		$data['page'] = 'hrd/list_pegawai';
		$this->load->view('template',$data);
	}

	function savedata()
	{
		$data['nama_pegawai'] = $this->input->post('nama');
		$data['nik'] = $this->input->post('nik');
		$data['npwp'] = $this->input->post('npwp');
		$data['alamat'] = $this->input->post('alamat');
		$data['hp1'] = $this->input->post('hp1');
		$data['hp2'] = $this->input->post('hp2');
		$data['kode_jabatan'] = $this->input->post('jabatan');
		$data['status'] = 1;
		$cek = $this->app_model->savedata('tbl_pegawai',$data);
		if ($cek == TRUE) {
			echo "<script>
				alert('Sukses');
				window.location.href = '".base_url()."hrd/datapegawai';
			</script>";
		} else {
			echo "<script>
				alert('Gagal');
				history.go(-1);
			</script>";
		}
	}

	function edit_data($id)
	{
		$data['jabatan'] = $this->app_model->getdata('tbl_jabatan')->result();
		$data['dataedit'] = $this->db->query("select * from view_pegawai where id = ".$id." ")->row();
		$data['page'] = 'hrd/edit_pegawai';
		$this->load->view('template',$data);
	}

	function updatedata($id)
	{
		$data['nama_pegawai'] = $this->input->post('nama');
		$data['nik'] = $this->input->post('nik');
		$data['npwp'] = $this->input->post('npwp');
		$data['alamat'] = $this->input->post('alamat');
		$data['hp1'] = $this->input->post('hp1');
		$data['hp2'] = $this->input->post('hp2');
		$data['kode_jabatan'] = $this->input->post('jabatan');
		$this->db->where('id', $id);
		$this->db->update('tbl_pegawai', $data);
		echo "<script>
				alert('Sukses');
				window.location.href = '".base_url()."hrd/datapegawai';
			</script>";
	}

	function deletedata($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_pegawai');
		echo "<script>
				alert('Sukses');
				window.location.href = '".base_url()."hrd/datapegawai';
			</script>";
	}
}

/* End of file datapegawai.php */
/* Location: ./application/controllers/datapegawai.php */