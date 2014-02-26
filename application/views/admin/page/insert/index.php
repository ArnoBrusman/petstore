<?php
$js = array('jquery.js', 'fancybox/jquery.fancybox.js', 'jqtinymce/tinymce.min.js', 'jquery.validationEngine.js', 'languages/jquery.validationEngine-en.js', 'jqtinymce/jquery.tinymce.min.js', 'petstore_admin.js');
$css = array('fancybox/jquery.fancybox.css', 'validationEngine.jquery.css');
$data = array('js' => $js, 'css' => $css);
$this->load->view('admin/inc/head', $data);
?>
<!--<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>-->


<div class="wrapper admin">
    <?php
    $vwd_crumb_data = array();
    $vwd_crumb_data['crumbs'] = array(
        array('title' => 'insert page', 'uri' => 'insert')
    );
    $this->load->view('admin/inc/breadcrumb', $vwd_crumb_data);
    ?>
    <div>
        <form action="" class="validation_form" method="POST">
            <div class="form_errors"><?php echo validation_errors(); ?></div>

            <div class="row">
                <div class="input">
                    <label for="">title</label>
                    <input name="title" class="validate[required]" type="input" />
                </div>
            </div>
            <div>
                <div class="input">
                    <label for="">content:</label>
                    <textarea name="content" class="tinymce" cols="30" rows="10"></textarea>
                </div>
            </div>
            <input name="add_page" value="add page" type="submit" />
        </form>
    </div>
</div>
<?php
$this->load->view('admin/inc/foot');
