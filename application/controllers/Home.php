<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

   public function __construct() {  
        parent::__construct();
        $this->load->model('LoginModel');
  }
    public function dashoard(){
        $data=$this->LoginModel->login();
        if(!empty($data)){
            foreach ($data as $dt){
				$session_array = array(
				'firstName' =>$dt['first_name'],
				'lastName' =>$dt['last_name'],
				'userId' =>$dt['id'],
				'role' =>$dt['description']);
			}
				$this->session->set_userdata('logged_in', $session_array);
				redirect(base_url().'Common/home');
        }else
            redirect(base_url(), 'refresh');
    }
    
    public function ResetPassword(){

            if (isset($_POST["sendObj"])) {
                $Obj =json_decode($_POST["sendObj"], true);
                $dataFlg = $this->StockModel->resetPassword($Obj);
                echo $dataFlg;
            }

    }

}