<?php

class Pegawai extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model(array('pegawai_model','pangkat_model','jabatan_model','unitkerja_model'));
        $this->load->library(array('session','form_validation','encryption'));
		$this->load->helper(array('url','form','download'));
    }

    function index(){
    	$data['username'] = $this->session->userdata('username');
		$data['level'] = $this->session->userdata('level');
		$login=$this->session->userdata('login');
		if($login==false)redirect(base_url('auth'));
        $data['pegawai']=$this->pegawai_model->daftar_pegawai();
		$data['content']='daftar_pegawai';
		$this->load->view('template',$data);
    }

    function tambah_pegawai(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        $data['pangkat']=$this->pangkat_model->pangkat();
        $data['jabatan']=$this->jabatan_model->jabatan();
        $data['unitkerja']=$this->unitkerja_model->unitkerja();
        $data['content']='tambah_pegawai';
        $this->load->view('template',$data);
    }

    function proses_tambah_pegawai(){
        $data['nip']           = trim(strip_tags($this->input->post('nip')));
        $data['nama']           = trim(strip_tags($this->input->post('nama')));
        $data['kd_pangkat']           = trim(strip_tags($this->input->post('pangkat')));
        $data['kd_jabatan']           = trim(strip_tags($this->input->post('jabatan')));
        $data['kd_unitkerja']           = trim(strip_tags($this->input->post('unitkerja')));
        $data['jk']           = trim(strip_tags($this->input->post('jk')));
        $data['tmpt_lahir']           = trim(strip_tags($this->input->post('tmpt_lahir')));
        $data['tgl_lahir']           = trim(strip_tags($this->input->post('tgl_lahir')));
        $data['agama']           = trim(strip_tags($this->input->post('agama')));
        $data['level']           = trim(strip_tags($this->input->post('level')));
        $data['username']           = trim(strip_tags($this->input->post('username')));
        $data['password']           = trim(strip_tags($this->input->post('password')));
        $this->form_validation->set_rules('nip','nip','required');
        $this->form_validation->set_rules('nama','nama','required');
        $this->form_validation->set_rules('pangkat','pangkat','required');
        $this->form_validation->set_rules('jabatan','jabatan','required');
        $this->form_validation->set_rules('unitkerja','unitkerja','required');
        $this->form_validation->set_rules('jk','jk','required');
        $this->form_validation->set_rules('tmpt_lahir','tmpt_lahir','required');
        $this->form_validation->set_rules('tgl_lahir','tgl_lahir','required');
        $this->form_validation->set_rules('agama','agama','required');
        $this->form_validation->set_rules('level','level','required');
        $this->form_validation->set_rules('username','username','required');
        $this->form_validation->set_rules('password','password','required');
        if($this->form_validation->run() == FALSE){
            ?>
                <script>alert("Maaf, Form Tidak Boleh Kosong");</script>
            <?php
                redirect(base_url('pegawai/tambah_pegawai'), 'refresh');
        }
        else{
            $this->pegawai_model->insert($data);
            ?>
                <script>alert("Data Berhasil Ditambah");</script>
            <?php
                redirect(base_url('pegawai'), 'refresh'); 
        }
    }

    function delete(){
        $nip=$this->uri->segment(3);
        $this->pegawai_model->delete($nip);
        ?>
        <script type="text/javascript" language="javascript">
            alert("Data berhasil dihapus");
        </script>
        <?php
        redirect(base_url('pegawai'),'refresh');
    }

    function edit_pegawai(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $login=$this->session->userdata('login');
        if($login==false)redirect(base_url('auth'));
        $nip=$this->uri->segment(3);
        $data['pegawai']=$this->pegawai_model->select_pegawai_by_nip($nip);
        $data['pangkat']=$this->pangkat_model->pangkat();
        $data['jabatan']=$this->jabatan_model->jabatan();
        $data['unitkerja']=$this->unitkerja_model->unitkerja();
        $data['content']='edit_pegawai';
        $this->load->view('template',$data);
    }

    function proses_edit_pegawai(){
        $nip          = trim(strip_tags($this->input->post('nip')));
        $data['nama']           = trim(strip_tags($this->input->post('nama')));
        $data['kd_pangkat']           = trim(strip_tags($this->input->post('pangkat')));
        $data['kd_jabatan']           = trim(strip_tags($this->input->post('jabatan')));
        $data['kd_unitkerja']           = trim(strip_tags($this->input->post('unitkerja')));
        $data['jk']           = trim(strip_tags($this->input->post('jk')));
        $data['tmpt_lahir']           = trim(strip_tags($this->input->post('tmpt_lahir')));
        $data['tgl_lahir']           = trim(strip_tags($this->input->post('tgl_lahir')));
        $data['agama']           = trim(strip_tags($this->input->post('agama')));
        $data['level']           = trim(strip_tags($this->input->post('level')));
        $data['username']           = trim(strip_tags($this->input->post('username')));
        $data['password']           = trim(strip_tags($this->input->post('password')));
        $this->form_validation->set_rules('nip','nip','required');
        $this->form_validation->set_rules('nama','nama','required');
        $this->form_validation->set_rules('pangkat','pangkat','required');
        $this->form_validation->set_rules('jabatan','jabatan','required');
        $this->form_validation->set_rules('unitkerja','unitkerja','required');
        $this->form_validation->set_rules('jk','jk','required');
        $this->form_validation->set_rules('tmpt_lahir','tmpt_lahir','required');
        $this->form_validation->set_rules('tgl_lahir','tgl_lahir','required');
        $this->form_validation->set_rules('agama','agama','required');
        $this->form_validation->set_rules('level','level','required');
        $this->form_validation->set_rules('username','username','required');
        $this->form_validation->set_rules('password','password','required');
        if($this->form_validation->run() == FALSE){
            ?>
                <script>
                alert("Maaf, Form Tidak Boleh Kosong");
                window.location=history.go(-1);
                </script>
            <?php
        }
        else{
            $this->pegawai_model->update_pegawai($nip,$data);
            ?>
                <script>alert("Data Berhasil Diubah");</script>
            <?php
                redirect(base_url('pegawai'), 'refresh'); 
        }
    }
}