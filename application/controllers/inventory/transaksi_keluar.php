<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of transaksi
 *
 * @author Jin Toples
 */
class transaksi_keluar extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('global_model');
        error_reporting(0);
    }

    function index() {
        $data['isi'] = $this->global_model->select_transaksi2('*', 'tbl_barang_masuk', 'tgl_trans', 'DESC')->result();
        $data['barang'] = $this->global_model->select_data('*', 'tbl_barang', 'nama_barang', 'ASC')->result();
        $data['page'] = 'transaksi/list_data_keluar';
        $this->load->view('template', $data);
    }

    function add_data() {
        $jumlah = $this->input->post('jumlah_barang');
        $row = $this->global_model->get_data('*', $data['kd_barang'], 'kd_barang', 'tbl_barang')->row();
        $data['jumlah'] = $row->jumlah - $jumlah;
        $data2['kd_barang'] = $this->input->post('kode_barang2');

        $this->global_model->update_data($data2['kd_barang'], 'kd_barang', $data, 'tbl_barang');


        $data2['kd_trans'] = $this->input->post('kode_transaksi');
        $data2['jumlah_trans'] = $this->input->post('jumlah_barang');
        $data2['tgl_trans'] = date('Y-m-d H:i:s');
        $data2['trans_type'] = 2;

        $this->global_model->save_data($data2, 'tbl_barang_masuk');

        redirect('inventory/transaksi_keluar');
    }

}

?>
