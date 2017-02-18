<?php
class Analisa_kategori_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function select_analisa_id(){
        $query=$this->db->query("select id_analisa from analisa_kategori");
        return $query;
    }

    function k1(){
        $query=$this->db->query("select * from analisa_kategori limit 0,5");

        return $query;
    }

    function hasil_k1(){
        $query=$this->db->query("select hasil_analisa_kategori from analisa_kategori limit 0,5");

        return $query;
    }

    function sum_k1(){
        $query=$this->db->query("select sum(nilai_analisa_kategori) as 'jumlah' from analisa_kategori where kategori_kedua='K1'");

        return $query;
    }

    function avg_k1(){
        $query=$this->db->query("select avg(hasil_analisa_kategori) as 'rata' from analisa_kategori where kategori_pertama='K1'");

        return $query;
    }

    function select_k1(){
        $query=$this->db->query("select id_analisa,nilai_analisa_kategori from analisa_kategori where kategori_kedua='K1'");

        return $query;
    }

    function k2(){
        $query=$this->db->query("select * from analisa_kategori limit 5,5");

        return $query;
    }

    function sum_k2(){
        $query=$this->db->query("select sum(nilai_analisa_kategori) as 'jumlah' from analisa_kategori where kategori_kedua='K2'");

        return $query;
    }

    function sum_hasil_k1(){
        $query=$this->db->query("select sum(hasil_analisa_kategori) as 'hasil' from analisa_kategori where kategori_kedua='K1'");

        return $query;
    }

    function avg_k2(){
        $query=$this->db->query("select avg(hasil_analisa_kategori) as 'rata' from analisa_kategori where kategori_pertama='K2'");

        return $query;
    }

    function select_k2(){
        $query=$this->db->query("select id_analisa,nilai_analisa_kategori from analisa_kategori where kategori_kedua='K2'");

        return $query;
    }

    function hasil_k2(){
        $query=$this->db->query("select hasil_analisa_kategori from analisa_kategori limit 5,5");

        return $query;
    }

    function sum_hasil_k2(){
        $query=$this->db->query("select sum(hasil_analisa_kategori) as 'hasil' from analisa_kategori where kategori_kedua='K2'");

        return $query;
    }

    function avg_k3(){
        $query=$this->db->query("select avg(hasil_analisa_kategori) as 'rata' from analisa_kategori where kategori_pertama='K3'");

        return $query;
    }

    function k3(){
        $query=$this->db->query("select * from analisa_kategori limit 10,5");

        return $query;
    }

     function hasil_k3(){
        $query=$this->db->query("select hasil_analisa_kategori from analisa_kategori limit 10,5");

        return $query;
    }

    function sum_k3(){
        $query=$this->db->query("select sum(nilai_analisa_kategori) as 'jumlah' from analisa_kategori where kategori_kedua='K3'");

        return $query;
    }

    function sum_hasil_k3(){
        $query=$this->db->query("select sum(hasil_analisa_kategori) as 'hasil' from analisa_kategori where kategori_kedua='K3'");

        return $query;
    }

    function select_k3(){
        $query=$this->db->query("select id_analisa,nilai_analisa_kategori from analisa_kategori where kategori_kedua='K3'");

        return $query;
    }

    function k4(){
        $query=$this->db->query("select * from analisa_kategori limit 15,5");

        return $query;
    }

    function hasil_k4(){
        $query=$this->db->query("select hasil_analisa_kategori from analisa_kategori limit 15,5");

        return $query;
    }

    function sum_k4(){
        $query=$this->db->query("select sum(nilai_analisa_kategori) as 'jumlah' from analisa_kategori where kategori_kedua='K4'");

        return $query;
    }

    function avg_k4(){
        $query=$this->db->query("select avg(hasil_analisa_kategori) as 'rata' from analisa_kategori where kategori_pertama='K4'");

        return $query;
    }

    function sum_hasil_k4(){
        $query=$this->db->query("select sum(hasil_analisa_kategori) as 'hasil' from analisa_kategori where kategori_kedua='K4'");

        return $query;
    }

    function select_k4(){
        $query=$this->db->query("select id_analisa,nilai_analisa_kategori from analisa_kategori where kategori_kedua='K4'");

        return $query;
    }

    function k5(){
        $query=$this->db->query("select * from analisa_kategori limit 20,5");

        return $query;
    }

    function hasil_k5(){
        $query=$this->db->query("select hasil_analisa_kategori from analisa_kategori limit 20,5");

        return $query;
    }

    function sum_k5(){
        $query=$this->db->query("select sum(nilai_analisa_kategori) as 'jumlah' from analisa_kategori where kategori_kedua='K5'");

        return $query;
    }

    function avg_k5(){
        $query=$this->db->query("select avg(hasil_analisa_kategori) as 'rata' from analisa_kategori where kategori_pertama='K5'");

        return $query;
    }

    function sum_hasil_k5(){
        $query=$this->db->query("select sum(hasil_analisa_kategori) as 'hasil' from analisa_kategori where kategori_kedua='K5'");

        return $query;
    }

    function select_k5(){
        $query=$this->db->query("select id_analisa,nilai_analisa_kategori from analisa_kategori where kategori_kedua='K5'");

        return $query;
    }
}
?>