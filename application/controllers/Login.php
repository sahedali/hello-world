<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

   public function __construct() {
        parent::__construct();
		
		 if(!isset($login)){
            //redirect('Login/logout');
            return false;
        }
    }
    public function index(){
		date_default_timezone_set('Asia/Calcutta');
		$this->load->helper('url');
		$this->load->view('login/login');
	}
	public function logout(){
      $this->session->unset_userdata('logged_in');
      redirect(base_url(), 'refresh');
    }

}