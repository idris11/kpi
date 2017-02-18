<?php

class Pangkat extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('pangkat_model');
        $this->load->library(array('session','form_validation','encryption'));
		$this->load->helper(array('url','form','download'));
    }

    function index(){
    	$data['username'] = $this->session->userdata('username');
		$data['level'] = $this->session->userdata('level');
		$login=$this->session->userdata('login');
		if($login==false)redirect(base_url('auth'));
        $data['pangkat']=$this->pangkat_model->pangkat();
		$data['content']='daftar_pangkat';
		$this->load->view('template',$data);
    }

    function tambah_pangkat(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        $data['content']='tambah_pangkat';
        $this->load->view('template',$data);
    }

    function proses_tambah_pangkat(){
        $data['kd_pangkat']           = trim(strip_tags($this->input->post('kd_pangkat')));
        $data['pangkatgolru']           = trim(strip_tags($this->input->post('pangkatgolru')));
        $data['ket']           = trim(strip_tags($this->input->post('ket')));
        $this->form_validation->set_rules('kd_pangkat','kd_pangkat','required');
        $this->form_validation->set_rules('pangkatgolru','pangkatgolru','required');
        $this->form_validation->set_rules('ket','ket','required');
        if($this->form_validation->run() == FALSE){
            ?>
                <script>alert("Maaf, Form Tidak Boleh Kosong");</script>
            <?php
                redirect(base_url('pangkat/tambah_pangkat'), 'refresh');
        }
        else{
            $this->pangkat_model->insert($data);
            ?>
                <script>alert("Data Berhasil Ditambah");</script>
            <?php
                redirect(base_url('pangkat'), 'refresh'); 
        }
    }

    function delete(){
        $kd_pangkat=$this->uri->segment(3);
        $this->pangkat_model->delete($kd_pangkat);
        ?>
        <script type="text/javascript" language="javascript">
            alert("Data berhasil dihapus");
        </script>
        <?php
        redirect(base_url('pangkat'),'refresh');
    }

    function edit_pangkat(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        $kd_pangkat=$this->uri->segment(3);
        $data['pangkat']=$this->pangkat_model->select_pangkat_by_kd($kd_pangkat);
        $data['content']='edit_pangkat';
        $this->load->view('template',$data);
    }

    function proses_edit_pangkat(){
        $kd_pangkat                    = $this->input->post('kd_pangkat');
        $data['kd_pangkat']           = trim(strip_tags($this->input->post('kd_pangkat2')));
        $data['pangkatgolru']           = trim(strip_tags($this->input->post('pangkatgolru')));
        $data['ket']           = trim(strip_tags($this->input->post('ket')));
        $this->form_validation->set_rules('kd_pangkat2','kd_pangkat2','required');
        $this->form_validation->set_rules('pangkatgolru','pangkatgolru','required');
        $this->form_validation->set_rules('ket','ket','required');
        if($this->form_validation->run() == FALSE){
            ?>
                <script>
                alert("Maaf, Form Tidak Boleh Kosong");
                window.location=history.go(-1);
                </script>
            <?php
        }
        else{
            $this->pangkat_model->update_pangkat($kd_pangkat,$data);
            ?>
                <script>alert("Data Berhasil Diubah");</script>
            <?php
                redirect(base_url('pangkat'), 'refresh'); 
        }
    }
}