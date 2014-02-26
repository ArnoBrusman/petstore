<?php

/**
 * Order controller
 *
 * @author Brusman
 */
class order extends MY_Controller {

    public $view_data;

    function __construct() {
        parent::__construct();
        $this->load->model('page_model');
        $this->view_data['pages'] = $this->page_model->fetch();

        $this->load->model('Pet_model');
        $this->load->library('Basket');
    }

    function checkout() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        if (isset($_POST['checkout'])) {
            $rules = array(
                array(
                    'field' => 'name',
                    'label' => 'name',
                    'rules' => 'required|max_length[255]',
                ),
                array(
                    'field' => 'address',
                    'label' => 'order info',
                    'rules' => 'required',
                )
            );
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() === TRUE) {
                $customer_data = array(
                    'name' => xss_clean($_POST['name']),
                    'address' => xss_clean($_POST['address'])
                );

                $this->basket->order_all($customer_data);
                redirect('/');
            }
        }

        $this->load->view('order/checkout', $this->view_data);
    }

    function basket() {
        if (isset($_POST['clean']) && $_POST['clean'] === 'yes') {
            $this->basket->clean();
        }
        $this->view_data['basket'] = $this->basket->get_pets();
        $this->load->view('order/basket', $this->view_data);
    }

    /**
     * add pet to party
     */
    function add_pet() {
        if (isset($_REQUEST['add_pet'])) {
            $success = $this->basket->add_pet(xss_clean($_REQUEST['add_pet']));
        }
    }

}
