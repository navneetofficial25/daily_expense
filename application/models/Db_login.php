<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Db_login extends CI_Model {

    public function login_check($data){
        $array = array('user_email'=>$data['email'],'user_pass'=>md5($data['password']));
        return $this->db->where($array)->get('admin_user')->row_array();

    }

    // ADMIN-MANAGEMENT

    public function fetch($id){
        $data =  $this->db->where('user_id',$id)->get('admin_user')->row_array();
          return $data ;
      }

      public function insert_update($id,$data){
        return $this->db->where('user_id',$id)->UPDATE('admin_user',$data);
    }

    // SOCIAL-LINKS

    public function fetch_links(){
        $data =  $this->db->get('social_links')->row_array();
          return $data ;
      }

       public function update_links($data){
         return $this->db->UPDATE('social_links',$data);
     }

    //  SITE SETTING

    public function fetch_site(){
        $data =  $this->db->get('site_setting')->row_array();
          return $data ;
      }

    public function update_site($data){
         return $this->db->UPDATE('site_setting',$data);
     }

}



/* End of file Db_login.php */
