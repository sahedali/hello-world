<?php

if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Booking extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('CommonModel');
        $login = $this->session->userdata('logged_in');
        if(!isset($login)){
            redirect('Login/logout');
            return false;
        }
    }

   /*  public function RoomBooking() {
        $this->load->view('common/header');
        $this->load->view('Booking/RoomBooking');
        $this->load->view('common/footer');
    }
    
    public function AddRoom() {
        $this->load->view('common/header');
        $this->load->view('Booking/AddBooking');
        $this->load->view('common/footer');
    } */
    
    public function saveBooking(){
        if(!empty($_FILES['image'])){ 
            $data = json_decode($_POST['data']);
            $customerId=$this->CommonModel->saveBooking($data);
            $ext = pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
            $image = $customerId['customer_id'].'.jpg';//.$ext; //time()
            $path =FCPATH."bower_components\\CustomarImage\\";
            move_uploaded_file($_FILES["image"]["tmp_name"], $path.$image);
            echo json_encode($customerId);
        }else{
            //$data = json_decode($_POST['data']);
            $data = json_decode(file_get_contents('php://input'));
            //print_r($data);
            //           die;
            $customerId=$this->CommonModel->saveBooking($data);
			echo json_encode($customerId);
        }
    }
	
	 public function uploaddocuments(){
            if(!isset($_FILES['file']))
                    {
                        $response=array("status"=>0,"message"=>"File not choosen!");
                        print json_encode($response);
                        exit;
                    }else{
                        $data = json_decode($_POST['gust_details']);
                        if($this->CommonModel->uploaddocuments($data,$_FILES['file'])){ //file upload 
                               $response=array("status"=>1,"message"=>"File upload succesfully Done!");
                                print json_encode($response);
                                exit;
                        }
                    }
    }
    
    public function getMasterId(){
        echo json_encode($this->CommonModel->getIdMaster());
    }
    
    public function getRoomFoorBooking(){
        echo json_encode($this->CommonModel->getRoomForBooking(json_decode(file_get_contents('php://input'))));
    }
    
    public function getBookingDetails(){
        echo json_encode($this->CommonModel->getBookingDetails(json_decode(file_get_contents('php://input'))));
    }
	public function getBookingDetailsHistory(){
        echo json_encode($this->CommonModel->getBookingDetailsHistory());
    }
	
	public function searchCustomer(){
		echo json_encode($this->CommonModel->getCustomer(json_decode(file_get_contents('php://input'))));
	}
	
	public function getBookingDetailsUpdate(){
		echo json_encode($this->CommonModel->getBookingDetailsUpdate(json_decode(file_get_contents('php://input'))));
	}
	public function getAccountLedgerDetails(){
		echo json_encode($this->CommonModel->getAccountDetails());
	}
	
	public function getPaymentDetails(){
		echo json_encode($this->CommonModel->getPaymentDetails(json_decode(file_get_contents('php://input'))));
	}
	
	public function exsistPaymentDetails(){
		echo json_encode($this->CommonModel->exsistPaymentDetails(json_decode(file_get_contents('php://input'))));
	}
	
	
	public function getBookingPaymentDetails(){
		echo json_encode($this->CommonModel->getBookingPaymentDetails(json_decode(file_get_contents('php://input'))));
	}
	
	public function savePaymentDetails(){
		echo json_encode($this->CommonModel->savePaymentDetails(json_decode(file_get_contents('php://input'))));
	}
	
	public function saveGustDetails(){
		echo json_encode($this->CommonModel->saveGustDetails(json_decode(file_get_contents('php://input'))));
	}
	
	public function getGustDetails(){
		echo json_encode($this->CommonModel->getGustDetails(json_decode(file_get_contents('php://input'))));
	}
	public function getCustomerDetails(){
		echo json_encode($this->CommonModel->getCustomerDetails(json_decode(file_get_contents('php://input'))));
	}
	public function requestForCheckIN(){
		echo json_encode($this->CommonModel->requestForCheckIN(json_decode(file_get_contents('php://input'))));
	}
	
    public function getCRPaymentDetails(){
        echo json_encode($this->CommonModel->getCRPaymentDetails(json_decode(file_get_contents('php://input'))));
    }
	  
    public function paymentandCheckout(){
        echo json_encode($this->CommonModel->paymentandCheckout(json_decode(file_get_contents('php://input'))));
    } 
     
}