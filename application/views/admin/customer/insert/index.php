<?php
$js = array('jquery.js', 'fancybox/jquery.fancybox.js', 'jqtinymce/tinymce.min.js', 'jqtinymce/jquery.tinymce.min.js', 'petstore_admin.js');
$css = array('fancybox/jquery.fancybox.css');
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
        <form action="" method="POST">

            <div class="row">
                <div class="input">
                    <label for="">title</label>
                    <input name="title" type="input" />
                </div>
            </div>
            <!--            <div class="row">
                            <div class="input">
                                <label for=""></label>
                                <input type="" />
                            </div>
                        </div>-->
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