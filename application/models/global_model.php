<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of global_model
 *
 * @author Jin Toples
 */
class global_model extends CI_Model { 
    function construct() {
        parent::__construct();
    }
    
    function select_data($select, $table, $field, $az){
        return $this->db->query('SELECT '.$select.' FROM '.$table.' ORDER BY '.$field.' '.$az);
    }
    
    function get_data($select ,$id, $field, $table){
        return $this->db->query('SELECT '.$select.' FROM '.$table.' WHERE '.$field.'="'.$id.'"');
    }


    function save_data($data, $table){
        $this->db->insert($table, $data);
    }
    
    function update_data($id, $field, $data, $table){
        $this->db->where($field, $id);
        $this->db->update($table, $data);
    }
    
    function delete_data($id, $field, $table){
        $this->db->where($field, $id);
        $this->db->delete($table);
    }
    
    function select_transaksi($select, $table, $field, $az){
        return $this->db->query('SELECT '.$select.' FROM '.$table.' JOIN tbl_tipe_transaksi ON tbl_tipe_transaksi.kode_tipe='.$table.'.trans_type JOIN tbl_barang ON tbl_barang.kd_barang='.$table.'.kd_barang WHERE trans_type=1 ORDER BY '.$field.' '.$az);
    }
    
    function select_transaksi2($select, $table, $field, $az){
        return $this->db->query('SELECT '.$select.' FROM '.$table.' JOIN tbl_tipe_transaksi ON tbl_tipe_transaksi.kode_tipe='.$table.'.trans_type JOIN tbl_barang ON tbl_barang.kd_barang='.$table.'.kd_barang WHERE trans_type=2 ORDER BY '.$field.' '.$az);
    }
    
    
}

?>
