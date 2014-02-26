<?php

$this->load->library('Menu');

$Menu = new Menu('first_layer');
$Menu->insert_item('Home', '');
$Menu->insert_item('Pets', 'pets');
foreach ($pages as $vdb_page) {
    $Menu->insert_item($vdb_page->menu_title, 'page/' . $vdb_page->uri);
}
$Menu->view();
//        $Pets_menu = new Menu('second_layer');
//        $Pets_menu->insert_item('display', 'display');
//        $Pets_menu->insert_item('add pet', 'insert');
//        $Menu->insert_subitem('Pets', $Pets_menu);
//        $Menu->insert_item('Pages', 'pages');
//        $Menu->insert_item('Users', 'users');