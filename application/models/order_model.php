<?php

/**
 * Description of order_model
 *
 * @author Brusman
 */
class Order_model extends MY_Model {
    
    public $table_name = 'order';
    
    function fetch() {
        
        $this->db->select('order.id')
            ->select('customer.id as customer_id')
            ->select('pet.id as pet_id')
            ->select('customer.name as customer_name')
            ->select('pet.name as pet_name')
            ->select(array('address', 'species', 'race', 'price', 'status'))
            ->join('customer', 'customer_id = customer.id', 'left')
            ->join('pet', 'pet_id = pet.id', 'left');
        $result = parent::fetch();
        return $result;
    }
            
    function get_customer($order_id) {
        $this->load('customer_model');
        $db_order = $this->find_by_id($order_id);
        $db_customer = $this->customer_model->find_by_id($db_order->id);
        return $db_customer;
    }
    
    function get_pet($order_id) {
        $this->load('pet_model');
        $db_order = $this->find_by_id($order_id);
        $db_pet = $this->pet_model->find_by_id($db_order->id);
        return $db_pet;
    }
    
    public function count($field = 'order.id') {
        return parent::count($field);
    }
}
