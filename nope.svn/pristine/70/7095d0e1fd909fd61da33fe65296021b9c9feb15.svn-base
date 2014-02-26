<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * Store Controller
 */
class _default extends MY_Controller {

    public $view_data = array();

    public function __construct() {
        parent::__construct();
        $this->load->model('page_model');
        $this->view_data['pages'] = $this->page_model->fetch();
    }

    public function index() {
        $this->load->model('Pet_model');
        $this->load->model('gallery/image_model');
        
        $pets = $this->Pet_model->get_available();
        shuffle($pets);
        $pets = array_slice($pets, 0, 3);
        
        $pets_first_picture = $this->Pet_model->get_first_pictures();
        $this->view_data['pets'] = $pets;
        $this->view_data['pets_first_picture'] = $pets_first_picture;
        $this->view_data['meta_title'] = 'Petshop of Noah';

        $this->load->view('store/index', $this->view_data);
    }

    public function pets() {
        $this->load->model('Pet_model');
        $this->load->model('gallery/image_model');
        
//        with search query
        if(isset($_POST['search'])) {
            $search_term = $this->input->post('search');
            $search_field = $this->input->post('field');
            if($search_field){
                $this->db->like($search_field, $search_term);
            } else {
                $fields = array('name', 'species', 'race');
                foreach ($fields as $v_field) {
                    $this->db->or_like($v_field, $search_term);
                }
            }
        }
        
        $pets = $this->Pet_model->get_available();
        $pets_first_picture = $this->Pet_model->get_first_pictures();
        $this->view_data['pets'] = $pets;
        $this->view_data['pets_first_picture'] = $pets_first_picture;
        $this->view_data['meta_title'] = 'Pets | Petshop of Noah';

        $this->load->view('store/index', $this->view_data);
    }

    public function pet($pet_id) {
        $this->load->model('Pet_model');
        $db_pet = $this->Pet_model->find_by_id($pet_id);
        $this->view_data['db_pet'] = $db_pet;
        $pictures = $this->Pet_model->get_images_by_id($pet_id);
        $this->view_data['dba_pictures'] = $pictures;
        $this->view_data['meta_title'] = $db_pet->name . ' | Pets | Petshop of Noah';
        $this->load->view('store/pet/index', $this->view_data);
    }

    public function page($page_uri) {
        $page = $this->page_model->fetch_by_uri($page_uri);
        $this->view_data['page'] = $page;
        $this->view_data['meta_title'] = $page->title . ' | Petshop of Noah';
        $this->load->view('store/page/index', $this->view_data);
    }
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */