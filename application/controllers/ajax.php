<?php
class Ajax extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function show_album($album_id = 1) {
        $this->load->model('gallery/album_model');
        $this->load->model('gallery/image_model');
        $this->load->model('gallery/config_model');

        $data = array();
        $data['config']    = $this->config_model->get_by_album_id($album_id);
        $data['album']     = $this->album_model->find_by_id($album_id);
        $data['images']    = $this->image_model->get_images_by_album_id($album_id);
        
        $this->load->view('ajax/album/index', $data);
    }
    
    /**
     * get autocomplete data
     */
    public function get_ac_data() {
        $this->load->model('Pet_model');
        $this->load->model('customer_model');
        $haystack = func_get_args();
        $search_term = $this->input->get_post('term');
        
        if(array_search('is_store', $haystack)) {
            $is_store = TRUE;
        } else {
            $is_store = FALSE;
        }
        $search_results = array();
        
        if(array_search('pet_name', $haystack) !== FALSE) {
            $pet_name_results = $this->Pet_model->search_field_for_jqautoqcomplete('name', $search_term, $is_store);
            $search_results = array_merge($search_results, $pet_name_results);
        }
        if(array_search('species', $haystack) !== FALSE) {
            $species_results = $this->Pet_model->search_field_for_jqautoqcomplete('species', $search_term, $is_store);
            $search_results = array_merge($search_results, $species_results);
        }
        if(array_search('race', $haystack) !== FALSE) {
            $race_results = $this->Pet_model->search_field_for_jqautoqcomplete('race', $search_term, $is_store);
            $search_results = array_merge($search_results, $race_results);
        }
        if(array_search('customer', $haystack) !== FALSE) {
            $customer_name_results = $this->customer_model->search_field_for_jqautoqcomplete('name', $search_term);
            $search_results = array_merge($search_results, $customer_name_results);
        }
        if(array_search('address', $haystack) !== FALSE) {
            $customer_name_results = $this->customer_model->search_field_for_jqautoqcomplete('address', $search_term);
            $search_results = array_merge($search_results, $customer_name_results);
        }
        echo json_encode($search_results);
    }
    
    /**
     * get pets for jQuery autocomplete
     */
    public function get_pets() {
        $this->get_ac_data('species', 'race', 'pet_name');
    }
    
    /**
     * get pets for jQuery autocomplete
     */
    public function get_store_pets() {
        $this->get_ac_data('species', 'race', 'pet_name', 'is_store');
    }
    
    /**
     * get orders for jQuery autocomplete
     */
    public function get_orders() {
        $this->get_ac_data('species', 'race', 'pet_name', 'customer');
    }
    
    /**
     * get customers for jQuery autocomplete
     */
    public function get_customers() {
        $this->get_ac_data('customer', 'address');
    }
}