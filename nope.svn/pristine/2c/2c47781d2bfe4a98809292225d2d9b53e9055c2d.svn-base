<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Copyright (c) 2012, Aaron Benson - GalleryCMS - http://www.gallerycms.com
 * 
 * GalleryCMS is a free software application built on the CodeIgniter framework. 
 * The GalleryCMS application is licensed under the MIT License.
 * The CodeIgniter framework is licensed separately.
 * The CodeIgniter framework license is packaged in this application (license.txt) 
 * or read http://codeigniter.com/user_guide/license.html
 * 
 * Permission is hereby granted, free of charge, to any person
 * obtaining a copy of this software and associated documentation
 * files (the "Software"), to deal in the Software without
 * restriction, including without limitation the rights to use,
 * copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the
 * Software is furnished to do so, subject to the following
 * conditions:
 * 
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
 * OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
 * HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
 * WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
 * OTHER DEALINGS IN THE SOFTWARE.
 * 
 */
class MY_Controller extends CI_Controller {

    public $security_lvl_needed = 0;

    public function __construct() {
        date_default_timezone_set('Europe/Amsterdam');
        parent::__construct();
        $this->load->library('current_user');

        if ($this->security_lvl_needed > $this->current_user->get_security_lvl()) {
            redirect('admin/authentication');
        }
    }

    /**
     * Utility method for creating UUIDs.
     * 
     * @return type 
     */
    protected function create_uuid() {
        $uuid_query = $this->db->query('SELECT UUID()');
        $uuid_rs = $uuid_query->result_array();
        return $uuid_rs[0]['UUID()'];
    }

    /**
     * Utility method for sending emails.
     * 
     * @param type $to
     * @param type $subject
     * @param type $message 
     */
    protected function send_mail($to, $subject, $message) {
        $this->load->library('email');
        $this->email->from($this->config->item('from_email_address'));
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
    }

    /**
     * Utility method for determining if the request is a POST.
     * 
     * @return type 
     */
    protected function is_method_post() {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }
    
    protected function set_request_data($model_name) {
        //keep session data if requested
        if (!isset($_REQUEST['keep_data'])) {
            $this->session->unset_userdata('table');
        }
        $this->set_search_data($model_name);
        $this->set_order_data($model_name);
        $this->set_limit_data($model_name);
    }

    /**
     * 
     * fetch data from the model with request data from user, previously set with the set_request_data function. Considers search & order requests data.
     * @param type $model_name
     * name of the model (without the '_model')
     * @param array $fields
     * if searchable: fields that can be searched in.
     * @return array
     */
    protected function fetch_request($model_name, $fields = FALSE) {
        $model_name_full = $model_name . '_model';
        if ($fields !== FALSE) {
            $search_fields = $this->get_search_data($fields, $model_name);
        }
        $order_data = $this->get_order_data($model_name);
        $limit_data = $this->get_limit_data($model_name);

        if (!empty($order_data['order'])) {
            $this->db->order_by($order_data['order'], $order_data['direction']);
        }
        if(!empty($limit_data['limit'])) {
            $this->db->limit($limit_data['limit'], $limit_data['limit'] * ($limit_data['page'] - 1));
        }
        if (isset($search_fields)) {
            $this->db->or_like($search_fields);
        }
        return $this->$model_name_full->fetch();
    }

    protected function fetch_request_count($model_name, $fields = FALSE) {
        $model_name_full = $model_name . '_model';
        if ($fields !== FALSE) {
            $search_fields = $this->get_search_data($fields, $model_name);
        }
        $order_data = $this->get_order_data($model_name);
        if (!empty($order_data['order'])) {
            $this->db->order_by($order_data['order'], $order_data['direction']);
        }
        if (isset($search_fields)) {
            $this->db->or_like($search_fields);
        }
        return $this->$model_name_full->count();
    }

    protected function set_search_data($model_name) {
        $session_data = $this->session->userdata('table');
        if (isset($_REQUEST['search'])) {
            $search_term = $this->input->get_post('search');
            if (isset($_REQUEST['field'])) {
                $search_field = $this->input->get_post('field');
            } else {
                $search_field = '';
            }
        } else {
            if (isset($session_data[$model_name]['term'])) {
                $search_term = $session_data[$model_name]['term'];
                $search_field = $session_data[$model_name]['field'];
            } else {
                $search_term = '';
                $search_field = '';
            }
        }
        $session_data[$model_name]['term'] = $search_term;
        $session_data[$model_name]['field'] = $search_field;
        $this->session->set_userdata(array('table' => $session_data));
    }

    protected function get_search_data($fields, $model_name) {
        $session_data = $this->session->userdata('table');
        $search_field = $session_data[$model_name]['field'];
        $search_term = $session_data[$model_name]['term'];
        if (!empty($search_field)) {
            $search_fields = array($search_field => $search_term);
        } elseif (!empty($search_term)) {
            $search_fields = array();
            foreach ($fields as $v_field) {
                $search_fields[$v_field] = $search_term;
            }
        } else {
            $search_fields = array();
        }
        return $search_fields;
    }

    protected function set_order_data($model_name) {
        $session_data = $this->session->userdata('table');
        if (isset($_REQUEST['order'])) {
            $order = $this->input->get_post('order');
            if ((isset($session_data[$model_name]['direction']) && $session_data[$model_name]['order'] === $order && $session_data[$model_name]['direction'] === 'ASC') || $this->input->get_post('direction') === 'DESC') {
                $direction = 'DESC';
            } else {
                $direction = 'ASC';
            }
        } else {
            if (isset($session_data[$model_name]['order'])) {
                $order = $session_data[$model_name]['order'];
                $direction = $session_data[$model_name]['direction'];
            } else {
                $order = '';
                $direction = '';
            }
        }
        $session_data[$model_name]['direction'] = $direction;
        $session_data[$model_name]['order'] = $order;
        $this->session->set_userdata(array('table' => $session_data));
    }
    
    protected function get_order_data($model_name) {
        $session_data = $this->session->userdata('table');
        $order = $session_data[$model_name]['order'];
        $direction = $session_data[$model_name]['direction'];
        if (!empty($order)) {
            return array('order' => $order, 'direction' => $direction);
        } else {
            return FALSE;
        }
    }

    protected function set_limit_data($model_name) {
        $session_data = $this->session->userdata('table');
        $default_page_limit = 10;
        if (isset($_REQUEST['limit'])) {
            $limit = $this->input->get_post('limit');
        } else {
            if (isset($session_data[$model_name]['limit'])) {
                $limit = $session_data[$model_name]['limit'];
            } else {
                $limit = $default_page_limit;
            }
        }
        if (isset($_REQUEST['page'])) {
            $page = $this->input->get_post('page');
        } else {
            if (isset($session_data[$model_name]['page'])) {
                $page = $session_data[$model_name]['page'];
            } else {
                $page = 1;
            }
        }
        $session_data[$model_name]['limit'] = $limit;
        $session_data[$model_name]['page'] = $page;
        $this->session->set_userdata(array('table' => $session_data));
    }
    
    protected function get_limit_data($model_name) {
        $session_data = $this->session->userdata('table');
        return array('limit' => $session_data[$model_name]['limit'], 'page' => $session_data[$model_name]['page']);
    }

}
