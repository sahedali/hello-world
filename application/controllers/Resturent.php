<?php

if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Resturent extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('CommonModel');
        $this->load->model('ResturentModel');
        $login = $this->session->userdata('logged_in');
        if(!isset($login)){
            redirect('Login/logout');
            return false;
        }
    }
    public function getResturentTableDetails(){
        echo json_encode($this->ResturentModel->getTaleDetails());
    }

    public function saveTable(){
        echo json_encode($this->ResturentModel->saveTable(json_decode(file_get_contents('php://input'))));
    } 
    public function updateTable(){
        echo json_encode($this->ResturentModel->updateTable(json_decode(file_get_contents('php://input'))));
    } 
    
}
