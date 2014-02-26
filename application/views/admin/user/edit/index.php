<?php
//  <link rel="stylesheet" href="<?php echo base_url(); assets/css/bootstrap.min.css" 
//  <link rel="stylesheet" href="<?php echo base_url(); assets/css/bootstrap-responsive.min.css">
//  
//  <!--<script type="text/javascript" src="////assets/js/bootstrap.min.js"></script>-->
$includes = array(
    'js' => array('jquery.js', 'jquery-ui-1.10.4.custom.min.js', 'swfobject.js', 'jquery.uploadify.v2.1.4.min.js',
        'fancybox/jquery.fancybox.js', 'jquery.validationEngine.js', 'languages/jquery.validationEngine-en.js', 'petstore_admin.js', 'jqtinymce/tinymce.min.js', 'jqtinymce/jquery.tinymce.min.js'),
    'css' => array('main.css', 'uploadify.css', 'fancybox/jquery.fancybox.css', 'validationEngine.jquery.css'),
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
        array('title' => 'user', 'uri' => 'user/display'),
        array('title' => 'edit user: ' . $db_user->username, 'uri' => 'edit/' . $db_user->id)
    );
    $this->load->view('admin/inc/breadcrumb', $vwd_crumb_data);
    ?>
    <form action="" id="form_pet_data" class="validation_form" method="POST">
        <div class="form_errors"><?php echo validation_errors(); ?></div>
        <div class="pet_data">
            <div class="row">
                <div class="col1">username:</div>
                <div class="col2"><div class="value_display"><?php echo $db_user->username ?></div><input type="text" hidden="" name="username" class="value_input validate[required,maxSize[255]]" value="<?php echo $db_user->username ?>" /></div>
                <div class="col3"><a class="edit_row" href=""><img src="assets/images/icons/Pencil.png" alt="" /></a><a class="save_row" hidden="" href="" aiotitle="" aiotarget="false"><img alt="" src="assets/images/icons/save.png"></a></div>
            </div>
            <div class="row">
                <div class="col1">password:</div>
                <div class="col2"><input name="password" type="password" class="value_input validate[required,maxSize[255]]" value=""/></div>
                <div class="col3"></div>
            </div>
        </div>

        <input type="hidden" name="update" value="update" />
        <a href="" class="button submit">update user</a>

    </form>
</div>
<?php
$this->load->view('admin/inc/foot');
