<?php

class User extends MY_Controller {
    
    public $security_lvl_needed = 1;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function insert() {
        $this->load->helper('form');
        if (!empty($_POST['username'])) {
            if($this->validate_form() === TRUE) {
                $d_userdata['username'] = $this->input->post('username');
                $d_userdata['password'] = sha1($this->input->post('description'));
                $insert_id = $this->user_model->create($d_userdata);
                redirect("admin/user/edit/" . $insert_id);
            }
        }
        $this->load->view('admin/user/insert/index');
    }
   
    public function display()
    {
        $dba_users = $this->user_model->fetch();
        $data = array('dba_users' => $dba_users);
        $this->load->view('admin/user/display/index', $data);
    }
    
    public function edit($user_id) {
        $this->load->helper('form');
        if (isset($_POST['update'])) {
            if($this->validate_form() === TRUE) {
                $data = array();
                $data['username'] = $this->input->post('username');
                $data['password'] = sha1($this->input->post('password'));

                $this->user_model->update($data, $user_id);
                redirect('admin/user/display');
            }
        }
        
        $db_user = $this->user_model->find_by_id($user_id);
        $this->load->view('admin/user/edit/index', array('db_user' => $db_user));
    }
    
    public function delete($petID) {
        //confirmation
        if (isset($_POST['confirm']) && $_POST['confirm'] == 'yes') {
            $this->user_model->delete($petID);
            redirect('admin/user/display/');
        } else {
            $db_user = $this->user_model->find_by_id($petID);
            $vw_displaydata = array('db_user' => $db_user);
            $this->load->view('admin/user/delete/index', $vw_displaydata);
        }
    }
    
    protected function validate_form() {
        $this->load->library('form_validation');
        $rules = array(
            array(
                'field' => 'username',
                'label' => 'username',
                'rules' => 'required|max_length[255]'
            ),
            array(
                'field' => 'upassword',
                'label' => 'password',
                'rules' => 'required|max_length[255]'
            )
        );
        $this->form_validation->set_rules($rules);
        return $this->form_validation->run();
    }
}