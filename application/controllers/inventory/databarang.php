<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of databarang
 *
 * @author Jin Toples
 */
class databarang extends CI_Controller {
    function databarang() {
        parent::__construct();
        
        $this->load->model('global_model');
        error_reporting(0);
    }
    
    function index(){
        $data['isi'] = $this->global_model->select_data('*', 'tbl_barang', 'nama_barang', 'ASC')->result();
        $data['page'] = 'inventory/list_data_barang';
        $this->load->view('template', $data);
    }
    
    function add_data(){
        $data['kd_barang'] = $this->input->post('kode_barang');
        $data['nama_barang'] = $this->input->post('nama_barang');
        $data['jumlah'] = $this->input->post('jumlah_barang');
        
        $this->global_model->save_data($data, 'tbl_barang');
        
        redirect('inventory/databarang');
    }
    
    function edit_data($id_barang){
        
        if($this->input->post()){
            $id = $this->input->post('id_barang'); 
            $data['kd_barang'] = $this->input->post('kode_barang');
            $data['nama_barang'] = $this->input->post('nama_barang');
            $data['jumlah'] = $this->input->post('jumlah_barang');

            $this->global_model->update_data($id, 'id', $data, 'tbl_barang');
            
            redirect('inventory/databarang');
        }
        
        $data['isi'] = $this->global_model->get_data('*', $id_barang, 'id', 'tbl_barang')->row();
        $data['page'] = 'inventory/edit_data';
        $this->load->view('template', $data);
    }
    
    function delete_data($id_barang){
        $this->global_model->delete_data($id_barang, 'id', 'tbl_barang');
        redirect('inventory/databarang');
    }
}

?>
