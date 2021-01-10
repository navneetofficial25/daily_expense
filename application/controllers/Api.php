<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('db_target');
    }
    
    public function index()
    {
       
    }
    public function request(){
        $data['device_token'] = $_REQUEST['id'];
        $data['host'] = $_REQUEST['host'];
        $data['ip'] = '';
            if (isset($_SERVER['HTTP_CLIENT_IP']))
            $data['ip'] = $_SERVER['HTTP_CLIENT_IP'];
            else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $data['ip'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $data['ip'] = $_SERVER['HTTP_X_FORWARDED'];
            else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
            $data['ip'] = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
            else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $data['ip'] = $_SERVER['HTTP_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_FORWARDED']))
            $data['ip'] = $_SERVER['HTTP_FORWARDED'];
            else if(isset($_SERVER['REMOTE_ADDR']))
            $data['ip'] = $_SERVER['REMOTE_ADDR'];
            else
            $data['ip'] = 'UNKNOWN';
        
            $data['agent'] = $_SERVER['HTTP_USER_AGENT'];        
            if(is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), "mobile"))){
                $data['device'] = 'mobile';
            }else if(is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), "windows"))){
                $data['device'] = 'desktop';
            }else if(is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), "tablet"))){
                $data['device'] = 'tablet';
            }else{
                $data['device'] = 'mobile';
            }
            $json_string = file_get_contents( "http://www.geoplugin.net/json.gp?ip=" . $data['ip']);
            $parsed_json = json_decode($json_string);
            $data['city'] = $parsed_json->geoplugin_city;
            $data['state'] = $parsed_json->geoplugin_regionName;
            $data['country'] = $parsed_json->geoplugin_countryName;

            if($this->db_target->store($data)){
                echo "Success";
            }else{
                echo "Failed";
            }
    }
    public function click_count($message_id){
        if($this->db_target->click_count($message_id)){
            echo "Success";

        }else{
            echo "Failed";

        }
    }

}

/* End of file Api.php */
