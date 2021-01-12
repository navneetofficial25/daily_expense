<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Db_target extends CI_Model {

    public function add_entry($data){
       $this->db->insert('daily_expense', $data);
    if($this->db->insert_id()){
        return true;
    }else{
        return false;
    }
        
    }
    public function fetch($data){
       return $this->db->query('Select * from daily_expense where date between "'.$data['first'].'" And "'.$data['end'].'" ORDER BY date DESC')->result_array();
    }
    
}

/* End of file Db_target.php */
