<?php
class Pegawai_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function daftar_pegawai(){
    	$query=$this->db->query("
                select * from user a 
                left join jabatan b on a.kd_jabatan=b.kd_jabatan 
                left join pangkat c on a.kd_pangkat=c.kd_pangkat 
                left join unitkerja d on a.kd_unitkerja=d.kd_unitkerja 
                where level='pegawai'
            ");
        return $query;
    }

    function delete($nip){
        $query=$this->db->query("
                delete from user where nip='$nip'
            ");
    }

    function select_pegawai_by_nip($nip){
        $query=$this->db->query("
                select * from user a 
                left join jabatan b on a.kd_jabatan=b.kd_jabatan 
                left join pangkat c on a.kd_pangkat=c.kd_pangkat 
                left join unitkerja d on a.kd_unitkerja=d.kd_unitkerja 
                where nip='$nip'
            ");

        return $query;
    }

    function select_pegawai_by_nip_unitkerja($nip,$id_unitkerja){
        $query=$this->db->query("
                select * from user a 
                left join jabatan b on a.kd_jabatan=b.kd_jabatan 
                left join pangkat c on a.kd_pangkat=c.kd_pangkat 
                left join unitkerja d on a.kd_unitkerja=d.kd_unitkerja 
                where nip='$nip' and d.kd_unitkerja='$id_unitkerja'
            ");

        return $query;
    }

    function select_pegawai_by_unitkerja($kd_unitkerja){
        $query=$this->db->query("
                select * from user
                where kd_unitkerja='$kd_unitkerja' and level='pegawai'
            ");

        return $query;
    }

    function insert($data){
        $this->db->insert('user',$data);
    }

    function update_pegawai($nip,$data){
        $this->db->where('nip',$nip);
        $this->db->update('user',$data);
    }
}
?>