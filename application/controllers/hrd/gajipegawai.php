<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class gajipegawai extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('app_model');
	}

	function index()
	{
		$data['pegawai'] = $this->db->query('select a.nama_pegawai,a.nik from tbl_pegawai a left join tbl_gaji_pegawai b on a.nik = b.nik where b.gaji is null')->result();
		$data['gaji'] = $this->app_model->getdata('view_gaji_pegawai')->result();
		$data['page'] = 'hrd/list_gajipegawai';
		$this->load->view('template',$data);
	}

	function savedata()
	{
		$data['nik'] = $this->input->post('nik');
		$data['kode_jabatan'] = $this->input->post('kode');
		$data['gaji'] = $this->input->post('gaji');
		$data['rentang_waktu'] = $this->input->post('waktu');
		$cek = $this->app_model->savedata('tbl_gaji_pegawai',$data);
		if ($cek == TRUE) {
			echo "<script>
				alert('Sukses');
				window.location.href = '".base_url()."hrd/gajipegawai';
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
		$data['dataedit'] = $this->db->query("select * from view_gaji_pegawai where id = ".$id." ")->row();
		$data['page'] = 'hrd/edit_gajipegawai';
		$this->load->view('template',$data);

	}

	function updatedata($id)
	{
		$data['gaji'] = $this->input->post('gaji');
		$data['rentang_waktu'] = $this->input->post('waktu');
		$this->db->where('id', $id);
		$this->db->update('tbl_gaji_pegawai', $data);
		echo "<script>
				alert('Sukses');
				window.location.href = '".base_url()."hrd/gajipegawai';
			</script>";
	}

	function deletedata($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_gaji_pegawai');
		echo "<script>
				alert('Sukses');
				window.location.href = '".base_url()."hrd/gajipegawai';
			</script>";
	}

	function get_jabatan()
	{
		$nik = $this->input->post('nik');
		$jab = $this->db->query("select jabatan from view_pegawai where nik = '".$nik."'")->row();
		die($jab->jabatan);
	}

	function get_kode_jabatan()
	{
		$nik = $this->input->post('nik');
		$jab = $this->db->query("select kode_jabatan from view_pegawai where nik = '".$nik."'")->row();
		die($jab->kode_jabatan);
	}

}

/* End of file datapegawai.php */
/* Location: ./application/controllers/datapegawai.php */