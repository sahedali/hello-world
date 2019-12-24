<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ResturentModel extends CI_Model {
    function __construct()
    {
        parent::__construct();
		date_default_timezone_set('Asia/Calcutta');
    }
    public function getTaleDetails()
	{
	    $q = "SELECT * FROM restruent_table order by id desc";
	    $res = $this->db->query($q);
	    return $res->result_array();
	}

	public function saveTable($data)
	{
	    $data_ = array(
        'name'=>$data->name,
        'no_of_chair'=>$data->no_of_chair,
		'active'=>true
    );
    return $this->db->insert('restruent_table',$data_);
	}

	public function updateTable($data){
		 $data_ = array(
        'name'=>$data->name,
        'no_of_chair'=>$data->no_of_chair,
	    );
		$this->db->where('id', $data->id);  
		return $this->db->update('restruent_table', $data_);
	}
}