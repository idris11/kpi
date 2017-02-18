<?php
class Unitkerja_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function unitkerja(){
    	$this->db->select('*');
        $this->db->from('unitkerja');
        
        return $this->db->get();
    }

    function insert($data){
    	$this->db->insert('unitkerja',$data);
    }

    function select_unitkerja_by_kd($kd_unitkerja){
    	$query=$this->db->query("
    			select * from unitkerja where kd_unitkerja='$kd_unitkerja'
    		");

    	return $query;
    }

    function update_unitkerja($kd_unitkerja,$data){
    	$this->db->where('kd_unitkerja',$kd_unitkerja);
    	$this->db->update('unitkerja',$data);
    }

    function delete($kd_unitkerja){
    	$this->db->query("
    			delete from unitkerja where kd_unitkerja='$kd_unitkerja'
    		");
    }
}
?>