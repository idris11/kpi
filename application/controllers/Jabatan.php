<?php

class Jabatan extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('jabatan_model');
        $this->load->library(array('session','form_validation','encryption'));
		$this->load->helper(array('url','form','download'));
    }

    function index(){
    	$data['username'] = $this->session->userdata('username');
		$data['level'] = $this->session->userdata('level');
		$login=$this->session->userdata('login');
		if($login==false)redirect(base_url('auth'));
        $data['jabatan']=$this->jabatan_model->jabatan();
		$data['content']='daftar_jabatan';
		$this->load->view('template',$data);
    }

    function tambah_jabatan(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        $data['content']='tambah_jabatan';
        $this->load->view('template',$data);
    }

    function proses_tambah_jabatan(){
        $data['kd_jabatan']           = trim(strip_tags($this->input->post('kd_jabatan')));
        $data['jabatan']           = trim(strip_tags($this->input->post('jabatan')));
        $data['ket']           = trim(strip_tags($this->input->post('ket')));
        $this->form_validation->set_rules('kd_jabatan','kd_jabatan','required');
        $this->form_validation->set_rules('jabatan','jabatan','required');
        $this->form_validation->set_rules('ket','ket','required');
        if($this->form_validation->run() == FALSE){
            ?>
                <script>alert("Maaf, Form Tidak Boleh Kosong");</script>
            <?php
                redirect(base_url('jabatan/tambah_jabatan'), 'refresh');
        }
        else{
            $this->jabatan_model->insert($data);
            ?>
                <script>alert("Data Berhasil Ditambah");</script>
            <?php
                redirect(base_url('jabatan'), 'refresh'); 
        }
    }

    function delete(){
        $kd_jabatan=$this->uri->segment(3);
        $this->jabatan_model->delete($kd_jabatan);
        ?>
        <script type="text/javascript" language="javascript">
            alert("Data berhasil dihapus");
        </script>
        <?php
        redirect(base_url('jabatan'),'refresh');
    }

    function edit_jabatan(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        $kd_jabatan=$this->uri->segment(3);
        $data['jabatan']=$this->jabatan_model->select_jabatan_by_kd($kd_jabatan);
        $data['content']='edit_jabatan';
        $this->load->view('template',$data);
    }

    function proses_edit_jabatan(){
        $kd_jabatan              = $this->input->post('kd_jabatan');
        $data['kd_jabatan']           = trim(strip_tags($this->input->post('kd_jabatan2')));
        $data['jabatan']           = trim(strip_tags($this->input->post('jabatan')));
        $data['ket']           = trim(strip_tags($this->input->post('ket')));
        $this->form_validation->set_rules('kd_jabatan','kd_jabatan','required');
        $this->form_validation->set_rules('jabatan','jabatan','required');
        $this->form_validation->set_rules('ket','ket','required');
        if($this->form_validation->run() == FALSE){
            ?>
                <script>alert("Maaf, Form Tidak Boleh Kosong");</script>
            <?php
                redirect(base_url('jabatan'), 'refresh');
        }
        else{
            $this->jabatan_model->update_jabatan($kd_jabatan,$data);
            ?>
                <script>alert("Data Berhasil Diubah");</script>
            <?php
                redirect(base_url('jabatan'), 'refresh'); 
        } 
    }
}