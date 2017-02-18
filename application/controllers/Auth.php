<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('login_model');
		$this->load->library(array('session','form_validation','encryption'));
		$this->load->helper(array('url','form','download'));
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('login');
	}

	function login(){
		$username=  $this->input->post('username');
        $password=  md5($this->input->post('password'));
        $this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','password','required');

        $login=$this->login_model->login($username,$password);
        
        if($this->form_validation->run() == FALSE){
        	?>
				<script>alert("Maaf,Username atau password Tidak Boleh Kosong");</script>
			<?php
				redirect(base_url('auth'), 'refresh');
        }
        else{
        	if ($login->num_rows()==1) {
        	# code...
        	foreach($login->result_array() as $data)
			{
					$session_username=$data['username'];
					$session_level=$data['level'];
					$session_nip=$data['nip'];
			}
			$sess_user=array(
							'username'=>$session_username,
							'level'=>$session_level,
							'nip'=>$session_nip
						   );
			$this->session->set_userdata($sess_user);
			$this->session->set_userdata('login',true);
			redirect(base_url('dashboard'),'refresh');
	        }
	        else{
	        	?>
				<script>alert("NIM atau Password salah");</script>
				<?php
				redirect(base_url('auth'),'refresh');
	        }
        }      
	}

	function logout(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		redirect(base_url('auth'), 'refresh');
	}
}
