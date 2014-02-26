<?php

class Pet extends MY_Controller {

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
    public function __construct() {
        parent::__construct();
        $this->load->model('Pet_model');
    }

    public function insert() {
        $this->load->helper('form');
        if (!empty($_POST['name'])) {
            if ($this->validate_form() === TRUE) {
                $d_petdata['name'] = xss_clean($_POST['name']);
                $d_petdata['species'] = xss_clean($_POST['species']);
                $d_petdata['race'] = xss_clean($_POST['race']);
                $d_petdata['gender'] = xss_clean($_POST['gender']);
                $d_petdata['price'] = xss_clean($_POST['price']);
                $d_petdata['description'] = xss_clean($_POST['description']);
                $insert_id = $this->Pet_model->create($d_petdata);
                redirect("admin/pet/edit/" . $insert_id);
            }
        }
        $this->load->view('admin/pet/insert/index');
    }

    public function display() {
//        with search query
        $this->set_request_data('Pet');
        $vars = array(
            'pets' => $this->fetch_request(),
            'pet_count' => $this->fetch_request_count()
        );
        $this->load->view('admin/pet/display/index', $vars);
    }

    public function delete($petID) {
        //confirmation
        if (isset($_POST['confirm']) && $_POST['confirm'] == 'yes') {
            $this->Pet_model->delete($petID);
            redirect('admin/pet/display/');
        } else {
            $pet = $this->Pet_model->find_by_id($petID);
            $vw_displaydata = array('pet' => $pet);
            $this->load->view('admin/pet/delete/index', $vw_displaydata);
        }
    }

    public function edit($petID) {
        $this->load->helper('form');
        if (isset($_POST['update'])) {
            if ($this->validate_form() === TRUE) {

                $d_petdata = array();
                $d_petdata['name'] = $this->input->post('name');
                $d_petdata['species'] = $this->input->post('species');
                $d_petdata['race'] = $this->input->post('race');
                $d_petdata['gender'] = $this->input->post('gender');
                $d_petdata['price'] = $this->input->post('price');
                $d_petdata['description'] = $this->input->post('description');
                $d_petdata['content'] = $this->input->post('content');

                $this->Pet_model->update($d_petdata, $petID);
            }
        }

        $pet = $this->Pet_model->find_by_id($petID);

        $this->load->model('gallery/image_model');
        $images = $this->image_model->get_images_by_album_id($pet->album);

        $vw_displaydata = array('pet' => $pet, 'images' => $images);
        $this->load->view('admin/pet/edit/index', $vw_displaydata);
    }

    /**
     * view table
     */
    function get_table() {
        $this->set_request_data('Pet');
        $vars = array(
            'pets' => $this->fetch_request(),
            'pet_count' => $this->fetch_request_count()
        );
        $this->load->view('admin/pet/display/table', $vars);
    }

    protected function validate_form() {
        $this->load->library('form_validation');
        $rules = array(
            array(
                'field' => 'name',
                'label' => 'name',
                'rules' => 'required|max_length[255]'
            ),
            array(
                'field' => 'species',
                'label' => 'species',
                'rules' => 'required|max_length[255]'
            ),
            array(
                'field' => 'price',
                'label' => 'price',
                'rules' => 'required|numeric'
            )
        );
        $this->form_validation->set_rules($rules);
        return $this->form_validation->run();
    }

    protected function fetch_request() {
        return parent::fetch_request('Pet', array('name', 'species', 'race'));
    }
    protected function fetch_request_count() {
        return parent::fetch_request_count('Pet', array('name', 'species', 'race'));
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */