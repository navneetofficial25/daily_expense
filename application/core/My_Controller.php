<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class My_Controller extends CI_Controller {

    
    protected $data;
    public function __construct(){
        parent::__construct();
        $this->config->load("urls", true);
        $this->data['url'] = $this->config->item("url");
    }
    

}

/* End of file My_COntroller.php */
