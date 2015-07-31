<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $student_table = "Student";

    public function __construct ()
    {
        parent::__construct();
    }

    public function getUserByID ($id)
    {
//        $user = array(
//                'id' => 11,
//                "name" => "John",
//                "surname" => "Doe",
//                "age" => 41
//        );
        return $this->db
                ->where('id', $id)
                ->get($this->student_table);
        
//        return $user;
    }

    public function get_users(){
        return $this->db->get($this->student_table);
    }

    public function update_user($id, $data){
        $this->db
            ->where('id', $id)
            ->update($this->student_table, $data);
    }

    public function randomize_users(){
        $this->load->helper('string');
        $students = $this->get_users();
        $num = 0;
        foreach($students->result() as $row){
            $username = random_string('alnum', 5);
            $password = random_string('alnum', 16);
            $data = array(
                'user_name'=>$username,
                'password'=>$password,
            );
            $this->update_user($row->id, $data);
            $num++;
        }
        echo "Updated $num users";

    }
}

?>