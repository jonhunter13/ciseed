<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller{

    function __construct(){
        parent::__construct();
        
        $this->load->database();
        $this->load->model('user_model','Students');
    }

    function index(){
        redirect('/','refresh');
    }

    function get_users(){
        $query = $this->Students->get_users();
        $data = '';
        foreach($query->result() as $row){
            $data['user'][] = $row;
        }

        echo json_encode($data);
    }

    function randomize_users(){
        echo $this->Students->randomize_users();
    }

}
