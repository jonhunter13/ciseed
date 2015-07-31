<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();

        //testing out php enabled view
//        $this->load->database();
//        $this->load->model('user_model','Students');
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
            //If the assignment allowed php in the view, I would call the model here to pass data to the view
//            $data['students'] = $this->Students->get_users();
//            $this->load->view('welcome_message', $data);
            //in the view it would look something like this:
            /*
                <?php foreach($students->result() as $row):?>
                <tr>
                   <td><?=$row->id?></td>
                   <td><?=$row->user_name?></td>
                   <td><?=$row->password?></td>
               </tr>
               <?php endforeach; ?>
             */

            //not much to do here, output the html
            $this->load->view('welcome_message');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */