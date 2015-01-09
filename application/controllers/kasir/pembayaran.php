<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pembayaran extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('session_logged') != TRUE) {
		 	$this->load->view('login');
		 }
		 $this->load->model('app_model');
                 $this->load->model('global_model');
                 error_reporting(0);
	}

	function index()
	{            
            $this->session->set_userdata('voucher', 'TM-'.date('d-m-Y-His').rand(0, 1000));
            $this->session->set_userdata('flag', rand(1, 1000));
            redirect('kasir/pembayaran/transaksi');
	}

	function save(){
		echo "<script>
			var r = confirm('Transaksi Lainnya ?');
			if(r == true){
				window.location.href = '';
			} else {
				window.location.href = '';
			}

		</script>";
	}
        
        function voucher(){
            $data['page'] = 'kasir/input_voucher';
            $this->load->view('template',$data);
        }

        function cekvoucher(){
            $data['isi'] = $this->db->query('SELECT DISTINCT voucher, status_pembayaran FROM view_detail_transaksi WHERE status_pembayaran=1')->result();
            $data['page'] = 'kasir/list_voucher';
            $this->load->view('template',$data);   
        }

        function detailpesanan($voucher){
            $data['isi'] = $this->global_model->get_data('*' , $voucher, 'voucher', 'view_detail_transaksi')->result();
            $data['page'] = 'kasir/list_pesanan';
            $this->load->view('template',$data);   
        }

	function list_pembayaran()
	{                               
            $voucher = $this->input->post('voucher');
            $data['isi'] = $this->global_model->get_data('*' , $voucher, 'voucher', 'view_detail_transaksi')->result();
                        
            $data['voucher'] = $voucher;
            $data['page'] = 'kasir/receive_kasir';
            $this->load->view('template',$data);            
	}
        
        function print_pembayaran($voucher){
            $data2['status_pembayaran'] = '1';
            $this->global_model->update_data($voucher, 'voucher', $data2, 'tbl_pembayaran');    
            $data['isi'] = $this->global_model->get_data('*' , $voucher, 'voucher', 'view_detail_transaksi')->result();
                        
            //$data['page'] = 'kasir/print_receive';
            $this->load->view('kasir/print_receive',$data);
        }

	function rekap(){
		$data['page'] = 'kasir/rekap';
		$this->load->view('template',$data);	
	}

	function get_harga()
	{
		$id = $this->input->post('jenis');
		$q = $this->db->query("select harga_satuan from tbl_harga_satuan where id = ".$id."")->row();
		die($q->harga_satuan);		
	}
        
        function get_harga_finish()
	{
		$id = $this->input->post('jenis_finish');
		$q = $this->db->query("select harga_finishing from tbl_finishing where id_finishing = ".$id."")->row();
		die($q->harga_finishing);		
	}
        
        function transaksi(){
            $data['jenis'] = $this->app_model->getdata('view_harga_satuan')->result();
            $data['finishing'] = $this->app_model->getdata('tbl_finishing')->result();
            $data['page'] = 'kasir/form_pembayaran';
            $this->load->view('template',$data);
        }

	function tempor()
	{
            $data['voucher'] = $this->session->userdata('voucher');
            $data['jenis_produk'] = $this->input->post('jenis');
            $data['qty'] = $this->input->post('jumlah');
            $data['finishing'] = $this->input->post('jenis_finish');
            $data['harga_total'] = $this->input->post('total');
            $data['tgl_transaksi'] = date('Y-m-d');        
            $data['flag'] = $this->session->userdata('flag');
                        
            $this->global_model->save_data($data, 'tbl_pembayaran');
            
            
            echo "<script>
			var r = confirm('Transaksi Lainnya ?');
			if(r == true){
				window.location.href = '".base_url('kasir/pembayaran/transaksi')."';
			} else {
				window.location.href = '".base_url('kasir/pembayaran/detail')."';
			}

		</script>";
	}
        
        function detail(){           
            
            if($this->input->post()){
                $data2['flag'] = 0;
                $data2['customer'] = $this->input->post('costumer');
                $this->global_model->update_data($this->session->userdata('flag'), 'flag', $data2, 'tbl_pembayaran');            
                
                $data3['debet'] = $this->input->post('total');
                $data3['balance'] = $this->input->post('total');
                $data3['type'] = 1;
                $data3['keterangan'] = $this->input->post('keterangan');
                $data3['tanggal'] = date('Y-m-d');                
                
                $this->global_model->save_data($data3, 'tbl_buku_besar');
                              
                $this->session->unset_userdata('flag');
                $this->session->unset_userdata('voucher');
                
                redirect('kasir/pembayaran');
            }
            
            $data['voucher'] = $this->session->userdata('voucher');
            
            $data['isi'] = $this->global_model->get_data('*' , $this->session->userdata('voucher'), 'voucher', 'view_detail_transaksi')->result();
            
            $data['page'] = 'kasir/receive';
            $this->load->view('template',$data);
        }

}

/* End of file pembayaran.php */
/* Location: ./application/controllers/pembayaran.php */