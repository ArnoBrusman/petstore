<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of basket
 *
 * @author Brusman
 */
class Basket {
    
    public $CI;
    /**
     * array with pet ids
     */
    public $pets;
    
    /**
     * latest error
     */
    public $error;
    
    function __construct() {
        $this->CI =& get_instance();
        
        $this->pets = $this->CI->session->userdata('basket') ? $this->CI->session->userdata('basket') : array();
    }
    
    function get_pets() {
        $dba_pets = array();
        foreach ($this->pets as $v_pet_id) {
            $dba_pets[] = $this->CI->Pet_model->find_by_id($v_pet_id);
        }
        return $dba_pets;
    }
    
    public function add_pet($pet_id) {
        
        $db_pet = $this->CI->Pet_model->find_by_id($pet_id);
        $success = false;

        if (in_array($pet_id, $this->pets)) {
            $this->error = 'pet already in basket';
        } elseif (empty($db_pet)) {
            $this->error = 'pet doesn\'t exist';
        } else {
            $this->pets[] = $pet_id;
            $this->CI->session->set_userdata(array('basket' => $this->pets));
            $success = true;
        }
        return $success;
    }
    
    public function clean() {
        $this->CI->session->unset_userdata('basket');
        $this->pets = array();
    }
    
    public function order_all($customer_data) {
        $this->CI->load->model('Order_model');
        $this->CI->load->model('Customer_model');
        
        $db_customer = $this->CI->Customer_model->get_customer($customer_data['name'], $customer_data['address']);

        if(!empty($db_customer)) {
            $customer_id = $db_customer->id;
        } else {
            $customer_id = $this->CI->Customer_model->create($customer_data);
        }
        $dba_pets = $this->get_pets();
        foreach ($dba_pets as $dbv_pet) {
            $order_data = array(
                'pet_id' => $dbv_pet->id,
                'customer_id' => $customer_id,
                'status' => 1
            );
            $this->CI->Order_model->create($order_data);
        }
        $this->clean();
    }
}
