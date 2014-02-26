<?php
//  <link rel="stylesheet" href="<?php echo base_url(); assets/css/bootstrap.min.css" 
//  <link rel="stylesheet" href="<?php echo base_url(); assets/css/bootstrap-responsive.min.css">
//  
//  <!--<script type="text/javascript" src="////assets/js/bootstrap.min.js"></script>-->
$includes = array(
    'js' => array('jquery.js', 'jquery-ui-1.10.4.custom.min.js', 'swfobject.js', 'jquery.uploadify.v2.1.4.min.js',
        'fancybox/jquery.fancybox.js', 'petstore_admin.js', 'jqtinymce/tinymce.min.js', 'jqtinymce/jquery.tinymce.min.js'),
    'css' => array('main.css', 'uploadify.css', 'fancybox/jquery.fancybox.css'),
    'less' => array('bootstrap.min.less', 'bootstrap-responsive.min.less')
);
$this->load->view('admin/inc/head', $includes);


$images = array();
?>
<script type="text/javascript" src='assets/js/bootstrap.min.js'></script>
<div class="wrapper admin">

    <?php
    $vwd_crumb_data = array();
    $vwd_crumb_data['crumbs'] = array(
        array('title' => 'customer', 'uri' => 'customer/display'),
        array('title' => 'edit customer: ' . $db_customer->name, 'uri' => 'edit/' . $db_customer->id)
    );
    $this->load->view('admin/inc/breadcrumb', $vwd_crumb_data);
    ?>
    <form action="" id="form_pet_data" method="POST">
        <div class="pet_data">
            <div class="row">
                <div class="col1">name:</div>
                <div class="col2"><div class="value_display"><?php echo $db_customer->name ?></div><input type="text" hidden="" name="name" class="value_input" value="<?php echo $db_customer->name ?>" /></div>
                <div class="col3"><a class="edit_row" href=""><img src="assets/images/icons/Pencil.png" alt="" /></a><a class="save_row" hidden="" href="" aiotitle="" aiotarget="false"><img alt="" src="assets/images/icons/save.png"></a></div>
            </div>
            <div class="row">
                <div class="col1">info:</div>
                <div class="col2"><textarea name="address" class="value_input"><?php echo $db_customer->address ?></textarea></div>
                <div class="col3"></div>
            </div>
        </div>

        <input type="hidden" name="update" value="update" />
        <a href="" class="button submit">update customer</a>

    </form>
</div>
<?php
$this->load->view('admin/inc/foot');
