<?php

class Kategori extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model(array('kategori_model','analisa_kategori_model'));
        $this->load->library(array('session','form_validation','encryption'));
		$this->load->helper(array('url','form','download'));
    }

    function index(){
    	$data['username'] = $this->session->userdata('username');
		$data['level'] = $this->session->userdata('level');
		$login=$this->session->userdata('login');
		if($login==false)redirect(base_url('auth'));
		
        $data['content']='kategori';
        $data['kategori']=$this->kategori_model->kategori();
		$this->load->view('template',$data);
    }

    function tambah_kategori(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        $data['content']='tambah_kategori';
        $this->load->view('template',$data);
    }

    function proses_tambah_kategori(){
        $data['id_kategori']=$this->input->post('kd_kategori');
        $data['nama_kategori']=$this->input->post('kategori');
        $this->form_validation->set_rules('kd_kategori','kd_kategori','required');
        $this->form_validation->set_rules('kategori','kategori','required');
        if($this->form_validation->run() == FALSE){
             ?>
                <script>alert("Maaf, Form Tidak Boleh Kosong");</script>
            <?php
                redirect(base_url('kategori/tambah_kategori'), 'refresh');
        }else{
            $this->kategori_model->insert($data);
            ?>
                <script>alert("Data Berhasil Ditambah");</script>
            <?php
                redirect(base_url('kategori'), 'refresh'); 
        }
    }

     function edit_kategori(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        $id_kategori=$this->uri->segment(3);
        $data['content']='edit_kategori';
        $data['kategori']=$this->kategori_model->select_kategori_by_id($id_kategori);
        $this->load->view('template',$data);
    }

    function proses_edit_kategori(){
        $id_kategori=$this->input->post('id_kategori');
        $data['nama_kategori']=$this->input->post('nama_kategori');
        $this->form_validation->set_rules('nama_kategori','nama_kategori','required');
        if($this->form_validation->run() == FALSE){
            ?>
                <script>alert("Maaf, Form Tidak Boleh Kosong");</script>
            <?php
                redirect(base_url('kategori'), 'refresh');
        }
        else{
             $this->kategori_model->update($id_kategori,$data);
            ?>
                <script>alert("Data Berhasil Diubah");</script>
            <?php
                redirect(base_url('kategori'), 'refresh'); 
        }
    }

    function delete(){
        $id_kategori=$this->uri->segment(3);
        $this->kategori_model->delete($id_kategori);
        ?>
        <script type="text/javascript" language="javascript">
            alert("Data berhasil dihapus");
        </script>
        <?php
        redirect(base_url('kategori'),'refresh');
    }

    function analisa_kategori(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        
        $data['content']='analisa_kategori';
        $data['analisa_kategori']=$this->kategori_model->analisa_kategori();
        $data['id_kategori']=$this->analisa_kategori_model->select_analisa_id();
        $data['nilai']=$this->kategori_model->nilai_kategori();
        $this->load->view('template',$data);
    }

    function proses_analisa_kategori(){
        $id_analisa=$this->input->post('id_analisa');
        $nilai=$this->input->post('nilai');
        
        $count_data=count($id_analisa);
        
        for ($i=0; $i < $count_data; $i++) { 
        # code...
            $data=array(
                    'id_analisa'=>$id_analisa[$i],
                    'nilai_analisa_kategori'=>$nilai[$i],
                );
            $this->db->where('id_analisa',$data['id_analisa']);
            $this->db->update('analisa_kategori',$data);
        }
        
        $k1=$this->analisa_kategori_model->select_k1();
        $sum_k1=$this->analisa_kategori_model->sum_k1();
        foreach ($sum_k1->result_array() as $jml) {
            # code...
           $jumlah=$jml['jumlah'];
           $data=array(
                'jumlah_kategori'=>$jumlah
            );
           $this->db->where('id_kategori','K1');
           $this->db->update('kategori',$data);

        }
        $k2=$this->analisa_kategori_model->select_k2();
        $sum_k2=$this->analisa_kategori_model->sum_k2();
        foreach ($sum_k2->result_array() as $jml) {
            # code...
           $jumlah=$jml['jumlah'];
           $data=array(
                'jumlah_kategori'=>$jumlah
            );
           $this->db->where('id_kategori','K2');
           $this->db->update('kategori',$data);

        }
        $k3=$this->analisa_kategori_model->select_k3();
        $sum_k3=$this->analisa_kategori_model->sum_k3();
        foreach ($sum_k3->result_array() as $jml) {
            # code...
           $jumlah=$jml['jumlah'];
           $data=array(
                'jumlah_kategori'=>$jumlah
            );
           $this->db->where('id_kategori','K3');
           $this->db->update('kategori',$data);

        }
        $k4=$this->analisa_kategori_model->select_k4();
        $sum_k4=$this->analisa_kategori_model->sum_k4();
        foreach ($sum_k4->result_array() as $jml) {
            # code...
           $jumlah=$jml['jumlah'];
           $data=array(
                'jumlah_kategori'=>$jumlah
            );
           $this->db->where('id_kategori','K4');
           $this->db->update('kategori',$data);

        }
        $k5=$this->analisa_kategori_model->select_k5();
        $sum_k5=$this->analisa_kategori_model->sum_k5();
        foreach ($sum_k5->result_array() as $jml) {
            # code...
           $jumlah=$jml['jumlah'];
           $data=array(
                'jumlah_kategori'=>$jumlah
            );
           $this->db->where('id_kategori','K5');
           $this->db->update('kategori',$data);

        }
        
        foreach ($k1->result_array() as $k) {
            # code...
            $nilai=$k['nilai_analisa_kategori'];
            $id_analisa=$k['id_analisa'];
            foreach ($sum_k1->result_array() as $sum) {
                # code...
            $jumlah=$sum['jumlah'];
            }
            $hasil=$nilai/$jumlah;
            $data=array(
                'id_analisa'=>$id_analisa,
                'hasil_analisa_kategori'=>$hasil
                );
            $this->db->where('id_analisa',$data['id_analisa']);
            $this->db->update('analisa_kategori',$data);
        }

        foreach ($k2->result_array() as $k) {
            # code...
            $nilai=$k['nilai_analisa_kategori'];
            $id_analisa=$k['id_analisa'];
            foreach ($sum_k2->result_array() as $sum) {
                # code...
            $jumlah=$sum['jumlah'];
            }
            $hasil=$nilai/$jumlah;
            $data=array(
                'id_analisa'=>$id_analisa,
                'hasil_analisa_kategori'=>$hasil
                );
            $this->db->where('id_analisa',$data['id_analisa']);
            $this->db->update('analisa_kategori',$data);
        }

        foreach ($k3->result_array() as $k) {
            # code...
            $nilai=$k['nilai_analisa_kategori'];
            $id_analisa=$k['id_analisa'];
            foreach ($sum_k3->result_array() as $sum) {
                # code...
            $jumlah=$sum['jumlah'];
            }
            $hasil=$nilai/$jumlah;
            $data=array(
                'id_analisa'=>$id_analisa,
                'hasil_analisa_kategori'=>$hasil
                );
            $this->db->where('id_analisa',$data['id_analisa']);
            $this->db->update('analisa_kategori',$data);
        }

        foreach ($k4->result_array() as $k) {
            # code...
            $nilai=$k['nilai_analisa_kategori'];
            $id_analisa=$k['id_analisa'];
            foreach ($sum_k4->result_array() as $sum) {
                # code...
            $jumlah=$sum['jumlah'];
            }
            $hasil=$nilai/$jumlah;
            $data=array(
                'id_analisa'=>$id_analisa,
                'hasil_analisa_kategori'=>$hasil
                );
            $this->db->where('id_analisa',$data['id_analisa']);
            $this->db->update('analisa_kategori',$data);
        }

        foreach ($k5->result_array() as $k) {
            # code...
            $nilai=$k['nilai_analisa_kategori'];
            $id_analisa=$k['id_analisa'];
            foreach ($sum_k5->result_array() as $sum) {
                # code...
            $jumlah=$sum['jumlah'];
            }
            $hasil=$nilai/$jumlah;
            $data=array(
                'id_analisa'=>$id_analisa,
                'hasil_analisa_kategori'=>$hasil
                );
            $this->db->where('id_analisa',$data['id_analisa']);
            $this->db->update('analisa_kategori',$data);
        }
    
        //edit bobot
        $avg_k1=$this->analisa_kategori_model->avg_k1();
        foreach ($avg_k1->result_array() as $avg_k1_item) {
            # code...
            $bobot_k1=$avg_k1_item['rata'];
            $data=array(
                'bobot_kategori'=>$bobot_k1
                );
            $this->db->where('id_kategori','K1');
            $this->db->update('kategori',$data);
        }
        $avg_k2=$this->analisa_kategori_model->avg_k2();
        foreach ($avg_k2->result_array() as $avg_k2_item) {
            # code...
            $bobot_k2=$avg_k2_item['rata'];
            $data=array(
                'bobot_kategori'=>$bobot_k2
                );
            $this->db->where('id_kategori','K2');
            $this->db->update('kategori',$data);
        }
        $avg_k3=$this->analisa_kategori_model->avg_k3();
        foreach ($avg_k3->result_array() as $avg_k3_item) {
            # code...
            $bobot_k3=$avg_k3_item['rata'];
            $data=array(
                'bobot_kategori'=>$bobot_k3
                );
            $this->db->where('id_kategori','K3');
            $this->db->update('kategori',$data);
        }
        $avg_k4=$this->analisa_kategori_model->avg_k4();
        foreach ($avg_k4->result_array() as $avg_k4_item) {
            # code...
            $bobot_k4=$avg_k4_item['rata'];
            $data=array(
                'bobot_kategori'=>$bobot_k4
                );
            $this->db->where('id_kategori','K4');
            $this->db->update('kategori',$data);
        }
        $avg_k5=$this->analisa_kategori_model->avg_k5();
        foreach ($avg_k5->result_array() as $avg_k5_item) {
            # code...
            $bobot_k5=$avg_k5_item['rata'];
            $data=array(
                'bobot_kategori'=>$bobot_k5
                );
            $this->db->where('id_kategori','K5');
            $this->db->update('kategori',$data);
        }
        redirect(base_url('kategori/hasil_analisa'), 'refresh');
        
    }

    function hasil_analisa(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        $data['k1']=$this->analisa_kategori_model->k1();
        $data['sum_k1']=$this->analisa_kategori_model->sum_k1();
        $data['avg_k1']=$this->analisa_kategori_model->avg_k1();
        $data['hasil_k1']=$this->analisa_kategori_model->hasil_k1();
        $data['sum_hasil_k1']=$this->analisa_kategori_model->sum_hasil_k1();
        $data['k2']=$this->analisa_kategori_model->k2();
        $data['sum_k2']=$this->analisa_kategori_model->sum_k2();
        $data['avg_k2']=$this->analisa_kategori_model->avg_k2();
        $data['hasil_k2']=$this->analisa_kategori_model->hasil_k2();
        $data['sum_hasil_k2']=$this->analisa_kategori_model->sum_hasil_k2();
        $data['k3']=$this->analisa_kategori_model->k3();
        $data['sum_k3']=$this->analisa_kategori_model->sum_k3();
        $data['avg_k3']=$this->analisa_kategori_model->avg_k3();
        $data['hasil_k3']=$this->analisa_kategori_model->hasil_k3();
        $data['sum_hasil_k3']=$this->analisa_kategori_model->sum_hasil_k3();
        $data['k4']=$this->analisa_kategori_model->k4();
        $data['sum_k4']=$this->analisa_kategori_model->sum_k4();
        $data['avg_k4']=$this->analisa_kategori_model->avg_k4();
        $data['hasil_k4']=$this->analisa_kategori_model->hasil_k4();
        $data['sum_hasil_k4']=$this->analisa_kategori_model->sum_hasil_k4();
        $data['k5']=$this->analisa_kategori_model->k5();
        $data['sum_k5']=$this->analisa_kategori_model->sum_k5();
        $data['avg_k5']=$this->analisa_kategori_model->avg_k5();
        $data['hasil_k5']=$this->analisa_kategori_model->hasil_k5();
        $data['sum_hasil_k5']=$this->analisa_kategori_model->sum_hasil_k5();
        $data['sum_bobot']=$this->kategori_model->sum_bobot();
        $data['content']='hasil_analisa';
        $this->load->view('template',$data);
    }

    function tes(){
        $k1=$this->analisa_kategori_model->select_k1();
        $sum_k1=$this->analisa_kategori_model->sum_k1();
        $k2=$this->analisa_kategori_model->select_k2();
        $sum_k2=$this->analisa_kategori_model->sum_k2();
        $k3=$this->analisa_kategori_model->select_k3();
        $sum_k3=$this->analisa_kategori_model->sum_k3();
        $k4=$this->analisa_kategori_model->select_k4();
        $sum_k4=$this->analisa_kategori_model->sum_k4();
        $k5=$this->analisa_kategori_model->select_k5();
        $sum_k5=$this->analisa_kategori_model->sum_k5();
        foreach ($k1->result_array() as $k) {
            # code...
            $nilai=$k['nilai_analisa_kategori'];
            $id_kategori=$k['id_kategori'];
            foreach ($sum_k1->result_array() as $sum) {
                # code...
            $jumlah=$sum['jumlah'];
            }
            $hasil=$nilai/$jumlah;
            $data=array(
                'id_kategori'=>$id_kategori,
                'hasil_analisa_kategori'=>$hasil
                );
            $this->db->where('id_kategori',$data['id_kategori']);
            $this->db->update('analisa_kategori',$data);
        }

        foreach ($k2->result_array() as $k) {
            # code...
            $nilai=$k['nilai_analisa_kategori'];
            $id_kategori=$k['id_kategori'];
            foreach ($sum_k2->result_array() as $sum) {
                # code...
            $jumlah=$sum['jumlah'];
            }
            $hasil=$nilai/$jumlah;
            $data=array(
                'id_kategori'=>$id_kategori,
                'hasil_analisa_kategori'=>$hasil
                );
            $this->db->where('id_kategori',$data['id_kategori']);
            $this->db->update('analisa_kategori',$data);
        }

        foreach ($k3->result_array() as $k) {
            # code...
            $nilai=$k['nilai_analisa_kategori'];
            $id_kategori=$k['id_kategori'];
            foreach ($sum_k3->result_array() as $sum) {
                # code...
            $jumlah=$sum['jumlah'];
            }
            $hasil=$nilai/$jumlah;
            $data=array(
                'id_kategori'=>$id_kategori,
                'hasil_analisa_kategori'=>$hasil
                );
            $this->db->where('id_kategori',$data['id_kategori']);
            $this->db->update('analisa_kategori',$data);
        }

        foreach ($k4->result_array() as $k) {
            # code...
            $nilai=$k['nilai_analisa_kategori'];
            $id_kategori=$k['id_kategori'];
            foreach ($sum_k4->result_array() as $sum) {
                # code...
            $jumlah=$sum['jumlah'];
            }
            $hasil=$nilai/$jumlah;
            $data=array(
                'id_kategori'=>$id_kategori,
                'hasil_analisa_kategori'=>$hasil
                );
            $this->db->where('id_kategori',$data['id_kategori']);
            $this->db->update('analisa_kategori',$data);
        }

        foreach ($k5->result_array() as $k) {
            # code...
            $nilai=$k['nilai_analisa_kategori'];
            $id_kategori=$k['id_kategori'];
            foreach ($sum_k5->result_array() as $sum) {
                # code...
            $jumlah=$sum['jumlah'];
            }
            $hasil=$nilai/$jumlah;
            $data=array(
                'id_kategori'=>$id_kategori,
                'hasil_analisa_kategori'=>$hasil
                );
            $this->db->where('id_kategori',$data['id_kategori']);
            $this->db->update('analisa_kategori',$data);
        }
    }

}