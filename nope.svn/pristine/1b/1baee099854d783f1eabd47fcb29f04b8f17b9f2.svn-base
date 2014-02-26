<?php
//  <link rel="stylesheet" href="<?php echo base_url(); assets/css/bootstrap.min.css" 
//  <link rel="stylesheet" href="<?php echo base_url(); assets/css/bootstrap-responsive.min.css">
//  
//  <!--<script type="text/javascript" src="////assets/js/bootstrap.min.js"></script>-->
$includes = array(
    'js' => array('jquery.js', 'jquery-ui-1.10.4.custom.min.js', 'swfobject.js', 'jquery.uploadify.v2.1.4.min.js',
        'fancybox/jquery.fancybox.js', 'jquery.validationEngine.js', 'languages/jquery.validationEngine-en.js',
        'petstore_admin.js', 'jqtinymce/tinymce.min.js', 'jqtinymce/jquery.tinymce.min.js'),
    'css' => array('main.css', 'validationEngine.jquery.css', 'uploadify.css', 'fancybox/jquery.fancybox.css'),
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
        array('title' => 'pages', 'uri' => 'page/display'),
        array('title' => 'edit page: ' . $db_page->title, 'uri' => 'edit/' . $db_page->id)
    );
    $this->load->view('admin/inc/breadcrumb', $vwd_crumb_data);
    ?>
    <form action="" class="validation_form" method="POST">
        <div class="form_errors"><?php echo validation_errors(); ?></div>
        <div class="pet_data">
            <div class="row">
                <div class="col1">title:</div>
                <div class="col2"><div class="value_display"><?php echo $db_page->title ?></div><input type="text" hidden="" name="title" class="value_input validate[required,maxSize[255]]" value="<?php echo $db_page->title ?>" /></div>
                <div class="col3"><a class="edit_row" href=""><img src="assets/images/icons/Pencil.png" alt="" /></a><a class="save_row" hidden="" href="" aiotitle="" aiotarget="false"><img alt="" src="assets/images/icons/save.png"></a></div>
            </div>
            <div class="advanced_options">
                <a class="advanced_show" href=""><span class="show_hide">show</span> advanced page options</a>
                <div class="hidden">
                    <div class="row">
                        <div class="col1">uri:</div>
                        <div class="col2"><div class="value_display"><?php echo $db_page->uri ?></div><input type="text" hidden="" name="uri" class="value_input validate[required,maxSize[255]]" value="<?php echo $db_page->uri ?>" /></div>
                        <div class="col3"><a class="edit_row" href=""><img src="assets/images/icons/Pencil.png" alt="" /></a><a class="save_row" hidden="" href="" aiotitle="" aiotarget="false"><img alt="" src="assets/images/icons/save.png"></a></div>
                    </div>
                    <div class="row">
                        <div class="col1">menu title:</div>
                        <div class="col2"><div class="value_display"><?php echo $db_page->menu_title ?></div><input type="text" hidden="" name="menu_title" class="value_input validate[required,maxSize[255]]" value="<?php echo $db_page->menu_title ?>" /></div>
                        <div class="col3"><a class="edit_row" href=""><img src="assets/images/icons/Pencil.png" alt="" /></a><a class="save_row" hidden="" href="" aiotitle="" aiotarget="false"><img alt="" src="assets/images/icons/save.png"></a></div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col1">content:</div>
                <div class="col2"><textarea name="content" class="value_input tinymce"><?php echo $db_page->content ?></textarea></div>
                <div class="col3"></div>
            </div>
            <!--            <div class="row">
                            <div class="col1">image:</div>
                            <div class="col2"><div class="value_display">
            <?php
            $i = 0;
            foreach ($images as $v_image) {
                if ($i > 2) {
                    break;
                }
                $first = $i > 0 ? '' : 'first';
                ?>
                                                    <a href="<?php echo base_url() . 'uploads/' . $v_image->file_name ?>" rel="gal1" class="fancy-img <?php echo $first ?>"><img src="<?php echo base_url() . 'uploads/' . $v_image->raw_name . '_thumb' . $v_image->file_ext ?>" alt="" /></a>
                <?php
                $i++;
            }
            ?>
                                
                                </div>
                            </div>
                            <div class="col3"><a class="edit_image fancybox.ajax" href="<?php echo base_url() ?>gallery/album/ajax_images/<?php echo $pet->album ?>"><img src="assets/images/icons/Pencil.png" alt="" /></a><a class="save_row" hidden="" href="" aiotitle="" aiotarget="false"><img alt="" src="assets/images/icons/save.png"></a></div>
                            <div class="col3"></div>
                        </div>-->
        </div>

        <input type="hidden" name="update" value="update" />
        <a href="" class="button submit">update page</a>

    </form>
</div>
<?php
$this->load->view('admin/inc/foot');
