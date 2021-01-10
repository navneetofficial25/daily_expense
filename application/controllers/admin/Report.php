<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
            if(is_null($this->session->userdata("id"))){
                redirect(base_url().'admin','refresh');
            }
            $this->load->model('db_target');
    }
    

    public function index($data=null)
    {
        
        $this->load->view('admin/common/header');
        $this->load->view('admin/common/sidebar');
        $this->load->view('admin/report',$data);
        $this->load->view('admin/common/footer');
        
    }
    public function fetch(){

        $data['first'] = $this->input->post('first');
        $data['end'] = $this->input->post('end');
        $data['fetch'] = $this->db_target->fetch($data);
        $this->index($data);
    }

}


