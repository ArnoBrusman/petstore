<?php

class Menu {

    public $name = 'menu';
    public $items = array();
    public $menu_view = 'menu/menu';
    public $item_view = 'menu/item';
    public $load;
    
    public function __construct($name = 'menu') {
        $this->name = $name;
        $this->load =& load_class('Loader', 'core');
    }

    /*
     * add a menu item
     */
    public function insert_item($name, $url) {
        $this->items[$name] = new Menu_item($name, $url);
    }

    /**
     * add a subitem to a menu item
     * @param string $item_name 
     * name of the menu item you want to add a subitem to
     * @param mixed $subitem
     * 
     */
    public function insert_subitem($item_name, $subitem) {
        $this->items[$item_name]->insert_subitem($subitem);
    }
    
    /*
     * set the path
     */
    public function set_menu_view($view_name) {
        $this->menu_view = $view_name;
    }
    public function set_item_view($view_name) {
        $this->menu_view = $view_name;
    }
    
    public function view() {
        echo $this->get_view();
    }

    public function get_view() {
        $subitems = array();
        
        $this->load->helper('firephp');
        foreach ($this->items as $v_item) {
            $subsubitems = array();
            foreach ($v_item->subitems as $v_subitem) {
                if(method_exists($v_subitem, 'get_view')) {
                    $subsubitems[] = $v_subitem->get_view();
                } elseif(method_exists($v_subitem, 'parse')) {
                    $subsubitems[] = $v_subitem->parse();
                } else {
                    $subsubitems[] = $v_subitem;
                }
            }
            $data = array('name' => $v_item->name, 'url' => $v_item->url, 'subitems' => $subsubitems);
            $subitems[] = $this->load->view($this->item_view, $data, true);
        }
        $data = array('name' => $this->name, 'subitems' => $subitems);
        $vw_Menu = $this->load->view($this->menu_view, $data, true);
        return $vw_Menu;
    }

}

class Menu_item {

    public $name;
    public $url;
    public $subitems = array();

    function __construct($name, $url) {
        $this->name = $name;
        $this->url = $url;
    }

    function insert_subitem($subitem) {
        $this->subitems[] = $subitem;
    }

    function set_subitems($items) {
        $this->subitems = array_merge($this->subitems, $items);
    }

}
