<?php
class Pangkat_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function pangkat(){
    	$this->db->select('*');
        $this->db->from('pangkat');
        return $this->db->get();
    }

    function insert($data){
        $this->db->insert('pangkat',$data);
    }

    function select_pangkat_by_kd($kd_pangkat){
        $query=$this->db->query("
                select * from pangkat where kd_pangkat='$kd_pangkat'
            ");

        return $query;
    }

    function update_pangkat($kd_pangkat,$data){
        $this->db->where('kd_pangkat',$kd_pangkat);
        $this->db->update('pangkat',$data);
    }

    function delete($kd_pangkat){
        $this->db->query("
                delete from pangkat where kd_pangkat='$kd_pangkat'
            ");
    }
}
?>