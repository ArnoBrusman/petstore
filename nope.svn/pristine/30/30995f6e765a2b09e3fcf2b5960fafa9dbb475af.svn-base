<?php
$includes['css'] = array('validationEngine.jquery.css');
$includes['js'] = array('jquery.js', 'jquery.validationEngine.js', 'languages/jquery.validationEngine-en.js', 'petstore_admin.js');
$this->load->view('admin/inc/head', $includes);
?>
<div class="wrapper admin">
    <?php
    $vwd_crumb_data = array();
    $vwd_crumb_data['crumbs'] = array(
        array('title' => 'display users', 'uri' => 'user/display'),
        array('title' => 'add user', 'uri' => 'insert')
    );
    $this->load->view('admin/inc/breadcrumb', $vwd_crumb_data);
    ?>
    <form action="" class="validation_form" method="POST">
        <div class="form_errors"><?php echo validation_errors(); ?></div>
        <div class="input_data">
            <div class="row">
                <div class="label"><label for="">username</label></div>
                <div class="input"><input type="text" name="username" class="validate[required,maxSize[255]]" value="<?php echo set_value('username') ?>" /></div>
            </div>

            <div class="row">
                <div class="label"><label for="">password</label></div>
                <div class="input"><input type="text" name="password" class="validate[required,maxSize[255]]" value="<?php echo set_value('password') ?>" /></div>
            </div>
            <div class="row">
                <input type="submit" value="insert user" />
            </div>
        </div>

    </form>
</div>
<?php
$this->load->view('admin/inc/foot');
