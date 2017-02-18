<?php

class Unitkerja extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('unitkerja_model');
        $this->load->library(array('session','form_validation','encryption'));
		$this->load->helper(array('url','form','download'));
    }

    function index(){
    	$data['username'] = $this->session->userdata('username');
		$data['level'] = $this->session->userdata('level');
		$login=$this->session->userdata('login');
		if($login==false)redirect(base_url('auth'));
        $data['unitkerja']=$this->unitkerja_model->unitkerja();
        $data['content']='daftar_unitkerja';
		$this->load->view('template',$data);
    }

    function tambah_unitkerja(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        $data['content']='tambah_unitkerja';
        $this->load->view('template',$data);
    }

    function proses_tambah_unitkerja(){
        $data['kd_unitkerja']           = trim(strip_tags($this->input->post('kd_unitkerja')));
        $data['unitkerja']           = trim(strip_tags($this->input->post('unitkerja')));
        $data['ket']           = trim(strip_tags($this->input->post('ket')));
        $this->form_validation->set_rules('kd_unitkerja','kd_unitkerja','required');
        $this->form_validation->set_rules('unitkerja','unitkerja','required');
        $this->form_validation->set_rules('ket','ket','required');
        if($this->form_validation->run() == FALSE){
            ?>
                <script>alert("Maaf, Form Tidak Boleh Kosong");</script>
            <?php
                redirect(base_url('unitkerja/tambah_unitkerja'), 'refresh');
        }
        else{
            $this->unitkerja_model->insert($data);
            ?>
                <script>alert("Data Berhasil Ditambah");</script>
            <?php
                redirect(base_url('unitkerja'), 'refresh'); 
        }
    }

    function delete(){
        $kd_unitkerja=$this->uri->segment(3);
        $this->unitkerja_model->delete($kd_unitkerja);
        ?>
        <script type="text/javascript" language="javascript">
            alert("Data berhasil dihapus");
        </script>
        <?php
        redirect(base_url('unitkerja'),'refresh');
    }

    function edit_unitkerja(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        $kd_unitkerja=$this->uri->segment(3);
        $data['unitkerja']=$this->unitkerja_model->select_unitkerja_by_kd($kd_unitkerja);
        $data['content']='edit_unitkerja';
        $this->load->view('template',$data);
    }

    function proses_edit_unitkerja(){
        $kd_unitkerja                    = $this->input->post('kd_unitkerja');
        $data['kd_unitkerja']           = trim(strip_tags($this->input->post('kd_unitkerja2')));
        $data['unitkerja']           = trim(strip_tags($this->input->post('unitkerja')));
        $data['ket']           = trim(strip_tags($this->input->post('ket')));
        $this->form_validation->set_rules('kd_unitkerja2','kd_unitkerja2','required');
        $this->form_validation->set_rules('unitkerja','unitkerja','required');
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
            $this->unitkerja_model->update_unitkerja($kd_unitkerja,$data);
            ?>
                <script>alert("Data Berhasil Diubah");</script>
            <?php
                redirect(base_url('unitkerja'), 'refresh'); 
        }
    }
}