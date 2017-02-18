<?php
class Analisa_indikator_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    function k1(){
    	$query=$this->db->query("select data_indikator.nama_indikator,data_indikator.id_indikator,analisa_indikator.id_analisa_indikator from data_indikator join analisa_indikator on data_indikator.id_indikator=analisa_indikator.indikator_pertama where analisa_indikator.id_kategori='K1'");

    	return $query;
    }

    function ujung_k1(){
    	$query=$this->db->query("select data_indikator.nama_indikator,data_indikator.id_indikator,analisa_indikator.id_analisa_indikator from data_indikator join analisa_indikator on data_indikator.id_indikator=analisa_indikator.indikator_kedua where analisa_indikator.id_kategori='K1'");

    	return $query;
    }

    function k2(){
    	$query=$this->db->query("select data_indikator.nama_indikator,data_indikator.id_indikator,analisa_indikator.id_analisa_indikator from data_indikator join analisa_indikator on data_indikator.id_indikator=analisa_indikator.indikator_pertama where analisa_indikator.id_kategori='K2'");

    	return $query;
    }

    function ujung_k2(){
    	$query=$this->db->query("select data_indikator.nama_indikator,data_indikator.id_indikator,analisa_indikator.id_analisa_indikator from data_indikator join analisa_indikator on data_indikator.id_indikator=analisa_indikator.indikator_kedua where analisa_indikator.id_kategori='K2'");

    	return $query;
    }

    function k3(){
    	$query=$this->db->query("select data_indikator.nama_indikator,data_indikator.id_indikator,analisa_indikator.id_analisa_indikator from data_indikator join analisa_indikator on data_indikator.id_indikator=analisa_indikator.indikator_pertama where analisa_indikator.id_kategori='K3'");

    	return $query;
    }

    function ujung_k3(){
    	$query=$this->db->query("select data_indikator.nama_indikator,data_indikator.id_indikator,analisa_indikator.id_analisa_indikator from data_indikator join analisa_indikator on data_indikator.id_indikator=analisa_indikator.indikator_kedua where analisa_indikator.id_kategori='K3'");

    	return $query;
    }

    function k4(){
    	$query=$this->db->query("select data_indikator.nama_indikator,data_indikator.id_indikator,analisa_indikator.id_analisa_indikator from data_indikator join analisa_indikator on data_indikator.id_indikator=analisa_indikator.indikator_pertama where analisa_indikator.id_kategori='K4'");

    	return $query;
    }

    function ujung_k4(){
    	$query=$this->db->query("select data_indikator.nama_indikator,data_indikator.id_indikator,analisa_indikator.id_analisa_indikator from data_indikator join analisa_indikator on data_indikator.id_indikator=analisa_indikator.indikator_kedua where analisa_indikator.id_kategori='K4'");

    	return $query;
    }

    function k5(){
    	$query=$this->db->query("select data_indikator.nama_indikator,data_indikator.id_indikator,analisa_indikator.id_analisa_indikator from data_indikator join analisa_indikator on data_indikator.id_indikator=analisa_indikator.indikator_pertama where analisa_indikator.id_kategori='K5'");

    	return $query;
    }

    function ujung_k5(){
    	$query=$this->db->query("select data_indikator.nama_indikator,data_indikator.id_indikator,analisa_indikator.id_analisa_indikator from data_indikator join analisa_indikator on data_indikator.id_indikator=analisa_indikator.indikator_kedua where analisa_indikator.id_kategori='K5'");

    	return $query;
    }

    function ik1(){
        $query=$this->db->query("select id_analisa_indikator,nilai_analisa_indikator from analisa_indikator where indikator_kedua='IK1'");

        return $query;
    }

    function hasil_ik1(){
        $query=$this->db->query("select id_analisa_indikator,hasil_analisa_indikator from analisa_indikator where indikator_pertama='IK1'");

        return $query;
    }

    function sum_ik1(){
        $query=$this->db->query("select sum(nilai_analisa_indikator) as sum_ik_1 from analisa_indikator where indikator_kedua='IK1'");

        return $query;
    }

    function avg_ik1(){
        $query=$this->db->query("select avg(hasil_analisa_indikator) as 'rata' from analisa_indikator where indikator_pertama='IK1'");

        return $query;
    }

    function ik2(){
        $query=$this->db->query("select id_analisa_indikator,nilai_analisa_indikator from analisa_indikator where indikator_kedua='IK2'");

        return $query;
    }

    function hasil_ik2(){
        $query=$this->db->query("select id_analisa_indikator,hasil_analisa_indikator from analisa_indikator where indikator_pertama='IK2'");

        return $query;
    }

    function sum_ik2(){
        $query=$this->db->query("select sum(nilai_analisa_indikator) as sum_ik_2 from analisa_indikator where indikator_kedua='IK2'");

        return $query;
    }

    function avg_ik2(){
        $query=$this->db->query("select avg(hasil_analisa_indikator) as 'rata' from analisa_indikator where indikator_pertama='IK2'");

        return $query;
    }

    function ik3(){
        $query=$this->db->query("select id_analisa_indikator,nilai_analisa_indikator from analisa_indikator where indikator_kedua='IK3'");

        return $query;
    }

    function hasil_ik3(){
        $query=$this->db->query("select id_analisa_indikator,hasil_analisa_indikator from analisa_indikator where indikator_pertama='IK3'");

        return $query;
    }

    function sum_ik3(){
        $query=$this->db->query("select sum(nilai_analisa_indikator) as sum_ik_3 from analisa_indikator where indikator_kedua='IK3'");

        return $query;
    }

    function avg_ik3(){
        $query=$this->db->query("select avg(hasil_analisa_indikator) as 'rata' from analisa_indikator where indikator_pertama='IK3'");

        return $query;
    }

    function ik4(){
        $query=$this->db->query("select id_analisa_indikator,nilai_analisa_indikator from analisa_indikator where indikator_kedua='IK4'");

        return $query;
    }

    function hasil_ik4(){
        $query=$this->db->query("select id_analisa_indikator,hasil_analisa_indikator from analisa_indikator where indikator_pertama='IK4'");

        return $query;
    }

    function sum_ik4(){
        $query=$this->db->query("select sum(nilai_analisa_indikator) as sum_ik_4 from analisa_indikator where indikator_kedua='IK4'");

        return $query;
    }

    function avg_ik4(){
        $query=$this->db->query("select avg(hasil_analisa_indikator) as 'rata' from analisa_indikator where indikator_pertama='IK4'");

        return $query;
    }

    function ik5(){
        $query=$this->db->query("select id_analisa_indikator,nilai_analisa_indikator from analisa_indikator where indikator_kedua='IK5'");

        return $query;
    }

    function hasil_ik5(){
        $query=$this->db->query("select id_analisa_indikator,hasil_analisa_indikator from analisa_indikator where indikator_pertama='IK5'");

        return $query;
    }

    function sum_ik5(){
        $query=$this->db->query("select sum(nilai_analisa_indikator) as sum_ik_5 from analisa_indikator where indikator_kedua='IK5'");

        return $query;
    }

    function avg_ik5(){
        $query=$this->db->query("select avg(hasil_analisa_indikator) as 'rata' from analisa_indikator where indikator_pertama='IK5'");

        return $query;
    }

    function jumlah_hasil_indikator_k1(){
        $query=$this->db->query("select id_indikator,jumlah_hasil_analisa_indikator from data_indikator where id_kategori='K1' order by id_indikator");

        return $query;
    }

    function ik6(){
        $query=$this->db->query("select id_analisa_indikator,nilai_analisa_indikator from analisa_indikator where indikator_kedua='IK6'");

        return $query;
    }

    function sum_ik6(){
        $query=$this->db->query("select sum(nilai_analisa_indikator) as sum_ik_6 from analisa_indikator where indikator_kedua='IK6'");

        return $query;
    }

    function hasil_ik6(){
        $query=$this->db->query("select id_analisa_indikator,hasil_analisa_indikator from analisa_indikator where indikator_pertama='IK6'");

        return $query;
    }

    function avg_ik6(){
        $query=$this->db->query("select avg(hasil_analisa_indikator) as 'rata' from analisa_indikator where indikator_pertama='IK6'");

        return $query;
    }

    function ik7(){
        $query=$this->db->query("select id_analisa_indikator,nilai_analisa_indikator from analisa_indikator where indikator_kedua='IK7'");

        return $query;
    }

    function sum_ik7(){
        $query=$this->db->query("select sum(nilai_analisa_indikator) as sum_ik_7 from analisa_indikator where indikator_kedua='IK7'");

        return $query;
    }

    function hasil_ik7(){
        $query=$this->db->query("select id_analisa_indikator,hasil_analisa_indikator from analisa_indikator where indikator_pertama='IK7'");

        return $query;
    }

    function avg_ik7(){
        $query=$this->db->query("select avg(hasil_analisa_indikator) as 'rata' from analisa_indikator where indikator_pertama='IK7'");

        return $query;
    }

    function ik8(){
        $query=$this->db->query("select id_analisa_indikator,nilai_analisa_indikator from analisa_indikator where indikator_kedua='IK8'");

        return $query;
    }

    function sum_ik8(){
        $query=$this->db->query("select sum(nilai_analisa_indikator) as sum_ik_8 from analisa_indikator where indikator_kedua='IK8'");

        return $query;
    }

    function hasil_ik8(){
        $query=$this->db->query("select id_analisa_indikator,hasil_analisa_indikator from analisa_indikator where indikator_pertama='IK8'");

        return $query;
    }

    function avg_ik8(){
        $query=$this->db->query("select avg(hasil_analisa_indikator) as 'rata' from analisa_indikator where indikator_pertama='IK8'");

        return $query;
    }

    function jumlah_hasil_indikator_k2(){
        $query=$this->db->query("select id_indikator,jumlah_hasil_analisa_indikator from data_indikator where id_kategori='K2' order by id_indikator");

        return $query;
    }

    function ik9(){
        $query=$this->db->query("select id_analisa_indikator,nilai_analisa_indikator from analisa_indikator where indikator_kedua='IK9'");

        return $query;
    }

    function sum_ik9(){
        $query=$this->db->query("select sum(nilai_analisa_indikator) as sum_ik_9 from analisa_indikator where indikator_kedua='IK9'");

        return $query;
    }

    function hasil_ik9(){
        $query=$this->db->query("select id_analisa_indikator,hasil_analisa_indikator from analisa_indikator where indikator_pertama='IK9'");

        return $query;
    }

    function avg_ik9(){
        $query=$this->db->query("select avg(hasil_analisa_indikator) as 'rata' from analisa_indikator where indikator_pertama='IK9'");

        return $query;
    }

    function ik10(){
        $query=$this->db->query("select id_analisa_indikator,nilai_analisa_indikator from analisa_indikator where indikator_kedua='IK10'");

        return $query;
    }

    function sum_ik10(){
        $query=$this->db->query("select sum(nilai_analisa_indikator) as sum_ik_10 from analisa_indikator where indikator_kedua='IK10'");

        return $query;
    }

    function hasil_ik10(){
        $query=$this->db->query("select id_analisa_indikator,hasil_analisa_indikator from analisa_indikator where indikator_pertama='IK10'");

        return $query;
    }

    function avg_ik10(){
        $query=$this->db->query("select avg(hasil_analisa_indikator) as 'rata' from analisa_indikator where indikator_pertama='IK10'");

        return $query;
    }

    function jumlah_hasil_indikator_k3(){
        $query=$this->db->query("select id_indikator,jumlah_hasil_analisa_indikator from data_indikator where id_kategori='K3' order by id_indikator");

        return $query;
    }

    function ik11(){
        $query=$this->db->query("select id_analisa_indikator,nilai_analisa_indikator from analisa_indikator where indikator_kedua='IK11'");

        return $query;
    }

    function sum_ik11(){
        $query=$this->db->query("select sum(nilai_analisa_indikator) as sum_ik_11 from analisa_indikator where indikator_kedua='IK11'");

        return $query;
    }

    function hasil_ik11(){
        $query=$this->db->query("select id_analisa_indikator,hasil_analisa_indikator from analisa_indikator where indikator_pertama='IK11'");

        return $query;
    }

    function avg_ik11(){
        $query=$this->db->query("select avg(hasil_analisa_indikator) as 'rata' from analisa_indikator where indikator_pertama='IK11'");

        return $query;
    }

    function ik12(){
        $query=$this->db->query("select id_analisa_indikator,nilai_analisa_indikator from analisa_indikator where indikator_kedua='IK12'");

        return $query;
    }

    function sum_ik12(){
        $query=$this->db->query("select sum(nilai_analisa_indikator) as sum_ik_12 from analisa_indikator where indikator_kedua='IK12'");

        return $query;
    }

    function hasil_ik12(){
        $query=$this->db->query("select id_analisa_indikator,hasil_analisa_indikator from analisa_indikator where indikator_pertama='IK12'");

        return $query;
    }

    function avg_ik12(){
        $query=$this->db->query("select avg(hasil_analisa_indikator) as 'rata' from analisa_indikator where indikator_pertama='IK12'");

        return $query;
    }

    function ik13(){
        $query=$this->db->query("select id_analisa_indikator,nilai_analisa_indikator from analisa_indikator where indikator_kedua='IK13'");

        return $query;
    }

    function sum_ik13(){
        $query=$this->db->query("select sum(nilai_analisa_indikator) as sum_ik_13 from analisa_indikator where indikator_kedua='IK13'");

        return $query;
    }

    function hasil_ik13(){
        $query=$this->db->query("select id_analisa_indikator,hasil_analisa_indikator from analisa_indikator where indikator_pertama='IK13'");

        return $query;
    }

    function avg_ik13(){
        $query=$this->db->query("select avg(hasil_analisa_indikator) as 'rata' from analisa_indikator where indikator_pertama='IK13'");

        return $query;
    }

    function ik14(){
        $query=$this->db->query("select id_analisa_indikator,nilai_analisa_indikator from analisa_indikator where indikator_kedua='IK14'");

        return $query;
    }

    function sum_ik14(){
        $query=$this->db->query("select sum(nilai_analisa_indikator) as sum_ik_14 from analisa_indikator where indikator_kedua='IK14'");

        return $query;
    }

    function hasil_ik14(){
        $query=$this->db->query("select id_analisa_indikator,hasil_analisa_indikator from analisa_indikator where indikator_pertama='IK14'");

        return $query;
    }

    function avg_ik14(){
        $query=$this->db->query("select avg(hasil_analisa_indikator) as 'rata' from analisa_indikator where indikator_pertama='IK14'");

        return $query;
    }

    function jumlah_hasil_indikator_k4(){
        $query=$this->db->query("select id_indikator,jumlah_hasil_analisa_indikator from data_indikator where id_kategori='K4' order by id_indikator");

        return $query;
    }

    function ik15(){
        $query=$this->db->query("select id_analisa_indikator,nilai_analisa_indikator from analisa_indikator where indikator_kedua='IK15'");

        return $query;
    }

    function sum_ik15(){
        $query=$this->db->query("select sum(nilai_analisa_indikator) as sum_ik_15 from analisa_indikator where indikator_kedua='IK15'");

        return $query;
    }

    function hasil_ik15(){
        $query=$this->db->query("select id_analisa_indikator,hasil_analisa_indikator from analisa_indikator where indikator_pertama='IK15'");

        return $query;
    }

    function avg_ik15(){
        $query=$this->db->query("select avg(hasil_analisa_indikator) as 'rata' from analisa_indikator where indikator_pertama='IK15'");

        return $query;
    }

    function ik16(){
        $query=$this->db->query("select id_analisa_indikator,nilai_analisa_indikator from analisa_indikator where indikator_kedua='IK16'");

        return $query;
    }

    function sum_ik16(){
        $query=$this->db->query("select sum(nilai_analisa_indikator) as sum_ik_16 from analisa_indikator where indikator_kedua='IK16'");

        return $query;
    }

    function hasil_ik16(){
        $query=$this->db->query("select id_analisa_indikator,hasil_analisa_indikator from analisa_indikator where indikator_pertama='IK16'");

        return $query;
    }

    function avg_ik16(){
        $query=$this->db->query("select avg(hasil_analisa_indikator) as 'rata' from analisa_indikator where indikator_pertama='IK16'");

        return $query;
    }

    function jumlah_hasil_indikator_k5(){
        $query=$this->db->query("select id_indikator,jumlah_hasil_analisa_indikator from data_indikator where id_kategori='K5' order by id_indikator");

        return $query;
    }

}
?>