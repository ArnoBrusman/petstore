<?php
$includes = array();
$includes['js'] = array('jquery.js', 'fancybox/jquery.fancybox.js', 'jquery-ui-1.10.4.custom.js', 'jquery-ui-groupsearch.js', 'petstore_admin.js');
$includes['css'] = array('jquery-ui-1.10.4.custom.min.css', 'fancybox/jquery.fancybox.css');
$this->load->view('admin/inc/head', $includes);
?>
<div class="wrapper admin">
    <?php
    $vwd_crumb_data = array();
    $vwd_crumb_data['crumbs'] = array(
        array('title' => 'pages', 'uri' => 'page/display'),
    );
    $this->load->view('admin/inc/breadcrumb', $vwd_crumb_data);
    ?>
    <div class="display_table" js_table="page">
            <?php
            $this->load->view('admin/page/display/table');
            ?>
    </div>
</div>
<?php
$this->load->view('admin/inc/foot');

