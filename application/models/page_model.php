<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pagesmodel
 *
 * @author Brusman
 */
class Page_model extends MY_Model {
    public $table_name = 'page';
    
    public function fetch_by_uri($uri) {
        $this->db->where('uri', $uri);
        $page = $this->fetch();
        return empty($page) ? $page : $page[0];
//        $page2 = $this->db->get_where($this->table_name, array('uri' => $uri));
//        fb($page);
//        fb($page2->row());
    }
    
    public function create($data) {
        if(!isset($data['menu_title'])) {
            $data['menu_title'] = $data['title'];
        }
        if(!isset($data['uri'])) {
            $data['uri'] = url_title($data['title'], '-', TRUE);
        }
        $new_id = parent::create($data);
        return $new_id;
    }
}
