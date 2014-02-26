<?php

class Customer extends MY_Controller {
    
    public $security_lvl_needed = 1;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('customer_model');
    }
   
    public function display()
    {
        $this->set_request_data('customer');
        $data = array(
            'dba_customers' => $this->fetch_request(),
            'customer_count' => $this->fetch_request_count()
                );
        $this->load->view('admin/customer/display/index', $data);
    }
    
    public function edit($customer_id) {
        if (isset($_POST['update'])) {
            $data = array();
            $data['name'] = xss_clean($_POST['name']);
            $data['address'] = xss_clean($_POST['address']);

            $this->customer_model->update($data, $customer_id);
            redirect('admin/customer/display');
        }
        
        $db_customer = $this->customer_model->find_by_id($customer_id);
        $this->load->view('admin/customer/edit/index', array('db_customer' => $db_customer));
    }
    
    public function delete($petID) {
        //confirmation
        if (isset($_POST['confirm']) && $_POST['confirm'] == 'yes') {
            $this->customer_model->delete($petID);
            redirect('admin/customer/display/');
        } else {
            $db_customer = $this->customer_model->find_by_id($petID);
            $vw_displaydata = array('customer' => $db_customer);
            $this->load->view('admin/customer/delete/index', $vw_displaydata);
        }
    }
    
    /**
     * view table
     */
    function get_table() {
        $this->set_request_data('customer');
        $vars = array(
            'dba_customers' => $this->fetch_request(),
            'customer_count' => $this->fetch_request_count()
        );
        $this->load->view('admin/customer/display/table', $vars);
    }
    
    protected function fetch_request() {
        return parent::fetch_request('customer', array('name', 'address'));
    }
    protected function fetch_request_count() {
        return parent::fetch_request_count('customer', array('name', 'address'));
    }
}