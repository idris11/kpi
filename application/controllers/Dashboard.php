<?php

class Dashboard extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->library(array('session','form_validation','encryption'));
		$this->load->helper(array('url','form','download'));
    }

    function index(){
    	$data['username'] = $this->session->userdata('username');
		$data['level'] = $this->session->userdata('level');
		$login=$this->session->userdata('login');
		if($login==false)redirect(base_url('auth'));
		$data['content']='dashboard';
		$this->load->view('template',$data);
    }
}