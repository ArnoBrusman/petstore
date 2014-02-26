<?php
$includes = array();
$includes['js'] = array('jquery.js', 'fancybox/jquery.fancybox.js', 'jquery-ui-1.10.4.custom.js','jquery-ui-groupsearch.js', 'petstore_admin.js');
$includes['css'] = array('jquery-ui-1.10.4.custom.min.css', 'fancybox/jquery.fancybox.css');
$this->load->view('admin/inc/head', $includes);
?>
<div class="wrapper admin">
    
    <?php
    $vwd_crumb_data = array();
    $vwd_crumb_data['crumbs'] = array(
        array('title' => 'order', 'uri' => 'order/display'),
    );
    $this->load->view('admin/inc/breadcrumb', $vwd_crumb_data);
    ?>
    <form action="" id="ordersearch" method="POST">
        search: <input name="search" type="text" class='term'/>
        <input type="hidden" value="" name="field" class="field" />
        <input type="submit" value="Search" />
    </form>
    <div class="display_table" js_table="order">
        <?php
            $this->load->view('admin/order/display/table');
        ?>
    </div>
</div>
<?php
$this->load->view('admin/inc/foot');

