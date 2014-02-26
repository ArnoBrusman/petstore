<?php

/**
 * Description of order_model
 *
 * @author Brusman
 */
class Customer_model extends MY_Model {
    
    public $table_name = 'customer';


    public function get_customer($name, $address) {
        $this->db->where(array('address' => $address, 'name' => $name));
        $dba_customers = $this->fetch();
        if($dba_customers) {
            return $dba_customers[0];
        } else {
            return false;
        }
    }
}
