<?php

class Indikator extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model(array('jabatan_model','unitkerja_model','pegawai_model','kategori_model','indikator_model','analisa_indikator_model'));
        $this->load->library(array('session','form_validation','encryption'));
		$this->load->helper(array('url','form','download'));
    }

    function index(){
    	$data['username'] = $this->session->userdata('username');
		$data['level'] = $this->session->userdata('level');
		$login=$this->session->userdata('login');
		if($login==false)redirect(base_url('auth'));
        $data['unitkerja']=$this->unitkerja_model->unitkerja();
        $data['jabatan']=$this->jabatan_model->jabatan();
		$data['content']='indikator';
		$this->load->view('template',$data);
    }

    function tambah_indikator(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        $data['kategori']=$this->kategori_model->kategori();
        $data['jabatan']=$this->jabatan_model->jabatan();
        $data['content']='tambah_indikator';
        $this->load->view('template',$data);
    }

    function proses_tambah_indikator(){
        $data['id_indikator']=$this->input->post('id_indikator');
        $data['nama_indikator']=$this->input->post('indikator');
        $data['id_jabatan']=$this->input->post('id_jabatan');
        $data['id_kategori']=$this->input->post('id_kategori');
        $this->form_validation->set_rules('id_indikator','id_indikator','required');
        $this->form_validation->set_rules('indikator','indikator','required');
        if($this->form_validation->run() == FALSE){
            ?>
                <script>alert("Maaf, Form Tidak Boleh Kosong");</script>
            <?php
                redirect(base_url('indikator/tambah_indikator'), 'refresh');
        }
        else{
            $this->indikator_model->insert_indikator($data);
            ?>
                <script>alert("Data Berhasil Ditambah");</script>
            <?php
                redirect(base_url('indikator/daftar_indikator'), 'refresh'); 
        }
    }

    function edit_indikator(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        $id_indikator=$this->uri->segment(3);
        $data['indikator']=$this->indikator_model->select_indikator_by_id($id_indikator);
        $data['content']='edit_indikator';
        $this->load->view('template',$data);
    }

    function proses_edit_indikator(){
        $id_indikator              = $this->input->post('id_indikator');
        $data['id_indikator']           = trim(strip_tags($this->input->post('id_indikator2')));
        $data['nama_indikator']           = trim(strip_tags($this->input->post('indikator')));
        $data['kd_jabatan']           = trim(strip_tags($this->input->post('kd_jabatan')));
        $data['id_kategori']           = trim(strip_tags($this->input->post('id_kategori')));
        $this->form_validation->set_rules('id_indikator2','id_indikator2','required');
        $this->form_validation->set_rules('indikator','indikator','required');
        if($this->form_validation->run() == FALSE){
            ?>
                <script>alert("Maaf, Form Tidak Boleh Kosong");</script>
            <?php
                redirect(base_url('indikator/daftar_indikator'), 'refresh');
        }
        else{
            $this->indikator_model->update_data_indikator($id_indikator,$data);
            ?>
                <script>alert("Data Berhasil Diubah");</script>
            <?php
                redirect(base_url('indikator/daftar_indikator'), 'refresh'); 
        }
    }

    function daftar_indikator(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        $data['indikator']=$this->indikator_model->select_indikator();
        $data['content']='daftar_indikator';
        $this->load->view('template',$data); 
    }

    function ambil_data(){
        $id_unitkerja             = $this->input->get('unitkerja');
        $data['pegawai']          = $this->pegawai_model->select_pegawai_by_unitkerja($id_unitkerja);
        $this->load->view('page/pegawai', $data);
    }

    function cari_user(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        $id_unitkerja = $this->input->post('unitkerja');
        $nip = $this->input->post('pegawai');
        $id_jabatan= $this->input->post('jabatan');
        $data['id_unitkerja'] = $this->input->post('unitkerja');
        $data['id_pegawai'] = $this->input->post('pegawai');
        $data['id_jabatan'] = $this->input->post('jabatan');
        $data['unitkerja']=$this->unitkerja_model->unitkerja();
        $data['jabatan']=$this->jabatan_model->jabatan();
        $data['pegawai']=$this->pegawai_model->select_pegawai_by_nip_unitkerja($nip,$id_unitkerja);
        $data['indikator']=$this->indikator_model->lihat_indikator_by_jabatan($id_jabatan);
        $data['content']='indikator';
        $this->load->view('template',$data);
    }

    function cari_realisasi(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        $id_unitkerja = $this->input->post('unitkerja');
        $nip = $this->input->post('pegawai');
        $data['id_unitkerja'] = $this->input->post('unitkerja');
        $data['id_pegawai'] = $this->input->post('pegawai');
        $data['unitkerja']=$this->unitkerja_model->unitkerja();
        $data['pegawai']=$this->pegawai_model->select_pegawai_by_nip_unitkerja($nip,$id_unitkerja);
        $data['indikator']=$this->indikator_model->select_data_indikator_by_nip($nip);
        $data['content']='realisasi_indikator';
        $this->load->view('template',$data);
    }

    function proses_target_indikator(){
        $nip=$this->input->post('nip');
        $id_indikator=$this->input->post('id_indikator');
        $indikator=$this->input->post('indikator');
        $target_output=$this->input->post('target_output');
        $ket_output=$this->input->post('ket_output');
        $target_kualitas=$this->input->post('target_kualitas');
        $target_waktu=$this->input->post('target_waktu');
        $target_biaya=$this->input->post('target_biaya');
        $target_pencapaian=$this->input->post('target_pencapaian');
        $kd_kategori=$this->input->post('kategori');

        $count_data=count($this->input->post('indikator'));

        for ($i=0; $i < $count_data; $i++) { 
            # code...
            $data=array(
                'nip'=>$nip,
                'id_indikator'=>$id_indikator[$i],
                'indikator'=>$indikator[$i],
                'target_output'=>$target_output[$i],
                'ket_output'=>$ket_output[$i],
                'target_kualitas'=>$target_kualitas[$i],
                'target_waktu'=>$target_waktu[$i],
                'target_biaya'=>$target_biaya[$i],
                'target_pencapaian'=>$target_pencapaian[$i]
            );
            $this->indikator_model->insert($data);
        }
        ?>
        <script>alert("Data Berhasil Ditambah");</script>
        <?php
        redirect(base_url('indikator'), 'refresh');
       
    }

    function realisasi_indikator(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        $data['unitkerja']=$this->unitkerja_model->unitkerja();
        $data['content']='realisasi_indikator';
        $this->load->view('template',$data);
    }

    function proses_realisasi_indikator(){
        $nip=$this->input->post('nip');
       
        $kd_indikator=$this->input->post('kd_indikator');
        $target_output=$this->input->post('target_output');
        $realisasi_output=$this->input->post('realisasi_output');
        $target_kualitas=$this->input->post('target_kualitas');
        $realisasi_kualitas=$this->input->post('realisasi_kualitas');
        $target_waktu=$this->input->post('target_waktu');
        $realisasi_waktu=$this->input->post('realisasi_waktu');
        $target_biaya=$this->input->post('target_biaya');
        $realisasi_biaya=$this->input->post('realisasi_biaya');

        $indikator=$this->indikator_model->select_indikator_by_nip($nip);
        $count_indikator=$indikator->num_rows();

        //echo $count_indikator;

        for ($i=0; $i < $count_indikator ; $i++) { 
            # code...
            $data=array(
                    'kd_indikator'=>$kd_indikator[$i],
                    'realisasi_output'=>$realisasi_output[$i],
                    'realisasi_kualitas'=>$realisasi_kualitas[$i],
                    'realisasi_waktu'=>$realisasi_waktu[$i],
                    'skor_pencapaian'=>(@($realisasi_output[$i]/$target_output[$i]*100) + @($realisasi_kualitas[$i]/$target_kualitas[$i]*100) + @((1.76*$target_waktu[$i]-$realisasi_waktu[$i])/$target_waktu[$i]*100))/3
            );
           $this->db->where('kd_indikator',$data['kd_indikator']);
           $this->db->update('indikator',$data);                     
        }
        ?>
            <script>alert("Data Berhasil Diubah");</script>
        <?php
        redirect(base_url('indikator/realisasi_indikator'), 'refresh'); 
    
    }

    function analisa_indikator(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        $data['content']='analisa_indikator';
        $data['kategori']=$this->kategori_model->kategori();
        $this->load->view('template',$data);
    }

    function cari_kategori(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        $kategori=$this->input->post('kategori');
        $data['post_kategori']=$this->input->post('kategori');
        $data['kategori']=$this->kategori_model->kategori();
        $data['count']=$this->indikator_model->count_indikator($kategori);
        $data['indikator']=$this->indikator_model->cari_indikator_by_kategori($kategori);
        $data['nilai']=$this->kategori_model->nilai_kategori();
        $data['k1']=$this->analisa_indikator_model->k1();
        $data['ujung_k1']=$this->analisa_indikator_model->ujung_k1();
        $data['k2']=$this->analisa_indikator_model->k2();
        $data['ujung_k2']=$this->analisa_indikator_model->ujung_k2();
        $data['k3']=$this->analisa_indikator_model->k3();
        $data['ujung_k3']=$this->analisa_indikator_model->ujung_k3();
        $data['k4']=$this->analisa_indikator_model->k4();
        $data['ujung_k4']=$this->analisa_indikator_model->ujung_k4();
        $data['k5']=$this->analisa_indikator_model->k5();
        $data['ujung_k5']=$this->analisa_indikator_model->ujung_k5();
        $data['content']='analisa_indikator';
        $this->load->view('template',$data);
    }

    function proses_indikator_cpns(){
        $id_analisa_indikator_k1=$this->input->post('id_analisa_indikator_k1');
        $nilai=$this->input->post('nilai');
        $count_data=count($id_analisa_indikator_k1);
        for ($i=0; $i < $count_data ; $i++) { 
            # code...
            $data=array(
                'id_analisa_indikator'=>$id_analisa_indikator_k1[$i],
                'nilai_analisa_indikator'=>$nilai[$i]
                );
            $this->db->where('id_analisa_indikator',$data['id_analisa_indikator']);
            $this->db->update('analisa_indikator',$data);
        }
        $sum_ik1=$this->analisa_indikator_model->sum_ik1();
        foreach ($sum_ik1->result_array() as $sum_ik1_item) {
            # code...
            $jumlah=$sum_ik1_item['sum_ik_1'];
            $data=array(
                'jumlah_hasil_analisa_indikator'=>$jumlah
            );
           $this->db->where('id_indikator','IK1');
           $this->db->update('data_indikator',$data);
        }
        $sum_ik2=$this->analisa_indikator_model->sum_ik2();
        foreach ($sum_ik2->result_array() as $sum_ik2_item) {
            # code...
            $jumlah=$sum_ik2_item['sum_ik_2'];
            $data=array(
                'jumlah_hasil_analisa_indikator'=>$jumlah
            );
           $this->db->where('id_indikator','IK2');
           $this->db->update('data_indikator',$data);
        }
        $sum_ik3=$this->analisa_indikator_model->sum_ik3();
        foreach ($sum_ik3->result_array() as $sum_ik3_item) {
            # code...
            $jumlah=$sum_ik3_item['sum_ik_3'];
            $data=array(
                'jumlah_hasil_analisa_indikator'=>$jumlah
            );
           $this->db->where('id_indikator','IK3');
           $this->db->update('data_indikator',$data);
        }
        $sum_ik4=$this->analisa_indikator_model->sum_ik4();
        foreach ($sum_ik4->result_array() as $sum_ik4_item) {
            # code...
            $jumlah=$sum_ik4_item['sum_ik_4'];
            $data=array(
                'jumlah_hasil_analisa_indikator'=>$jumlah
            );
           $this->db->where('id_indikator','IK4');
           $this->db->update('data_indikator',$data);
        }
        $sum_ik5=$this->analisa_indikator_model->sum_ik5();
        foreach ($sum_ik5->result_array() as $sum_ik5_item) {
            # code...
            $jumlah=$sum_ik5_item['sum_ik_5'];
            $data=array(
                'jumlah_hasil_analisa_indikator'=>$jumlah
            );
           $this->db->where('id_indikator','IK5');
           $this->db->update('data_indikator',$data);
        }

        $ik1=$this->analisa_indikator_model->ik1();
        foreach ($ik1->result_array() as $ik1_item) {
            # code...
            $nilai=$ik1_item['nilai_analisa_indikator'];
            $id_analisa=$ik1_item['id_analisa_indikator'];
            foreach ($sum_ik1->result_array() as $sum_ik1_item) {
                # code...
            $jumlah=$sum_ik1_item['sum_ik_1'];
            }
            $hasil=$nilai/$jumlah;
            $data=array(
                'id_analisa_indikator'=>$id_analisa,
                'hasil_analisa_indikator'=>$hasil
                );
            $this->db->where('id_analisa_indikator',$data['id_analisa_indikator']);
            $this->db->update('analisa_indikator',$data);
        }
        $ik2=$this->analisa_indikator_model->ik2();
        foreach ($ik2->result_array() as $ik2_item) {
            # code...
            $nilai=$ik2_item['nilai_analisa_indikator'];
            $id_analisa=$ik2_item['id_analisa_indikator'];
            foreach ($sum_ik2->result_array() as $sum_ik2_item) {
                # code...
            $jumlah=$sum_ik2_item['sum_ik_2'];
            }
            $hasil=$nilai/$jumlah;
            $data=array(
                'id_analisa_indikator'=>$id_analisa,
                'hasil_analisa_indikator'=>$hasil
                );
            $this->db->where('id_analisa_indikator',$data['id_analisa_indikator']);
            $this->db->update('analisa_indikator',$data);
        }
        $ik3=$this->analisa_indikator_model->ik3();
        foreach ($ik3->result_array() as $ik3_item) {
            # code...
            $nilai=$ik3_item['nilai_analisa_indikator'];
            $id_analisa=$ik3_item['id_analisa_indikator'];
            foreach ($sum_ik3->result_array() as $sum_ik3_item) {
                # code...
            $jumlah=$sum_ik3_item['sum_ik_3'];
            }
            $hasil=$nilai/$jumlah;
            $data=array(
                'id_analisa_indikator'=>$id_analisa,
                'hasil_analisa_indikator'=>$hasil
                );
            $this->db->where('id_analisa_indikator',$data['id_analisa_indikator']);
            $this->db->update('analisa_indikator',$data);
        }
        $ik4=$this->analisa_indikator_model->ik4();
        foreach ($ik4->result_array() as $ik4_item) {
            # code...
            $nilai=$ik4_item['nilai_analisa_indikator'];
            $id_analisa=$ik4_item['id_analisa_indikator'];
            foreach ($sum_ik4->result_array() as $sum_ik4_item) {
                # code...
            $jumlah=$sum_ik4_item['sum_ik_4'];
            }
            $hasil=$nilai/$jumlah;
            $data=array(
                'id_analisa_indikator'=>$id_analisa,
                'hasil_analisa_indikator'=>$hasil
                );
            $this->db->where('id_analisa_indikator',$data['id_analisa_indikator']);
            $this->db->update('analisa_indikator',$data);
        }
        $ik5=$this->analisa_indikator_model->ik5();
        foreach ($ik5->result_array() as $ik5_item) {
            # code...
            $nilai=$ik5_item['nilai_analisa_indikator'];
            $id_analisa=$ik5_item['id_analisa_indikator'];
            foreach ($sum_ik5->result_array() as $sum_ik5_item) {
                # code...
            $jumlah=$sum_ik5_item['sum_ik_5'];
            }
            $hasil=$nilai/$jumlah;
            $data=array(
                'id_analisa_indikator'=>$id_analisa,
                'hasil_analisa_indikator'=>$hasil
                );
            $this->db->where('id_analisa_indikator',$data['id_analisa_indikator']);
            $this->db->update('analisa_indikator',$data);
        }

        $avg_ik1=$this->analisa_indikator_model->avg_ik1();
        foreach ($avg_ik1->result_array() as $avg_ik1_item) {
            # code...
            $ev_ik1=$avg_ik1_item['rata'];
            $data=array(
                'nilai_eigenvector'=>$ev_ik1
                );
            $this->db->where('id_indikator','IK1');
            $this->db->update('data_indikator',$data);
        }
        $avg_ik2=$this->analisa_indikator_model->avg_ik2();
        foreach ($avg_ik2->result_array() as $avg_ik2_item) {
            # code...
            $ev_ik2=$avg_ik2_item['rata'];
            $data=array(
                'nilai_eigenvector'=>$ev_ik2
                );
            $this->db->where('id_indikator','IK2');
            $this->db->update('data_indikator',$data);
        }
        $avg_ik3=$this->analisa_indikator_model->avg_ik3();
        foreach ($avg_ik3->result_array() as $avg_ik3_item) {
            # code...
            $ev_ik3=$avg_ik3_item['rata'];
            $data=array(
                'nilai_eigenvector'=>$ev_ik3
                );
            $this->db->where('id_indikator','IK3');
            $this->db->update('data_indikator',$data);
        }
        $avg_ik4=$this->analisa_indikator_model->avg_ik4();
        foreach ($avg_ik4->result_array() as $avg_ik4_item) {
            # code...
            $ev_ik4=$avg_ik4_item['rata'];
            $data=array(
                'nilai_eigenvector'=>$ev_ik4
                );
            $this->db->where('id_indikator','IK4');
            $this->db->update('data_indikator',$data);
        }
        $avg_ik5=$this->analisa_indikator_model->avg_ik5();
        foreach ($avg_ik5->result_array() as $avg_ik5_item) {
            # code...
            $ev_ik5=$avg_ik5_item['rata'];
            $data=array(
                'nilai_eigenvector'=>$ev_ik5
                );
            $this->db->where('id_indikator','IK5');
            $this->db->update('data_indikator',$data);
        }
        redirect(base_url('indikator/hasil_analisa_indikator_cpns'), 'refresh'); 
    }

    function hasil_analisa_indikator_cpns(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        $data['ik1']=$this->analisa_indikator_model->ik1();
        $data['ik2']=$this->analisa_indikator_model->ik2();
        $data['ik3']=$this->analisa_indikator_model->ik3();
        $data['ik4']=$this->analisa_indikator_model->ik4();
        $data['ik5']=$this->analisa_indikator_model->ik5();
        $data['jumlah']=$this->analisa_indikator_model->jumlah_hasil_indikator_k1();
        $data['hasil_ik1']=$this->analisa_indikator_model->hasil_ik1();
        $data['hasil_ik2']=$this->analisa_indikator_model->hasil_ik2();
        $data['hasil_ik3']=$this->analisa_indikator_model->hasil_ik3();
        $data['hasil_ik4']=$this->analisa_indikator_model->hasil_ik4();
        $data['hasil_ik5']=$this->analisa_indikator_model->hasil_ik5();
        $data['avg_ik1']=$this->analisa_indikator_model->avg_ik1();
        $data['avg_ik2']=$this->analisa_indikator_model->avg_ik2();
        $data['avg_ik3']=$this->analisa_indikator_model->avg_ik3();
        $data['avg_ik4']=$this->analisa_indikator_model->avg_ik4();
        $data['avg_ik5']=$this->analisa_indikator_model->avg_ik5();
        $data['content']='hasil_analisa_indikator_cpns';
        $this->load->view('template',$data);
    }

    function proses_indikator_pns(){
        $id_analisa_indikator_k2=$this->input->post('id_analisa_indikator_k2');
        $nilai=$this->input->post('nilai');
        $count_data=count($id_analisa_indikator_k2);
        for ($i=0; $i < $count_data ; $i++) { 
            # code...
            $data=array(
                'id_analisa_indikator'=>$id_analisa_indikator_k2[$i],
                'nilai_analisa_indikator'=>$nilai[$i]
                );
            $this->db->where('id_analisa_indikator',$data['id_analisa_indikator']);
            $this->db->update('analisa_indikator',$data);
        }
        $sum_ik6=$this->analisa_indikator_model->sum_ik6();
        foreach ($sum_ik6->result_array() as $sum_ik6_item) {
            # code...
            $jumlah=$sum_ik6_item['sum_ik_6'];
            $data=array(
                'jumlah_hasil_analisa_indikator'=>$jumlah
            );
           $this->db->where('id_indikator','IK6');
           $this->db->update('data_indikator',$data);
        }
        $sum_ik7=$this->analisa_indikator_model->sum_ik7();
        foreach ($sum_ik7->result_array() as $sum_ik7_item) {
            # code...
            $jumlah=$sum_ik7_item['sum_ik_7'];
            $data=array(
                'jumlah_hasil_analisa_indikator'=>$jumlah
            );
           $this->db->where('id_indikator','IK7');
           $this->db->update('data_indikator',$data);
        }
        $sum_ik8=$this->analisa_indikator_model->sum_ik8();
        foreach ($sum_ik8->result_array() as $sum_ik8_item) {
            # code...
            $jumlah=$sum_ik8_item['sum_ik_8'];
            $data=array(
                'jumlah_hasil_analisa_indikator'=>$jumlah
            );
           $this->db->where('id_indikator','IK8');
           $this->db->update('data_indikator',$data);
        }

        $ik6=$this->analisa_indikator_model->ik6();
        foreach ($ik6->result_array() as $ik6_item) {
            # code...
            $nilai=$ik6_item['nilai_analisa_indikator'];
            $id_analisa=$ik6_item['id_analisa_indikator'];
            foreach ($sum_ik6->result_array() as $sum_ik6_item) {
                # code...
            $jumlah=$sum_ik6_item['sum_ik_6'];
            }
            $hasil=$nilai/$jumlah;
            $data=array(
                'id_analisa_indikator'=>$id_analisa,
                'hasil_analisa_indikator'=>$hasil
                );
            $this->db->where('id_analisa_indikator',$data['id_analisa_indikator']);
            $this->db->update('analisa_indikator',$data);
        }
        $ik7=$this->analisa_indikator_model->ik7();
        foreach ($ik7->result_array() as $ik7_item) {
            # code...
            $nilai=$ik7_item['nilai_analisa_indikator'];
            $id_analisa=$ik7_item['id_analisa_indikator'];
            foreach ($sum_ik7->result_array() as $sum_ik7_item) {
                # code...
            $jumlah=$sum_ik7_item['sum_ik_7'];
            }
            $hasil=$nilai/$jumlah;
            $data=array(
                'id_analisa_indikator'=>$id_analisa,
                'hasil_analisa_indikator'=>$hasil
                );
            $this->db->where('id_analisa_indikator',$data['id_analisa_indikator']);
            $this->db->update('analisa_indikator',$data);
        }
         $ik8=$this->analisa_indikator_model->ik8();
        foreach ($ik8->result_array() as $ik8_item) {
            # code...
            $nilai=$ik8_item['nilai_analisa_indikator'];
            $id_analisa=$ik8_item['id_analisa_indikator'];
            foreach ($sum_ik8->result_array() as $sum_ik8_item) {
                # code...
            $jumlah=$sum_ik8_item['sum_ik_8'];
            }
            $hasil=$nilai/$jumlah;
            $data=array(
                'id_analisa_indikator'=>$id_analisa,
                'hasil_analisa_indikator'=>$hasil
                );
            $this->db->where('id_analisa_indikator',$data['id_analisa_indikator']);
            $this->db->update('analisa_indikator',$data);
        }

        $avg_ik6=$this->analisa_indikator_model->avg_ik6();
        foreach ($avg_ik6->result_array() as $avg_ik6_item) {
            # code...
            $ev_ik6=$avg_ik6_item['rata'];
            $data=array(
                'nilai_eigenvector'=>$ev_ik6
                );
            $this->db->where('id_indikator','IK6');
            $this->db->update('data_indikator',$data);
        }
        $avg_ik7=$this->analisa_indikator_model->avg_ik7();
        foreach ($avg_ik7->result_array() as $avg_ik7_item) {
            # code...
            $ev_ik7=$avg_ik7_item['rata'];
            $data=array(
                'nilai_eigenvector'=>$ev_ik7
                );
            $this->db->where('id_indikator','IK7');
            $this->db->update('data_indikator',$data);
        }
        $avg_ik8=$this->analisa_indikator_model->avg_ik8();
        foreach ($avg_ik8->result_array() as $avg_ik8_item) {
            # code...
            $ev_ik8=$avg_ik8_item['rata'];
            $data=array(
                'nilai_eigenvector'=>$ev_ik8
                );
            $this->db->where('id_indikator','IK8');
            $this->db->update('data_indikator',$data);
        }
        redirect(base_url('indikator/hasil_analisa_indikator_pns'), 'refresh'); 
        
    }

    function hasil_analisa_indikator_pns(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        $data['ik6']=$this->analisa_indikator_model->ik6();
        $data['ik7']=$this->analisa_indikator_model->ik7();
        $data['ik8']=$this->analisa_indikator_model->ik8();
        $data['jumlah']=$this->analisa_indikator_model->jumlah_hasil_indikator_k2();
        $data['hasil_ik6']=$this->analisa_indikator_model->hasil_ik6();
        $data['hasil_ik7']=$this->analisa_indikator_model->hasil_ik7();
        $data['hasil_ik8']=$this->analisa_indikator_model->hasil_ik8();
        $data['avg_ik6']=$this->analisa_indikator_model->avg_ik6();
        $data['avg_ik7']=$this->analisa_indikator_model->avg_ik7();
        $data['avg_ik8']=$this->analisa_indikator_model->avg_ik8();
        $data['content']='hasil_analisa_indikator_pns';
        $this->load->view('template',$data);
    }

    function proses_indikator_jabatan(){ 
        $id_analisa_indikator_k3=$this->input->post('id_analisa_indikator_k3');
        $nilai=$this->input->post('nilai');
        $count_data=count($id_analisa_indikator_k3);
        for ($i=0; $i < $count_data ; $i++) { 
            # code...
            $data=array(
                'id_analisa_indikator'=>$id_analisa_indikator_k3[$i],
                'nilai_analisa_indikator'=>$nilai[$i]
                );
            $this->db->where('id_analisa_indikator',$data['id_analisa_indikator']);
            $this->db->update('analisa_indikator',$data);
        }
        $sum_ik9=$this->analisa_indikator_model->sum_ik9();
        foreach ($sum_ik9->result_array() as $sum_ik9_item) {
            # code...
            $jumlah=$sum_ik9_item['sum_ik_9'];
            $data=array(
                'jumlah_hasil_analisa_indikator'=>$jumlah
            );
           $this->db->where('id_indikator','IK9');
           $this->db->update('data_indikator',$data);
        }
        $sum_ik10=$this->analisa_indikator_model->sum_ik10();
        foreach ($sum_ik10->result_array() as $sum_ik10_item) {
            # code...
            $jumlah=$sum_ik10_item['sum_ik_10'];
            $data=array(
                'jumlah_hasil_analisa_indikator'=>$jumlah
            );
           $this->db->where('id_indikator','IK10');
           $this->db->update('data_indikator',$data);
        }

        $ik9=$this->analisa_indikator_model->ik9();
        foreach ($ik9->result_array() as $ik9_item) {
            # code...
            $nilai=$ik9_item['nilai_analisa_indikator'];
            $id_analisa=$ik9_item['id_analisa_indikator'];
            foreach ($sum_ik9->result_array() as $sum_ik9_item) {
                # code...
            $jumlah=$sum_ik9_item['sum_ik_9'];
            }
            $hasil=$nilai/$jumlah;
            $data=array(
                'id_analisa_indikator'=>$id_analisa,
                'hasil_analisa_indikator'=>$hasil
                );
            $this->db->where('id_analisa_indikator',$data['id_analisa_indikator']);
            $this->db->update('analisa_indikator',$data);
        }
        $ik10=$this->analisa_indikator_model->ik10();
        foreach ($ik10->result_array() as $ik10_item) {
            # code...
            $nilai=$ik10_item['nilai_analisa_indikator'];
            $id_analisa=$ik10_item['id_analisa_indikator'];
            foreach ($sum_ik10->result_array() as $sum_ik10_item) {
                # code...
            $jumlah=$sum_ik10_item['sum_ik_10'];
            }
            $hasil=$nilai/$jumlah;
            $data=array(
                'id_analisa_indikator'=>$id_analisa,
                'hasil_analisa_indikator'=>$hasil
                );
            $this->db->where('id_analisa_indikator',$data['id_analisa_indikator']);
            $this->db->update('analisa_indikator',$data);
        }

        $avg_ik9=$this->analisa_indikator_model->avg_ik9();
        foreach ($avg_ik9->result_array() as $avg_ik9_item) {
            # code...
            $ev_ik9=$avg_ik9_item['rata'];
            $data=array(
                'nilai_eigenvector'=>$ev_ik9
                );
            $this->db->where('id_indikator','IK9');
            $this->db->update('data_indikator',$data);
        }
        $avg_ik10=$this->analisa_indikator_model->avg_ik10();
        foreach ($avg_ik10->result_array() as $avg_ik10_item) {
            # code...
            $ev_ik10=$avg_ik10_item['rata'];
            $data=array(
                'nilai_eigenvector'=>$ev_ik10
                );
            $this->db->where('id_indikator','IK10');
            $this->db->update('data_indikator',$data);
        }
        redirect(base_url('indikator/hasil_analisa_indikator_jabatan'), 'refresh');
    }

    function hasil_analisa_indikator_jabatan(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        $data['ik9']=$this->analisa_indikator_model->ik9();
        $data['ik10']=$this->analisa_indikator_model->ik10();
        $data['jumlah']=$this->analisa_indikator_model->jumlah_hasil_indikator_k3();
        $data['hasil_ik9']=$this->analisa_indikator_model->hasil_ik9();
        $data['hasil_ik10']=$this->analisa_indikator_model->hasil_ik10();
        $data['avg_ik9']=$this->analisa_indikator_model->avg_ik9();
        $data['avg_ik10']=$this->analisa_indikator_model->avg_ik10();
        $data['content']='hasil_analisa_indikator_jabatan';
        $this->load->view('template',$data);
    }

    function proses_indikator_golongan(){
        $id_analisa_indikator_k4=$this->input->post('id_analisa_indikator_k4');
        $nilai=$this->input->post('nilai');
        $count_data=count($id_analisa_indikator_k4);
        for ($i=0; $i < $count_data ; $i++) { 
            # code...
            $data=array(
                'id_analisa_indikator'=>$id_analisa_indikator_k4[$i],
                'nilai_analisa_indikator'=>$nilai[$i]
                );
            $this->db->where('id_analisa_indikator',$data['id_analisa_indikator']);
            $this->db->update('analisa_indikator',$data);
        }

        $sum_ik11=$this->analisa_indikator_model->sum_ik11();
        foreach ($sum_ik11->result_array() as $sum_ik11_item) {
            # code...
            $jumlah=$sum_ik11_item['sum_ik_11'];
            $data=array(
                'jumlah_hasil_analisa_indikator'=>$jumlah
            );
           $this->db->where('id_indikator','IK11');
           $this->db->update('data_indikator',$data);
        }
        $sum_ik12=$this->analisa_indikator_model->sum_ik12();
        foreach ($sum_ik12->result_array() as $sum_ik12_item) {
            # code...
            $jumlah=$sum_ik12_item['sum_ik_12'];
            $data=array(
                'jumlah_hasil_analisa_indikator'=>$jumlah
            );
           $this->db->where('id_indikator','IK12');
           $this->db->update('data_indikator',$data);
        }
        $sum_ik13=$this->analisa_indikator_model->sum_ik13();
        foreach ($sum_ik13->result_array() as $sum_ik13_item) {
            # code...
            $jumlah=$sum_ik13_item['sum_ik_13'];
            $data=array(
                'jumlah_hasil_analisa_indikator'=>$jumlah
            );
           $this->db->where('id_indikator','IK13');
           $this->db->update('data_indikator',$data);
        }
        $sum_ik14=$this->analisa_indikator_model->sum_ik14();
        foreach ($sum_ik14->result_array() as $sum_ik14_item) {
            # code...
            $jumlah=$sum_ik14_item['sum_ik_14'];
            $data=array(
                'jumlah_hasil_analisa_indikator'=>$jumlah
            );
           $this->db->where('id_indikator','IK14');
           $this->db->update('data_indikator',$data);
        }

        $ik11=$this->analisa_indikator_model->ik11();
        foreach ($ik11->result_array() as $ik11_item) {
            # code...
            $nilai=$ik11_item['nilai_analisa_indikator'];
            $id_analisa=$ik11_item['id_analisa_indikator'];
            foreach ($sum_ik11->result_array() as $sum_ik11_item) {
                # code...
            $jumlah=$sum_ik11_item['sum_ik_11'];
            }
            $hasil=$nilai/$jumlah;
            $data=array(
                'id_analisa_indikator'=>$id_analisa,
                'hasil_analisa_indikator'=>$hasil
                );
            $this->db->where('id_analisa_indikator',$data['id_analisa_indikator']);
            $this->db->update('analisa_indikator',$data);
        }
        $ik12=$this->analisa_indikator_model->ik12();
        foreach ($ik12->result_array() as $ik12_item) {
            # code...
            $nilai=$ik12_item['nilai_analisa_indikator'];
            $id_analisa=$ik12_item['id_analisa_indikator'];
            foreach ($sum_ik12->result_array() as $sum_ik12_item) {
                # code...
            $jumlah=$sum_ik12_item['sum_ik_12'];
            }
            $hasil=$nilai/$jumlah;
            $data=array(
                'id_analisa_indikator'=>$id_analisa,
                'hasil_analisa_indikator'=>$hasil
                );
            $this->db->where('id_analisa_indikator',$data['id_analisa_indikator']);
            $this->db->update('analisa_indikator',$data);
        }
        $ik13=$this->analisa_indikator_model->ik13();
        foreach ($ik13->result_array() as $ik13_item) {
            # code...
            $nilai=$ik13_item['nilai_analisa_indikator'];
            $id_analisa=$ik13_item['id_analisa_indikator'];
            foreach ($sum_ik13->result_array() as $sum_ik13_item) {
                # code...
            $jumlah=$sum_ik13_item['sum_ik_13'];
            }
            $hasil=$nilai/$jumlah;
            $data=array(
                'id_analisa_indikator'=>$id_analisa,
                'hasil_analisa_indikator'=>$hasil
                );
            $this->db->where('id_analisa_indikator',$data['id_analisa_indikator']);
            $this->db->update('analisa_indikator',$data);
        }
        $ik14=$this->analisa_indikator_model->ik14();
        foreach ($ik14->result_array() as $ik14_item) {
            # code...
            $nilai=$ik14_item['nilai_analisa_indikator'];
            $id_analisa=$ik14_item['id_analisa_indikator'];
            foreach ($sum_ik14->result_array() as $sum_ik14_item) {
                # code...
            $jumlah=$sum_ik14_item['sum_ik_14'];
            }
            $hasil=$nilai/$jumlah;
            $data=array(
                'id_analisa_indikator'=>$id_analisa,
                'hasil_analisa_indikator'=>$hasil
                );
            $this->db->where('id_analisa_indikator',$data['id_analisa_indikator']);
            $this->db->update('analisa_indikator',$data);
        }
        
        $avg_ik11=$this->analisa_indikator_model->avg_ik11();
        foreach ($avg_ik11->result_array() as $avg_ik11_item) {
            # code...
            $ev_ik11=$avg_ik11_item['rata'];
            $data=array(
                'nilai_eigenvector'=>$ev_ik11
                );
            $this->db->where('id_indikator','IK11');
            $this->db->update('data_indikator',$data);
        }
        $avg_ik12=$this->analisa_indikator_model->avg_ik12();
        foreach ($avg_ik12->result_array() as $avg_ik12_item) {
            # code...
            $ev_ik12=$avg_ik12_item['rata'];
            $data=array(
                'nilai_eigenvector'=>$ev_ik12
                );
            $this->db->where('id_indikator','IK12');
            $this->db->update('data_indikator',$data);
        }
        $avg_ik13=$this->analisa_indikator_model->avg_ik13();
        foreach ($avg_ik13->result_array() as $avg_ik13_item) {
            # code...
            $ev_ik13=$avg_ik13_item['rata'];
            $data=array(
                'nilai_eigenvector'=>$ev_ik13
                );
            $this->db->where('id_indikator','IK13');
            $this->db->update('data_indikator',$data);
        }
        $avg_ik14=$this->analisa_indikator_model->avg_ik14();
        foreach ($avg_ik14->result_array() as $avg_ik14_item) {
            # code...
            $ev_ik14=$avg_ik14_item['rata'];
            $data=array(
                'nilai_eigenvector'=>$ev_ik14
                );
            $this->db->where('id_indikator','IK14');
            $this->db->update('data_indikator',$data);
        }
        redirect(base_url('indikator/hasil_analisa_indikator_golongan'), 'refresh');

    }

    function hasil_analisa_indikator_golongan(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        $data['ik11']=$this->analisa_indikator_model->ik11();
        $data['ik12']=$this->analisa_indikator_model->ik12();
        $data['ik13']=$this->analisa_indikator_model->ik13();
        $data['ik14']=$this->analisa_indikator_model->ik14();
        $data['jumlah']=$this->analisa_indikator_model->jumlah_hasil_indikator_k4();
        $data['hasil_ik11']=$this->analisa_indikator_model->hasil_ik11();
        $data['hasil_ik12']=$this->analisa_indikator_model->hasil_ik12();
        $data['hasil_ik13']=$this->analisa_indikator_model->hasil_ik13();
        $data['hasil_ik14']=$this->analisa_indikator_model->hasil_ik14();
        $data['avg_ik11']=$this->analisa_indikator_model->avg_ik11();
        $data['avg_ik12']=$this->analisa_indikator_model->avg_ik12();
        $data['avg_ik13']=$this->analisa_indikator_model->avg_ik13();
        $data['avg_ik14']=$this->analisa_indikator_model->avg_ik14();
        $data['content']='hasil_analisa_indikator_golongan';
        $this->load->view('template',$data);
    }

    function proses_indikator_pensiun(){
        $id_analisa_indikator_k5=$this->input->post('id_analisa_indikator_k5');
        $nilai=$this->input->post('nilai');
        $count_data=count($id_analisa_indikator_k5);
        for ($i=0; $i < $count_data ; $i++) { 
            # code...
            $data=array(
                'id_analisa_indikator'=>$id_analisa_indikator_k5[$i],
                'nilai_analisa_indikator'=>$nilai[$i]
                );
            $this->db->where('id_analisa_indikator',$data['id_analisa_indikator']);
            $this->db->update('analisa_indikator',$data);
        }
        $sum_ik15=$this->analisa_indikator_model->sum_ik15();
        foreach ($sum_ik15->result_array() as $sum_ik15_item) {
            # code...
            $jumlah=$sum_ik15_item['sum_ik_15'];
            $data=array(
                'jumlah_hasil_analisa_indikator'=>$jumlah
            );
           $this->db->where('id_indikator','IK15');
           $this->db->update('data_indikator',$data);
        }
        $sum_ik16=$this->analisa_indikator_model->sum_ik16();
        foreach ($sum_ik16->result_array() as $sum_ik16_item) {
            # code...
            $jumlah=$sum_ik16_item['sum_ik_16'];
            $data=array(
                'jumlah_hasil_analisa_indikator'=>$jumlah
            );
           $this->db->where('id_indikator','IK16');
           $this->db->update('data_indikator',$data);
        }

        $ik15=$this->analisa_indikator_model->ik15();
        foreach ($ik15->result_array() as $ik15_item) {
            # code...
            $nilai=$ik15_item['nilai_analisa_indikator'];
            $id_analisa=$ik15_item['id_analisa_indikator'];
            foreach ($sum_ik15->result_array() as $sum_ik15_item) {
                # code...
            $jumlah=$sum_ik15_item['sum_ik_15'];
            }
            $hasil=$nilai/$jumlah;
            $data=array(
                'id_analisa_indikator'=>$id_analisa,
                'hasil_analisa_indikator'=>$hasil
                );
            $this->db->where('id_analisa_indikator',$data['id_analisa_indikator']);
            $this->db->update('analisa_indikator',$data);
        }
        $ik16=$this->analisa_indikator_model->ik16();
        foreach ($ik16->result_array() as $ik16_item) {
            # code...
            $nilai=$ik16_item['nilai_analisa_indikator'];
            $id_analisa=$ik16_item['id_analisa_indikator'];
            foreach ($sum_ik16->result_array() as $sum_ik16_item) {
                # code...
            $jumlah=$sum_ik16_item['sum_ik_16'];
            }
            $hasil=$nilai/$jumlah;
            $data=array(
                'id_analisa_indikator'=>$id_analisa,
                'hasil_analisa_indikator'=>$hasil
                );
            $this->db->where('id_analisa_indikator',$data['id_analisa_indikator']);
            $this->db->update('analisa_indikator',$data);
        }

        $avg_ik15=$this->analisa_indikator_model->avg_ik15();
        foreach ($avg_ik15->result_array() as $avg_ik15_item) {
            # code...
            $ev_ik15=$avg_ik15_item['rata'];
            $data=array(
                'nilai_eigenvector'=>$ev_ik15
                );
            $this->db->where('id_indikator','IK15');
            $this->db->update('data_indikator',$data);
        }
        $avg_ik16=$this->analisa_indikator_model->avg_ik16();
        foreach ($avg_ik16->result_array() as $avg_ik16_item) {
            # code...
            $ev_ik16=$avg_ik16_item['rata'];
            $data=array(
                'nilai_eigenvector'=>$ev_ik16
                );
            $this->db->where('id_indikator','IK16');
            $this->db->update('data_indikator',$data);
        }
        redirect(base_url('indikator/hasil_analisa_indikator_pensiun'), 'refresh');
        
    }

    function hasil_analisa_indikator_pensiun(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        $data['ik15']=$this->analisa_indikator_model->ik15();
        $data['ik16']=$this->analisa_indikator_model->ik16();
        $data['jumlah']=$this->analisa_indikator_model->jumlah_hasil_indikator_k5();
        $data['hasil_ik15']=$this->analisa_indikator_model->hasil_ik15();
        $data['hasil_ik16']=$this->analisa_indikator_model->hasil_ik16();
        $data['avg_ik15']=$this->analisa_indikator_model->avg_ik15();
        $data['avg_ik16']=$this->analisa_indikator_model->avg_ik16();
        $data['content']='hasil_analisa_indikator_pensiun';
        $this->load->view('template',$data);
    }

    function update_indikator(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        $data['unitkerja']=$this->unitkerja_model->unitkerja();
        $data['content']='update_indikator';
        $this->load->view('template',$data);
    }

    function proses_update_indikator(){
        $nip=$this->input->post('nip');
        $kd_indikator=$this->input->post('kd_indikator');
        $indikator=$this->input->post('indikator');
        $target_output=$this->input->post('target_output');
        $realisasi_output=$this->input->post('realisasi_output');
        $target_kualitas=$this->input->post('target_kualitas');
        $realisasi_kualitas=$this->input->post('realisasi_kualitas');
        $target_waktu=$this->input->post('target_waktu');
        $realisasi_waktu=$this->input->post('realisasi_waktu');
        $target_biaya=$this->input->post('target_biaya');
        $realisasi_biaya=$this->input->post('realisasi_biaya');
        $target_pencapaian=$this->input->post('target_pencapaian');

        $indikator=$this->indikator_model->select_indikator_by_nip($nip);
        $count_indikator=$indikator->num_rows();

        $count_indikator;

        for ($i=0; $i < $count_indikator ; $i++) { 
            # code...
            $data=array(
                    'kd_indikator'=>$kd_indikator[$i],
                    'target_output'=>$target_output[$i],
                    'realisasi_output'=>$realisasi_output[$i],
                    'target_kualitas'=>$target_kualitas[$i],
                    'realisasi_kualitas'=>$realisasi_kualitas[$i],
                    'target_waktu'=>$target_waktu[$i],
                    'realisasi_waktu'=>$realisasi_waktu[$i],
                    'target_biaya'=>$target_biaya[$i],
                    'realisasi_biaya'=>$realisasi_biaya[$i],
                    'target_pencapaian'=>$target_pencapaian[$i],
                    'skor_pencapaian'=>(@($realisasi_output[$i]/$target_output[$i]*100) + @($realisasi_kualitas[$i]/$target_kualitas[$i]*100) + @((1.76*$target_waktu[$i]-$realisasi_waktu[$i])/$target_waktu[$i]*100))/3 
                    );
          $this->db->where('kd_indikator',$data['kd_indikator']);
          $this->db->update('indikator',$data);                     
        }
        ?>
        <script>alert("Data Berhasil Diubah");</script>
        <?php
        redirect(base_url('indikator/update_indikator'), 'refresh'); 
    }

    function cari_update(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        $id_unitkerja = $this->input->post('unitkerja');
        $nip = $this->input->post('pegawai');
        $data['id_unitkerja'] = $this->input->post('unitkerja');
        $data['id_pegawai'] = $this->input->post('pegawai');
        $data['unitkerja']=$this->unitkerja_model->unitkerja();
        $data['pegawai']=$this->pegawai_model->select_pegawai_by_nip_unitkerja($nip,$id_unitkerja);
        $data['indikator']=$this->indikator_model->select_data_indikator_by_nip($nip);
        $data['content']='update_indikator';
        $this->load->view('template',$data);
    }

    function delete(){
        $kd_indikator=$this->uri->segment(3);
        $this->indikator_model->delete($kd_indikator);
        redirect(base_url('indikator'), 'refresh'); 
    }

    function delete_indikator(){
        $kd_indikator=$this->uri->segment(3);
        $this->indikator_model->delete_indikator($kd_indikator);
        redirect(base_url('indikator/daftar_indikator'), 'refresh'); 
    }

    function nilai_indikator(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        $data['content']='nilai_indikator';
        $data['indikator']=$this->indikator_model->select_data_indikator_by_nip($this->session->userdata('nip'));
        $this->load->view('template',$data);
    }
    function pencapaian_indikator(){
        $indikator=$this->indikator_model->select_indikator_by_id_kategori($this->session->userdata('nip'));
        foreach ($indikator->result_array() as $value) {
            # code...
            $kd_indikator=$value['kd_indikator'];
            $skor_pencapaian=$value['skor_pencapaian'];
            $ev_indikator=$value['nilai_eigenvector'];
            $ev_kategori=$value['bobot_kategori'];
            $target_pencapaian=$value['target_pencapaian'];
            $data=array(
                'kd_indikator'=>$kd_indikator,
                'skor_akhir_pencapaian'=>$skor_pencapaian*$ev_kategori*$ev_indikator,
                'target_akhir_pencapaian'=>$target_pencapaian*$ev_indikator*$ev_kategori
                );
            $this->db->where('kd_indikator',$kd_indikator);
            $this->db->update('indikator',$data);
        }
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $nip = $this->session->userdata('nip');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        $data['indikator']=$this->indikator_model->select_indikator_by_nip($nip);
        $data['content']='pencapaian_indikator';
        $this->load->view('template',$data);
    }

    function rekapitulasi_indikator(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        $data['unitkerja']=$this->unitkerja_model->unitkerja();   
        $data['content']='rekapitulasi_indikator';
        $this->load->view('template',$data);
    }

    function cari_unitkerja(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        $kd_unitkerja=$this->input->post('unitkerja');
        $data['id_unitkerja']=$this->input->post('unitkerja');
        $data['unitkerja']=$this->unitkerja_model->unitkerja();
        $data['indikator']=$this->indikator_model->select_indikator_by_kd_unitkerja($kd_unitkerja);
        $data['pegawai']=$this->pegawai_model->select_pegawai_by_unitkerja($kd_unitkerja);
        $data['content']='rekapitulasi_indikator';
        $this->load->view('template',$data);
    }

    function cari_data_pegawai(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        $nip=$this->input->post('nip');
        $data['nip']=$this->input->post('nip');
        $kd_unitkerja=$this->input->post('unitkerja');
        $data['unitkerja']=$this->unitkerja_model->unitkerja();
        $data['indikator']=$this->indikator_model->select_indikator_by_nip($nip);
        $data['pegawai']=$this->pegawai_model->select_pegawai_by_unitkerja($kd_unitkerja);
        $data['content']='rekapitulasi_indikator';
        $this->load->view('template',$data);
    }

    function dashboard_indikator(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        $kd_unitkerja=$this->input->post('unitkerja');
        $data['id_unitkerja']=$this->input->post('unitkerja');
        $data['unitkerja']=$this->unitkerja_model->unitkerja();
        $data['indikator']=$this->indikator_model->select_indikator_by_kd_unitkerja($kd_unitkerja);
        $data['content']='dashboard_indikator';
        $this->load->view('template',$data);
    }

    function cari_unit_kerja(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        $kd_unitkerja=$this->input->post('unitkerja');
        $data['id_unitkerja']=$this->input->post('unitkerja');
        $data['unitkerja']=$this->unitkerja_model->unitkerja();
        $data['indikator']=$this->indikator_model->select_indikator_by_kd_unitkerja($kd_unitkerja);
        $data['pegawai']=$this->pegawai_model->select_pegawai_by_unitkerja($kd_unitkerja);
        $data['content']='dashboard_indikator';
        $this->load->view('template',$data);
    }

    function cari_pegawai(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        $nip=$this->input->post('nip');
        $data['nip']=$this->input->post('nip');
        $kd_unitkerja=$this->input->post('unitkerja');
        $data['unitkerja']=$this->unitkerja_model->unitkerja();
        $data['indikator']=$this->indikator_model->select_indikator_by_nip($nip);
        $data['pegawai']=$this->pegawai_model->select_pegawai_by_unitkerja($kd_unitkerja);
        $data['content']='dashboard_indikator';
        $this->load->view('template',$data);
    }






    function tes_ajax(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        $data['content']='tes_ajax';
        $data['kategori']=$this->kategori_model->kategori();
        $this->load->view('template',$data);
    }



    function tabntates(){
        $data['indikator']=$this->input->post('indikator');
        $data['target_output']=$this->input->post('target_output');
        $data['ket_output']=$this->input->post('ket_output');
        $data['target_kualitas']=$this->input->post('target_kualitas');
        $data['target_waktu']=$this->input->post('target_waktu');
        $data['target_biaya']=$this->input->post('target_biaya');
        $data['kd_kategori']=$this->input->post('kategori');

        print_r($data);
    }
}