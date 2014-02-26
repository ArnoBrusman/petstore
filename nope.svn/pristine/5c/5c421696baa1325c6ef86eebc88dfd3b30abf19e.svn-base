<?php

$this->load->library('Menu');

$Menu = new Menu('first_layer');
$Menu->insert_item('Pets', 'admin/pet/display');
$Pets_menu = new Menu('second_layer');
$Pets_menu->insert_item('display', 'admin/pet/display');
$Pets_menu->insert_item('add pet', 'admin/pet/insert');
$Menu->insert_subitem('Pets', $Pets_menu);
$Menu->insert_item('Pages', 'admin/page/display');
$Pages_menu = new Menu('second_layer');
$Pages_menu->insert_item('display', 'admin/page/display');
$Pages_menu->insert_item('add page', 'admin/page/insert');
$Menu->insert_subitem('Pages', $Pages_menu);
$Menu->insert_item('Orders', 'admin/order/display');
$Menu->insert_item('Customers', 'admin/customer/display');
$Menu->insert_item('Users', 'admin/user/display');
$User_menu = new Menu('second_layer');
$User_menu->insert_item('display', 'admin/user/display');
$User_menu->insert_item('add user', 'admin/user/insert');
$Menu->insert_subitem('Users', $User_menu);
$Menu->view();