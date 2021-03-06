<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CommonModel extends CI_Model {
    function __construct()
    {
        parent::__construct();
		date_default_timezone_set('Asia/Calcutta');
    }
    public function getRoomCategory()
	{
	    $q = "SELECT b.*,group_concat(room_number) as room_id FROM room_master a,room_category_master b WHERE a.room_category_id = b.id group by room_category_id order by a.id desc";
	    $res = $this->db->query($q);
	    return $res->result_array();
	}
	
	public function getRoomDetails(){
	    $q="SELECT a.id,a.room_number,b.id as categoryId,b.name,b.description FROM room_master a,room_category_master b WHERE a.room_category_id=b.id and a.is_active=1 order by a.id desc";
	    $res = $this->db->query($q);
	    return $res->result_array();
	}
	
	public function saveRoom ($data){
		$data_ = array(
        'room_number'=>$data->room_number,
        'room_category_id'=>$data->categoryId,
		'created_on'=>'00-00-0000',
		'created_by'=>1,
        'modified_on'=>'00-00-0000',
		'modified_by'=>1,
		'is_active'=>1
    );
    return $this->db->insert('room_master',$data_);
	}
	
	public function updateRoom ($data){
		$data_ = array(
			'room_number'=>$data->room_number,
			'room_category_id'=>$data->categoryId,
			'created_on'=>'00-00-0000',
			'created_by'=>1,
			'modified_on'=>'00-00-0000',
			'modified_by'=>1,
			'is_active'=>1
		);
		$this->db->where('id', $data->id);  
		return $this->db->update('room_master', $data_);  
	}

	public function deleteRoom ($id){
		$this->db->where('id', $id);
		return $this->db->delete('room_master');
	}

	
		public function saveRoomCat ($data){
		$data_ = array(
			'name'=>$data->name,
			'description'=>$data->description,
			'week_days_price'=>$data->week_days_price,
			'weekend_price'=>$data->weekend_price,
			'created_on'=>'00-00-0000',
			'created_by'=>1,
			'modified_on'=>'00-00-0000',
			'modified_by'=>1,
			'is_active'=>1
    ); 


	$roomNumber = explode(',', $data->room_id);
	$flg1 =  $this->db->insert('room_category_master',$data_);
	$categoryId = $this->db->insert_id();

	foreach ($roomNumber as $rm) {
		$data_ = array(
        'room_number'=>$rm,
        'room_category_id'=>$categoryId,
		'created_on'=>'00-00-0000',
		'created_by'=>1,
        'modified_on'=>'00-00-0000',
		'modified_by'=>1,
		'is_active'=>1
    );
		$flg = $this->db->insert('room_master',$data_);
	}
	return $flg;
	/*$categoryId = $this->db->insert_id();
	$data_for_price = array(
	        'category_id'=>$categoryId,
	        'amount'=>0,
			'week_days_price'=>$data->week_days_price,
			'weekend_price'=>$data->weekend_price,
	        'start_date'=>'00-00-0000',
	        'end_date'=>'00-00-0000',
	        'created_on'=>'00-00-0000',
	        'created_by'=>1,
	        'modified_on'=>'00-00-0000',
	        'modified_by'=>1,
	        'is_active'=>1
	    );
	    return $this->db->insert('price_detail',$data_for_price);*/
	}
	
	public function updateRoomCat ($data){
		$data_ = array(
			'name'=>$data->name,
			'week_days_price'=>$data->week_days_price,
			'weekend_price'=>$data->weekend_price,
			'description'=>$data->description,
			'created_on'=>'00-00-0000',
			'created_by'=>1,
			'modified_on'=>'00-00-0000',
			'modified_by'=>1,
			'is_active'=>1
		);
		$this->db->where('id', $data->id);  
		$flg1=$this->db->update('room_category_master', $data_);  

		$roomNumber = explode(',', $data->room_id);
		//$this->db->where('room_category_id',$data->id);
		//$this->db->delete('room_master');
	    $flg=0;
		foreach ($roomNumber as $rm) {
		$query = $this->db->query("select count(1) as count from room_master where room_number=".$rm);
		$result = $query->result_array();
		$ss= $result[0]['count'];
		//echo $ss;
		if($ss==0){
			if($result[0]['count']==0){
				$data_ = array(
				'room_number'=>$rm,
				'room_category_id'=>$data->id,
				'created_on'=>'00-00-0000',
				'created_by'=>1,
				'modified_on'=>'00-00-0000',
				'modified_by'=>1,
				'is_active'=>1
				);
				$flg = $this->db->insert('room_master',$data_);
			}
		}
	}
	return $flg1;
  }
	
	public function deleteRoomCat ($id){
		$this->db->where('room_category_id', $id);
		$this->db->delete('room_master');
		$this->db->where('id', $id);
		return $this->db->delete('room_category_master');
	}
	
	public function getPriceDetails (){
	    
	    $this->db->select('price_detail.id,room_category_master.id as categoryId,
                            room_category_master.name,price_detail.amount,price_detail.start_date AS start_date,price_detail.end_date AS end_date');
	    $this->db->from('price_detail');
	    $this->db->join('room_category_master','room_category_master.id=price_detail.category_id');
	    $this->db->order_by("price_detail.id", "desc");
	    $query=$this->db->get();
	    return $query->result_array();
	}
	
	public function saveRoomPrice ($data){
	    $data_ = array(
	        'category_id'=>$data->categoryId,
	        'amount'=>$data->amount,
	        'start_date'=>date("Y-m-d", strtotime($data->start_date)),
	        'end_date'=>date("Y-m-d", strtotime($data->end_date)),
	        'created_on'=>'00-00-0000',
	        'created_by'=>1,
	        'modified_on'=>'00-00-0000',
	        'modified_by'=>1,
	        'is_active'=>1
	    );
	    return $this->db->insert('price_detail',$data_);
	}

	public function updateRoomPrice ($data){
	    $data_ = array(
	        'category_id'=>$data->categoryId,
	        'amount'=>$data->amount,
	        'start_date'=>$data->start_date,
	        'end_date'=>$data->end_date,
	        'created_on'=>'00-00-0000',
	        'created_by'=>1,
	        'modified_on'=>'00-00-0000',
	        'modified_by'=>1,
	        'is_active'=>1
	    );
	    $this->db->where('id', $data->id);
	    return $this->db->update('price_detail', $data_);
	}
	
	public function deleteRoomPrice ($id){
	    $this->db->where('id', $id);
	    return $this->db->delete('price_detail');
	}
	
	
	public function saveBooking ($data){
		$rmPrice = explode (",", $data->roomId);  // roomId, price , roomnumber, category
		$id =0;
	    $data_ = array(
	        'name'=>$data->name,
	        'age'=>$data->age,
	        'gender'=>$data->gender,
	        'email_id'=>$data->email,
	        'ph_number'=>$data->m_no,
	        'id_type'=>0,
	        'id_value'=>0,
	        'created_on'=>'00-00-0000',
	        'created_by'=>1,
	        'modified_on'=>'00-00-0000',
	        'modified_by'=>1,
	        'is_active'=>1
	    );
		if($data->id>0){
			$id = $data->id;
			$this->db->where('id', $id);
		    $this->db->update('customer', $data_);
		}else{
	    $this->db->insert('customer',$data_);
	    $id =$this->db->insert_id();
		}
	    if($id>0){
			$query = $this->db->query("SELECT id+1 as count FROM booking ORDER BY id DESC LIMIT 1");
			$result = $query->result_array();
			if(empty($result)){
				$bkid=1;
			}else{
				$bkid=$result[0]['count'];
			}
			$checnIn = 2;
			if(date('Y-m-d', strtotime($data->start_date))==date('Y-m-d')){
				$checnIn = 1;
			}
			
	         $data_for_booking = array(
	             'customer_id' =>$id ,
	             'booking_number'=>date('d').date('m').date('y').$bkid,
	             'start_date' => $data->start_date.' '.date("H:i:s"),
	             'end_date' => $data->end_date.' '.date("H:i:s"),
	             'room_id' =>$rmPrice[0],
	             'price' =>$rmPrice[1],
	             'category_name'=>$rmPrice[3],
	             'room_number'=>$rmPrice[2],
				 'check_in'=>0,
	             'created_on'=>'00-00-0000',
	             'created_by'=>1,
	             'modified_on'=>'00-00-0000',
	             'modified_by'=>1,
	             'is_active'=>1
	        ); 
        $this->db->insert('booking',$data_for_booking);
		$dd['customer_id']= $id ;
		$dd['booking_id']= $this->db->insert_id();
	    return $dd;
	}

	}
	
	public function getIdMaster(){
	    return $this->db->get('id_master')->result_array();
	}
	
	
	public  function getRoomForBooking($data){
	    
	    $sql = "SELECT DISTINCT rm.room_number,rm.id as room_id,rm.room_category_id,rmcat.name as category,
                rmcat.description,price.amount,0 as week_days_price, 0 as weekend_price,'1' as flg FROM room_master rm,room_category_master rmcat,price_detail price 
                where rm.room_category_id = rmcat.id and rm.id 
                NOT IN (SELECT bk.room_id from booking bk WHERE STR_TO_DATE( bk.end_date, '%Y-%m-%d') between '".$data->start_date."' and '".$data->end_date."' or '".$data->start_date."' between STR_TO_DATE( bk.start_date, '%Y-%m-%d') and STR_TO_DATE( bk.end_date, '%Y-%m-%d') or '".$data->end_date."' between STR_TO_DATE( bk.start_date, '%Y-%m-%d') and STR_TO_DATE( bk.end_date, '%Y-%m-%d') ) and 
                price.category_id = rm.room_category_id and '".$data->start_date."' BETWEEN price.start_date and end_date and '".$data->end_date."'
				BETWEEN price.start_date and end_date  union SELECT rm.room_number,rm.id as room_id,rm.room_category_id,rmcat.name as category, rmcat.description,0 as amount,rmcat.week_days_price 
,rmcat.weekend_price,'2' as flg FROM room_master rm,room_category_master rmcat
 where rm.room_category_id = rmcat.id and rm.id NOT IN ( SELECT rm.id FROM room_master rm,room_category_master rmcat,price_detail price 
                where rm.room_category_id = rmcat.id and rm.id 
                NOT IN (SELECT bk.room_id from booking bk WHERE STR_TO_DATE(bk.start_date, '%Y-%m-%d') between '".$data->start_date."' and '".$data->end_date."'
				 and STR_TO_DATE( bk.end_date, '%Y-%m-%d') between '".$data->start_date."' and '".$data->end_date."') and 
                price.category_id = rm.room_category_id and '".$data->start_date."' BETWEEN price.start_date and end_date and '".$data->end_date."'
				BETWEEN price.start_date and end_date ) and rm.id 
                NOT IN (SELECT bk.room_id from booking bk WHERE STR_TO_DATE(bk.start_date, '%Y-%m-%d') between '".$data->start_date."' and '".$data->end_date."'
				 and STR_TO_DATE( bk.end_date, '%Y-%m-%d') between '".$data->start_date."' and '".$data->end_date."')";
				 //echo $sql;
				 //die;
	    $res = $this->db->query($sql);
	    return $res->result_array();
	    
	}

	public function getBookingDetails($data){
		$sql = "SELECT bk.id,bk.price,cus.name ,cus.age,cus.gender,cus.email_id as email,cus.ph_number as m_no, bk.start_date, bk.end_date , rm.room_number, rmcat.description,bk.check_in FROM booking bk , room_master rm ,room_category_master rmcat,customer cus WHERE bk.customer_id = cus.id and bk.room_id=rm.id and rm.room_category_id=rmcat.id and bk.check_in = '".$data->flg."' ORDER BY bk.id DESC";
		//echo $sql;
		//die;
		$res = $this->db->query($sql);
		return $res->result_array();
	}
	/*public function getBookingDetailsHistory(){
		$sql = "SELECT bk.id,bk.price,cus.name , bk.start_date, bk.end_date , rm.room_number, rmcat.description FROM booking bk , room_master rm ,room_category_master rmcat,customer cus WHERE bk.customer_id = cus.id and bk.room_id=rm.id and rm.room_category_id=rmcat.id and STR_TO_DATE( bk.end_date, '%Y-%m-%d') <= CURDATE() ORDER BY bk.id DESC";
		$res = $this->db->query($sql);
		return $res->result_array();
	}*/
	
	public function getCustomer($data){
		$sql = "select * from customer where ph_number='".$data->mobileNo."'  ORDER BY id DESC limit 1";
		$res = $this->db->query($sql);
		return $res->result_array();
	}
	
	public function getBookingDetailsUpdate($data)
	{
		if(date("Y-m-d", strtotime($data->start_date))>date("Y-m-d", strtotime($data->end_date))){
			return false;
		}
		$data_ = array(
			//'start_date'=>$data->start_date,
			'end_date'=>$data->end_date.' '.date("H:i:s")
		);
		$this->db->where('id', $data->id);  
		return $this->db->update('booking', $data_);  
	}
	
	public function getAccountDetails(){
		$sql = "SELECT * FROM account_ledger";
		$res = $this->db->query($sql);
		return $res->result_array();
	}
	public function getPaymentDetails($data){
		$sql = "SELECT price,pmt.payment_amount as total_amount,DATEDIFF(end_date,start_date) as number_of_days,price,booking_number,start_date,end_date ,id as booking_id ,ledger.name FROM booking bk , payment pmt,account_ledger ledger WHERE bk.id =".$data->bookingId." and bk.id = pmt.booking_id and ledger.ledger_id = pmt.ledger_id";
		//echo $sql;
		//die;
		$res = $this->db->query($sql);
		return $res->result();
	}
	public function getBookingPaymentDetails($data){
		$sql = "SELECT DATEDIFF(end_date,start_date) * price as total_amount ,'room rant' as ledger_name ,DATEDIFF(end_date,start_date) as number_of_days,price,booking_number,start_date , end_date ,id as booking_id FROM booking WHERE id =".$data->bookingId;
		$res = $this->db->query($sql);
		return $res->result();
	}

	
	public function savePaymentDetails($data){
		
		$data_ = array(
        'booking_id'=>$data->bookingId,
        'payment_amount'=>$data->payment,
		'ledger_id'=>$data->ledger_id,
		'payment_date'=>null,
		'created_on'=>'00-00-0000',
		'created_by'=>1,
        'modified_on'=>'00-00-0000',
		'modified_by'=>1,
		'is_active'=>1
		);
		$this->db->insert('payment',$data_);
		return $this->db->insert_id();
		
		/*if($query->num_rows()>0){
			//update 
			$this->db->where('booking_id', $data->bookingId);  
			$this->db->update('payment',$data_);
			$ss = 0 + $query->result()[0]->payment_id; $ss = (int)$ss;
			return $ss;
		}else{
			$this->db->insert('payment',$data_);
			return $this->db->insert_id();
		}*/
	}
	
	public function exsistPaymentDetails($data){
		$sql = "SELECT * FROM payment WHERE booking_id = ".$data->bookingId;
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			return 1;
		}
		return 0;
	}
	
	public function saveGustDetails($data){
		//print_r($data);
		//die;
		foreach($data->data as $dt){
			if($dt->gust_id!=-1){
			$tableData = array(
				'booking_id'=>$data->bookingId,
				'name'=>$dt->gust_name,
				'age'=>$dt->gust_age,
				'gender'=>$dt->gust_gnder,
				'created_on'=>'00-00-0000',
				'created_by'=>1,
				'modified_on'=>'00-00-0000',
				'modified_by'=>1,
				'is_active'=>1
			);
			$this->db->insert('customer_gust',$tableData);
			}
		}
		return true;
	}

	public function getGustDetails($data){
		$sql = "SELECT  * FROM customer_gust WHERE booking_id =".$data->bookingId;
		$res = $this->db->query($sql);
		return $res->result();
	}
	
	public function getCustomerDetails ($data){

		$sql ="SELECT cus.name,cus.age,cus.gender,cus.id as customer_id, 1 as 'flgofhead',id_type as idType1,id_value as idValue,cus.id as image_id from customer cus , booking bk where bk.customer_id = cus.id and bk.id = ".$data->bookingId." 
				UNION 
		       SELECT gst.name,gst.age,gst.gender,gst.id as customer_id,0 as 'flgofhead',id_type as idType1,id_value as idValue,gst.id as image_id FROM booking bk , customer_gust gst WHERE 	bk.id = gst.booking_id  and bk.id =".$data->bookingId;
		$res = $this->db->query($sql);
		return $res->result();

		/*$sql ="SELECT cus.name,cus.age,cus.gender,cus.id as customer_id, 1 as 'flgofhead',id_type as idType1,id_value as idValue from customer cus , booking bk where bk.customer_id = cus.id and bk.id = ".$data->bookingId." 
				UNION 
		       SELECT gst.name,gst.age,gst.gender,gst.id as customer_id,0 as 'flgofhead',id_type as idType1,id_value as idValue FROM booking bk , customer_gust gst WHERE 	bk.id = gst.booking_id  and bk.id =".$data->bookingId;
		$res = $this->db->query($sql);
		return $res->result();*/
	}
	
	public function requestForCheckIN($data){
		$bkId = $data->bookingId;
		$sql = "select STR_TO_DATE(start_date, '%Y-%m-%d') as start_date from booking where id=".$bkId;
		$res = $this->db->query($sql);
		$start_date = "";
		foreach($res->result() as $data){
			$start_date = $data->start_date;
		}
		if(date("Y-m-d")>$start_date){
			return -1; // booking not excepted
		}
		if(date("Y-m-d") == $start_date){
			$checkin = 1;
		}else{
			$checkin = 2;
		}
		$sql1 = "update booking set check_in =".$checkin." where id=".$bkId;
		$this->db->query($sql1);
		return $checkin;
	}
	
	public function uploaddocuments($data,$images){
		$i=0;
		$flg = false;
		foreach($data as $dt){
			$tableData = array(
				'id_type'=>$dt->idType1,
				'id_value'=>$dt->idValue,
			);
			$this->db->where('id', $dt->customer_id);
			$path =FCPATH."bower_components\\CustomarImage\\customer\\";
			if($dt->flgofhead==0){ // gust 
			$this->db->update('customer_gust',$tableData);
			$path =FCPATH."bower_components\\CustomarImage\\gust\\";
		    }
			else{
			$this->db->update('customer',$tableData);
			}
            $image = $dt->customer_id.'.jpg';
            $flg=move_uploaded_file($images["tmp_name"][$i], $path.$image); 
            $i++;
		}
		return $flg;
	}


	public function paymentandCheckout($data){

		$sql = "select STR_TO_DATE(end_date, '%Y-%m-%d') as end_date from booking where id=".$data->booking_id;
		$res = $this->db->query($sql);
		$end_date = "";
		foreach($res->result() as $data){
			$end_date = $data->end_date;
		}
		//echo date("Y-m-d");
		//echo 'hi ==='.$end_date;
		if(date("Y-m-d")!=$end_date){
			return false; // booking not excepted
		}

		if($data->flg == 0){ // pay and checkout 
			$tableData = array(
				'booking_id'=>$data->booking_id,
				'payable_amount'=>$data->total_amount,
				'payment_type' =>$data->payment_mode,
				'pay_transaction_id' =>$data->tran_id,
				'feedback'=>$data->feedback,
				'created_on'=>'00-00-0000',
				'created_by'=>1,
		        'modified_on'=>'00-00-0000',
				'modified_by'=>1,
				'is_active'=>1
			);
		 $this->db->insert(' final_payment',$tableData);
		 if($this->db->insert_id()>0){
		 	$sql ="update booking SET check_in=3 where id=".$data->booking_id;
		 	return $this->db->query($sql);
		 }

		}else{ //only checkout 
			$sql ="update booking SET check_in=3 where id=".$data->booking_id;
			return $this->db->query($sql);
		}
	}
}

