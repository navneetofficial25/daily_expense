<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Add_expenses extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
            if(is_null($this->session->userdata("id"))){
                redirect(base_url().'admin','refresh');
            }
            $this->load->model('db_target');
    }
    

    public function index()
    {

        $this->load->view('admin/common/header');
        $this->load->view('admin/common/sidebar');
        $this->load->view('admin/add_expenses');
        $this->load->view('admin/common/footer');
        
    }
    public function add(){
        $data['amt'] = $this->input->post('amount');
        $data['return_amt'] = $this->input->post('return');
        if($data['amt'][0] == '+' || $data['amt'][0] == '-'){
            $data['msg'] = $this->input->post('message');
            if($this->input->post('date')){
                $data['date'] = $this->input->post('date');
            }else{
                $data['date'] = date('Y-m-d');
            }
            if($this->input->post('personName')){
                $data['personName'] = $this->input->post('personName');
            }
            if($this->db_target->add_entry($data)){
                $this->session->set_flashdata('status', '<p class="text-success">Added Successfully</p>');           
                redirect(base_url().'admin/add_expenses/');  
            }else{
                $this->session->set_flashdata('status', '<p class="text-danger">Error in adding</p>');           
                redirect(base_url().'admin/add_expenses/'); 
            }
        }else{
            $this->session->set_flashdata('status', '<p class="text-danger">Add +/- in amount</p>');           
            redirect(base_url().'admin/add_expenses/');  
        }
        

    }

}

