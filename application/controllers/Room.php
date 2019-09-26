<?php

if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Room extends CI_Controller
{

    public function __construct()
    {
		//echo 'hi--'.date("m.d.y");
		//die;
        parent::__construct();
        $this->load->model('CommonModel');
        //$this->load->model('ReportModel');
         $login = $this->session->userdata('logged_in');
        if(!isset($login)){
            redirect('Login/logout');
            return false;
        }
    }
    public function ssss(){
        echo 'hi login ';
        
    }
	public function saveRoom(){
		echo $this->CommonModel->saveRoom(json_decode(file_get_contents('php://input')));
	}
	
	public function updateRoom(){
		echo $this->CommonModel->updateRoom(json_decode(file_get_contents('php://input')));
	}
	public function deleteRoom(){
		echo $this->CommonModel->deleteRoom(json_decode(file_get_contents('php://input'))->id);
	}
	
	public function updateRoomCat(){
		echo $this->CommonModel->updateRoomCat(json_decode(file_get_contents('php://input')));
	}
	
	public function deleteRoomCat(){
		echo $this->CommonModel->deleteRoomCat(json_decode(file_get_contents('php://input'))->id);
	}
	public function saveRoomCat(){
		echo $this->CommonModel->saveRoomCat(json_decode(file_get_contents('php://input')));
	}
	
    public function getCategoryDetails(){
        echo json_encode($this->CommonModel->getRoomCategory());
    }
    
    public function getRoomDetails(){
        echo json_encode($this->CommonModel->getRoomDetails());
    }
    public function getPriceDetails(){
        echo json_encode($this->CommonModel->getPriceDetails());
    }
    
    public function saveRoomPrice(){
        echo $this->CommonModel->saveRoomPrice(json_decode(file_get_contents('php://input')));
    }
    
    public function updateRoomPrice(){
        echo $this->CommonModel->updateRoomPrice(json_decode(file_get_contents('php://input')));
    }
    public function deleteRoomPrice(){
        echo $this->CommonModel->deleteRoomPrice(json_decode(file_get_contents('php://input'))->id);
    }
    
    
}