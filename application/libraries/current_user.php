<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Brusman
 */
class Current_user {
    
    public $CI;
    
    public $db_data = false;
    
    public function __construct() {
        $this->CI =& get_instance();
        if($this->CI->session->userdata('user_id')) {
            $this->CI->load->model('user_model');
            $this->db_data = $this->CI->user_model->find_by_id($this->CI->session->userdata('user_id'));
        }
    }
    
    public function get_security_lvl() {
        if($this->CI->session->userdata('security_lvl')) {
            $security_lvl = $this->CI->session->userdata('security_lvl');
        } else {
            $security_lvl = 0;
        }
        return $security_lvl;
    }
    
    /**
     * Creates session data for logged in user.
     *
     * @param type $db_user 
     */
    function set_user_session($db_user)
    {
      $session_data = array(
          'user_id'        => $db_user->id,
          'logged_in'      => TRUE,
          'security_lvl'           => $db_user->security_lvl,
          'ip'             => $this->CI->input->ip_address()
      );
      $this->CI->session->set_userdata($session_data);
    }
}
