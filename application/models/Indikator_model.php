<?php
class Indikator_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function insert($data){
    	$this->db->insert('indikator',$data);
    }

    function select_indikator(){
       $query=$this->db->query("select data_indikator.id_indikator,data_indikator.nama_indikator,kategori.nama_kategori,jabatan.jabatan from data_indikator join jabatan on jabatan.kd_jabatan=data_indikator.kd_jabatan join kategori on data_indikator.id_kategori=kategori.id_kategori");

       return $query;
    }

    function select_indikator_by_id($id_indikator){
       $query=$this->db->query("select * from data_indikator where id_indikator='$id_indikator'");

       return $query;
    }

    function insert_indikator($data){
        $this->db->insert('data_indikator',$data);
    }

    function update_data_indikator($id_indikator,$data){
        $this->db->where('id_indikator',$id_indikator);
        $this->db->update('data_indikator',$data);
    }

    function delete($kd_indikator){
        $this->db->query("
                delete from indikator where kd_indikator='$kd_indikator'
            ");
    }

    function delete_indikator($kd_indikator){
        $this->db->query("
                delete from data_indikator where id_indikator='$kd_indikator'
            ");
    }

    function select_indikator_by_nip($nip){
        $query=$this->db->query("
                select indikator.target_pencapaian,indikator.target_akhir_pencapaian,indikator.target_waktu,indikator.id_indikator,indikator.indikator,kategori.bobot_kategori,data_indikator.nilai_eigenvector,indikator.skor_pencapaian,indikator.skor_akhir_pencapaian from indikator join data_indikator on data_indikator.id_indikator=indikator.id_indikator join user on user.nip=indikator.nip join kategori on kategori.id_kategori=data_indikator.id_kategori where user.nip='$nip'
            ");

        return $query;
    }

    function select_data_indikator_by_nip($nip){
        $query=$this->db->query("
                select * from indikator join data_indikator on data_indikator.id_indikator=indikator.id_indikator join user on user.nip=indikator.nip join kategori on kategori.id_kategori=data_indikator.id_kategori where user.nip='$nip'
            ");

        return $query;
    }

    function update($kd_indikator,$data){
        $this->db->where('kd_indikator',$kd_indikator);
        $this->db->update('indikator',$data);
    }

    function count_indikator($id_kategori){
        $query=$this->db->query("select count(kd_kategori) as count from indikator where kd_kategori='$id_kategori'");

        return $query;
    }

    function cari_indikator_by_kategori($id_kategori){
        $query=$this->db->query("select indikator from indikator where kd_kategori='$id_kategori'");

        return $query;
    }

    function lihat_indikator_by_jabatan($id_jabatan){
        $query=$this->db->query("select * from data_indikator where kd_jabatan='$id_jabatan' order by id_indikator");

        return $query;
    }

    function select_indikator_by_id_kategori($nip){
        $query=$this->db->query("select indikator.target_pencapaian,indikator.skor_pencapaian,indikator.kd_indikator,indikator.skor_pencapaian,data_indikator.nilai_eigenvector,kategori.bobot_kategori from data_indikator join indikator on indikator.id_indikator=data_indikator.id_indikator join kategori on data_indikator.id_kategori=kategori.id_kategori  where indikator.nip='$nip'");

        return $query;
    }

    function select_indikator_by_kd_unitkerja($kd_unitkerja){
        $query=$this->db->query("select indikator.target_pencapaian,indikator.target_akhir_pencapaian,indikator.target_waktu,indikator.id_indikator,indikator.indikator,kategori.bobot_kategori,data_indikator.nilai_eigenvector,indikator.skor_pencapaian,indikator.skor_akhir_pencapaian from indikator join data_indikator on data_indikator.id_indikator=indikator.id_indikator join user on user.nip=indikator.nip join kategori on kategori.id_kategori=data_indikator.id_kategori where user.kd_unitkerja='$kd_unitkerja' order by indikator.kd_indikator");

        return $query;
    }
}
?>