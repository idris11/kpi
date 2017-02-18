<?php
class Jabatan_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function jabatan(){
    	$this->db->select('*');
        $this->db->from('jabatan');
        return $this->db->get();
    }

    function select_jabatan_by_kd($kd_jabatan){
    	$query=$this->db->query("
    			select * from jabatan where kd_jabatan='$kd_jabatan'
    		");
    	return $query;
    }

    function insert($data){
    	$this->db->insert('jabatan',$data);
    }

    function delete($kd_jabatan){
    	$this->db->query("
    			delete from jabatan where kd_jabatan='$kd_jabatan'
    		");
    }

    function update_jabatan($kd_jabatan,$data){
    	$this->db->where('kd_jabatan',$kd_jabatan);
    	$this->db->update('jabatan',$data);
    }
}
?>