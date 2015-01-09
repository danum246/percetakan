<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class transaksi extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('session_logged') != TRUE) {
		 	$this->load->view('login');
		}

		 $this->load->model('global_model');
	}

	function index()
	{
		$data['tampil']=$this->db->query("SELECT * FROM tbl_transaksi_acc where type=1 and flag_hapus is null ")->result();



		$data['page'] = 'keuangan/list';
		$this->load->view('template',$data);
	}

	function keluar()
	{
		$data['tampil']=$this->db->query("SELECT * FROM tbl_transaksi_acc where type=2 and flag_hapus is null ")->result();

		$data['page'] = 'keuangan/list2';
		$this->load->view('template',$data);	
	}	

	function buku()
	{
		$data['page'] = 'keuangan/buku';
		$this->load->view('template',$data);	
	}

	function uang_masuk()
	{
		$data['keterangan'] = $this->input->post('ket');
		$data['jumlah'] = $this->input->post('jmlh_uang');
		$data['ppn'] = $this->input->post('ppn');
		$data['pph'] = $this->input->post('pph');
		$data['supplier'] = $this->input->post('supplier');
		$data['tanggal'] = $this->input->post('tgl');
		$data['type'] = '1';

		$data2['type'] = '1';
		$data2['ppn'] = $this->input->post('ppn');
		$data2['pph'] = $this->input->post('pph');
		$data2['debet'] = $this->input->post('jmlh_uang');
		$data2['credit'] = '0';
		$data2['balance'] = $this->input->post('jmlh_uang');
		$data2['keterangan'] = $this->input->post('ket');
		$data2['tanggal'] = $this->input->post('tgl');

		$this->global_model->save_data($data2, 'tbl_buku_besar');
		$this->global_model->save_data($data,'tbl_transaksi_acc');

		redirect ('keuangan/transaksi/');
	}

	function uang_keluar()
	{
		$data['keterangan'] = $this->input->post('ket');
		$data['jumlah'] = $this->input->post('jmlh_uang');
		$data['ppn'] = $this->input->post('ppn');
		$data['pph'] = $this->input->post('pph');
		$data['supplier'] = $this->input->post('supplier');
		$data['tanggal']  =$this->input->post('tgl');
		$data['type'] = '2';

		$data2['type'] = '2';
		$data2['ppn'] = $this->input->post('ppn');
		$data2['pph'] = $this->input->post('pph');
		$data2['debet'] = '0';
		$data2['credit'] = $this->input->post('jmlh_uang');
		$data2['balance'] = ($data['debet']-$data['credit']);
		$data2['keterangan'] = $this->input->post('ket');
		$data2['tanggal'] = $this->input->post('tgl');

		$this->global_model->save_data($data2, 'tbl_buku_besar');
		$this->global_model->save_data($data,'tbl_transaksi_acc');

		redirect ('keuangan/transaksi/keluar');
	}

	function delete_data($id)
	{

       $this->db->query("UPDATE tbl_transaksi_acc SET flag_hapus=1 where id=$id");
        
        redirect('keuangan/transaksi/');

	}

}

/* End of file transaksi.php */
/* Location: ./application/controllers/transaksi.php */