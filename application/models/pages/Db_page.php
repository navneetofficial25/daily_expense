<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Db_page extends CI_Model {

    public function fetch_page(){
       return $this->db->get('pages')->result_array();
    }
    public function insert_page($data){
        return $this->db->insert('pages', $data);
    }
    public function delete($id){
       $this->db->where('page_id',$id)->delete('pages');
        if($this->db->affected_rows()>0)
            return true;
        else
            return false;
    }
    public function update($id){
       return $this->db->where('page_id',$id)->get('pages')->row_array();
        
     }
     public function updateinsert($id,$data){
        $this->db->where('page_id',$id)->update('pages', $data);
        if($this->db->affected_rows()>0)
            return true;
        else
            return false;   
    }
}

/* End of file Db_page.php */
