<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $student_table = "Student";

    public function __construct (){
        parent::__construct();
        $this->load->database();
    }

    public function getUserByID ($id){
        return $this->db
            ->where('id', $id)
            ->get($this->student_table)->row();
    }

    public function get_users(){
        return $this->db->get($this->student_table);
    }

    public function update_user($id, $data){
        $this->db
            ->where('id', $id)
            ->update($this->student_table, $data);
    }

    public function randomize_user($id){
        $this->load->helper('string');
        $username = random_string('alnum', 5);
        $password = random_string('alnum', 16);
        $data = array(
            'user_name'=>$username,
            'password'=>$password,
        );
        $this->update_user($id, $data);
    }

    public function randomize_users(){
        $students = $this->get_users();
        $num = 0;
        foreach($students->result() as $row){
            $this->randomize_user($row->id);
            $num++;
        }
        echo "Updated $num users";
        
    }
}

?>