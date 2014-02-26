<?php

class Page extends MY_Controller {

    public $security_lvl_needed = 1;

    public function __construct() {
        parent::__construct();
        $this->load->model('page_model');
    }

    public function index() {
        $this->load->view('admin/page/index');
    }

    public function display() {
        $this->set_request_data('page');
        $vars = array(
            'pages' => $this->fetch_request(),
            'pages_count' => $this->fetch_request_count()
        );
        $this->load->view('admin/page/display/index', $vars);
    }

    public function insert() {
        $this->load->helper('form');
        if (isset($_POST['add_page'])) {
            if ($this->validate_form() === TRUE) {
                $page_data = array();
                $page_data['title'] = $this->input->post('title');
                $page_data['content'] = $this->input->post('content');
                $page_id = $this->page_model->create($page_data);
                redirect("admin/page/edit/" . $page_id);
            }
        }
        $this->load->view('admin/page/insert/index');
    }

    public function edit($page_id) {
        $this->load->helper('form');
        if (isset($_POST['update'])) {
            if ($this->validate_form() === TRUE) {
                $d_petdata = array();
                $d_petdata['title'] = $this->input->post('title');
                $d_petdata['content'] = $this->input->post('content');

                $d_petdata['menu_title'] = $this->input->post('menu_title');
                $d_petdata['uri'] = $this->input->post('uri');

                $this->page_model->update($d_petdata, $page_id);
            }
        }

        $db_page = $this->page_model->find_by_id($page_id);
        $this->load->view('admin/page/edit/index', array('db_page' => $db_page));
    }

    public function delete($page_id) {
        //confirmation
        if (isset($_POST['confirm']) && $_POST['confirm'] == 'yes') {
            $this->page_model->delete($page_id);
            redirect('admin/page/display/');
        } else {
            $page = $this->page_model->find_by_id($page_id);
            $vw_displaydata = array('page' => $page);
            $this->load->view('admin/page/delete/index', $vw_displaydata);
        }
    }
    
    /**
     * view table
     */
    function get_table() {
        $this->set_request_data('page');
        $vars = array(
            'pages' => $this->fetch_request(),
            'pages_count' => $this->fetch_request_count()
        );
        $this->load->view('admin/page/display/table', $vars);
    }

    protected function validate_form() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'title', 'required|max_length[255]');
        if($this->input->post('menu_title') !== FALSE) {
            $this->form_validation->set_rules('menu_title', 'menu title', 'required|max_length[255]');
        }
        if($this->input->post('uri') !== FALSE) {
            $this->form_validation->set_rules('uri', 'uri', 'required|max_length[255]');
        }
        return $this->form_validation->run();
    }

    protected function fetch_request() {
        return parent::fetch_request('page');
    }
    protected function fetch_request_count() {
        return parent::fetch_request_count('page');
    }
    
}
