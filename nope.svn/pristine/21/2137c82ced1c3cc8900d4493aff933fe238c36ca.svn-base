<?php

/**
 * admin controller
 */

class _default extends MY_Controller {

    public $security_lvl_needed = 1;
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    
    public function index() {
        $data = array('content' => '');
        $this->load->model('Pet_model');
        $this->load->model('Order_model');
        $data['count_data'] = $this->Pet_model->get_count_data();
        
        $data['dba_species'] = $this->Pet_model->fetch_field('species');
        $data['dba_race'] = $this->Pet_model->fetch_field(array('race','species'));
        
        $order_total = $this->Order_model->count('order.id');
        $this->db->or_where_not_in('status', 10);
        $orders_processing = $this->Order_model->fetch();
        $orders_processing_count = count($orders_processing);
        $orders_processing_price = 0;
        foreach ($orders_processing as $v_order) {
            $orders_processing_price = $orders_processing_price + $v_order->price;
        }
        
        $this->db->where('status', 10);
        $orders_completed = $this->Order_model->fetch();
        $orders_completed_count = count($orders_completed);
        $orders_completed_price = 0;
        foreach ($orders_completed as $v_order) {
            $orders_completed_price = $orders_completed_price + $v_order->price;
        }
        $data['order_data'] = array(
            'total' => $order_total,
            'processing' => $orders_processing_count,
            'processing_price' => $orders_processing_price,
            'completed' => $orders_completed_count,
            'completed_price' => $orders_completed_price
                );

        $this->load->view('admin/index', $data);
    }
    
//    public function gallery() {
//        include '\application\third_party\GalleryCMS\index.php';
//    }
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */