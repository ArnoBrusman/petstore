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
?>
<script type="text/javascript" src='assets/js/bootstrap.min.js'></script>
<div class="wrapper admin">

    <?php
    $vwd_crumb_data = array();
    $vwd_crumb_data['crumbs'] = array(
        array('title' => 'pets', 'uri' => 'pet/display'),
        array('title' => $pet->id, 'uri' => 'edit/' . $pet->id)
    );
    $this->load->view('admin/inc/breadcrumb', $vwd_crumb_data);
    ?>
    <form action="" class="validation_form" id="form_pet_data" method="POST">
        <div class="form_errors"><?php echo validation_errors(); ?></div>
        <div class="pet_data">
            <div class="row">
                <div class="col1">name:</div>
                <div class="col2"><div class="value_display"><?php echo $pet->name ?></div><input type="text" hidden="" name="name" class="value_input validate[required,maxSize[255]]" value="<?php echo $pet->name ?>" /></div>
                <div class="col3"><a class="edit_row" href=""><img src="assets/images/icons/Pencil.png" alt="" /></a><a class="save_row" hidden="" href="" aiotitle="" aiotarget="false"><img alt="" src="assets/images/icons/save.png"></a></div>
            </div>
            <div class="row">
                <div class="col1">species:</div>
                <div class="col2"><div class="value_display"><?php echo $pet->species ?></div><input type="text" hidden="" name="species" class="value_input validate[required,maxSize[255]]" value="<?php echo $pet->species ?>" /></div>
                <div class="col3"><a class="edit_row" href=""><img src="assets/images/icons/Pencil.png" alt="" /></a><a class="save_row" hidden="" href="" aiotitle="" aiotarget="false"><img alt="" src="assets/images/icons/save.png"></a></div>
            </div>
            <div class="row">
                <div class="col1">race:</div>
                <div class="col2"><div class="value_display"><?php echo $pet->race ?></div><input type="text" hidden="" name="race" class="value_input" value="<?php echo $pet->race ?>" /></div>
                <div class="col3"><a class="edit_row" href=""><img src="assets/images/icons/Pencil.png" alt="" /></a><a class="save_row" hidden="" href="" aiotitle="" aiotarget="false"><img alt="" src="assets/images/icons/save.png"></a></div>
            </div>
            <div class="row">
                <div class="col1">gender:</div>
                <div class="col2">
                    <?php
                    $gender = $pet->gender == 0 ? 'male' : 'female';
                    $male = $pet->gender == 0 ? 'selected' : '';
                    $female = $pet->gender == 1 ? 'selected' : '';
                    ?>
                    <!--<div class="value_display"><?php echo $gender ?></div>-->
                    <select name="gender">
                        <option value="0" <?php echo $male ?> >male</option>
                        <option value="1" <?php echo $female ?>>female</option>
                    </select>
                </div>
                <div class="col3">
                    <!--<a class="edit_row" href=""><img src="assets/images/icons/Pencil.png" alt="" /></a><a class="save_row" hidden="" href="" aiotitle="" aiotarget="false"><img alt="" src="assets/images/icons/save.png"></a>-->
                </div>
            </div>
            <div class="row">
                <div class="col1">price:</div>
                <div class="col2"><div class="value_display"><?php echo $pet->price ?></div><input type="text" hidden="" name="price" class="value_input validate[required,custom[number],maxSize[12]]" value="<?php echo $pet->price ?>" /></div>
                <div class="col3"><a class="edit_row" href=""><img src="assets/images/icons/Pencil.png" alt="" /></a><a class="save_row" hidden="" href="" aiotitle="" aiotarget="false"><img alt="" src="assets/images/icons/save.png"></a></div>
            </div>
            <div class="row">
                <div class="col1">description:</div>
                <div class="col2"><div class="value_display"><?php echo $pet->description ?></div><textarea hidden="" name="description" class="value_input"><?php echo $pet->description ?></textarea></div>
                <div class="col3"><a class="edit_row" href=""><img src="assets/images/icons/Pencil.png" alt="" /></a><a class="save_row" hidden="" href="" aiotitle="" aiotarget="false"><img alt="" src="assets/images/icons/save.png"></a></div>
                <div class="col3"></div>
            </div>
            <div class="row">
                <div class="col1">content:</div>
                <div class="col2"><textarea hidden="" name="content" class="value_input tinymce"><?php echo $pet->content ?></textarea></div>
                <div class="col3"></div>
            </div>
            <div class="row">
                <div class="col1">images:</div>
                <div class="col2"><div class="value_display">
                        <?php
                        $i = 0;
                        foreach ($images as $v_image) {
                            if ($i > 4) {
                                echo '...';
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
            </div>
        </div>
        
        <input type="hidden" name="update" value="update" />
        <a href="" class="button submit">update pet</a>
        
    </form>
</div>
<?php
$this->load->view('admin/inc/foot');
