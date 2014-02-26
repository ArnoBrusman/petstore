<?php

class Order extends MY_Controller {
    
    public $security_lvl_needed = 1;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('order_model');
    }
    
    public function index()
    {
        $this->load->view('admin/order/index');
    }
    
    public function display()
    {
        $this->set_request_data('order');
        $data = array(
            'dba_orders' => $this->fetch_request(),
            'status_codes' => $this->get_status_codes(),
            'order_count' => $this->fetch_request_count()
        );
        $this->load->view('admin/order/display/index', $data);
    }
    
    public function change_status($order_id) {
        if (isset($_POST['update'])) {
            $status = xss_clean($_POST['status']);
            $this->order_model->update(array('status' => $status), $order_id);
            redirect('admin/order/display');
        } else {
            $data = array(
                'status_codes' => $this->get_status_codes(),
                'db_order' => $this->order_model->find_by_id($order_id)
            );
            $this->load->view('admin/order/change_status/index', $data);
        }
        
    }
    
    public function delete($orderID) {
        //confirmation
        if (isset($_POST['confirm']) && $_POST['confirm'] == 'yes') {
            $this->order_model->delete($orderID);
            redirect('admin/order/display');
        } else {
            $order = $this->order_model->find_by_id($orderID);
            $vw_displaydata = array('order' => $order);
            $this->load->view('admin/order/delete/index', $vw_displaydata);
        }
    }
    
    /**
     * view table
     */
    function get_table() {
        $this->set_request_data('order');
        $vars = array(
            'dba_orders' => $this->fetch_request(),
            'status_codes' => $this->get_status_codes(),
            'order_count' => $this->fetch_request_count()
        );
        $this->load->view('admin/order/display/table', $vars);
    }
    
    protected function get_status_codes() {
        return $status_codes = array(
            1 => 'ordered',
            2 => 'processing order',
            3 => 'waiting payment',
            9 => 'order sent',
            10 => 'order completed',
        );
    }
    
    protected function fetch_request() {
        return parent::fetch_request('order', array('pet.name', 'pet.species', 'pet.race', 'customer.name'));
    }
    protected function fetch_request_count() {
        return parent::fetch_request_count('order', array('pet.name', 'pet.species', 'pet.race', 'customer.name'));
    }
}