<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Authentication extends MY_Controller {

    
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }
    
    public function index() {
        if(isset($_POST['username'])) {
            $userdata = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $auth = $this->user_model->authenticate($userdata);
            if($auth) {
                $db_userdata = $this->user_model->get_by_username($userdata['username']);
                $this->current_user->set_user_session($db_userdata);
            }
        }
        if($this->current_user->get_security_lvl() > 0) {
                redirect('admin');
        }
        
        $this->load->view('admin/login/index');
    }

  /**
   * Process user logout.
   */
  public function logout()
  {
    $this->session->sess_destroy();
    redirect('admin/authentication');
  }
  
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */