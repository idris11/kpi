<?php
class Kategori_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function kategori(){
    	$this->db->select('*');
        $this->db->from('kategori');
        return $this->db->get();
    }

    function analisa_kategori(){
    	$query=$this->db->query("select kategori.nama_kategori,kategori.id_kategori,analisa_kategori.kategori_kedua from kategori join analisa_kategori on kategori.id_kategori=analisa_kategori.kategori_pertama");
    	return $query;
    }

    function nilai_kategori(){
    	$this->db->select('*');
        $this->db->from('nilai_kategori');
        return $this->db->get();
    }

    function select_kategori_by_id($id_kategori){
    	$this->db->select('*');
    	$this->db->from('kategori');
    	$this->db->where('id_kategori',$id_kategori);

    	return $this->db->get();    
    }

    function sum_bobot(){
    	$query=$this->db->query("select sum(bobot_kategori) as 'sum_bobot' from kategori");

    	return $query;
    }

    function update($id_kategori,$data){
    	$this->db->where('id_kategori',$id_kategori);
    	$this->db->update('kategori',$data);
    }

    function delete($id_kategori){
    	$query=$this->db->query("
                delete from kategori where id_kategori='$id_kategori'
            ");
    }

    function insert($data){
        $this->db->insert('kategori',$data);
    }
}
?>