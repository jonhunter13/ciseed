<?php

class UserModelTest extends CIUnit_Framework_TestCase
{
    private $user;
    
    protected function setUp()
    {
        $this->get_instance()->load->model('User_model', 'user');
        $this->user = $this->get_instance()->user;
    }

    //should at least test if get method retrieves username and password
    public function testGetUserById(){
        $user = $this->user->getUserById(1);
        $this->assertNotNull($user->user_name);
        $this->assertNotNull($user->password);
    }

    public function testRandomizeUser(){
        $expectedUser = $this->user->getUserByID(1);
        $data = array(
            'user_name'=>$expectedUser->user_name,
            'password'=>$expectedUser->password,
        );
        $res = $this->user->randomize_user(1);
        $this->assertNotEquals($expectedUser, $this->user->getUserByID(1));

        //return the user to its original state
        $this->user->update_user(1, $data);
    }

    public function testGetUsers(){
        $users = $this->user->get_users();
        //original test data had 4 users
        $this->assertEquals(4, $users->num_rows());
    }
}

?>