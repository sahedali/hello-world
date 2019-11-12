<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginModel extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	
	public function login()
	{
        $userName = $this->input->post('email');
        $password = $this->input->post('password');
        $sql ="select emp.first_name, emp.last_name,usr.id,rm.description from user usr,role_master rm,employee emp where usr.username ='$userName' and usr.password= '$password' and usr.role_id = rm.id and emp.id = usr.person_id";
        $result =$this->db->query($sql);
        return $result->result_array();
	}
	
	public function alluser()
	{
		$aa="SELECT * FROM user";
		$result =$this->db->query($aa);
		return $result->result_array();
	}
}

