<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Db_blog extends CI_Model {

    public function insert_post($data){
      $this->db->insert('posts', $data); 
        return $this->db->insert_id();
          
    }
    public function fetch(){
     return $this->db->get('posts')->result_array();
      
    }
    public function delete($id){
      $this->db->where('post_id',$id)->delete('posts');
      
      if($this->db->affected_rows()>0){
        return true;
      }
      else{
        return false;
      }
      
    }
    public function create_cat($data){
      $this->db->insert('category', $data);
      if($this->db->insert_id()){
        return true;
      }
      else{
        return false;
      }
    }
    public function fetch_cat(){
      return $this->db->get('category')->result_array();
      
    }
    public function delete_cat($id){
      $this->db->where('cat_id',$id)->delete('category');
      if($this->db->affected_rows()>0){
        return true;
      }
      else{
        return false;
      }
    }

}

/* End of file Db_blog.php */
