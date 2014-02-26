<?php
$includes['css'] = array('validationEngine.jquery.css', 'jquery-ui-1.10.4.custom.css');
$includes['js'] = array('jquery.js', 'jquery-ui-1.10.4.custom.js', 'jquery.validationEngine.js', 'languages/jquery.validationEngine-en.js', 'petstore_admin.js');
$this->load->view('admin/inc/head', $includes);
?>
<div class="wrapper admin">
    <?php
    $vwd_crumb_data = array();
    $vwd_crumb_data['crumbs'] = array(
        array('title' => 'add pet', 'uri' => 'insert')
    );
    $this->load->view('admin/inc/breadcrumb', $vwd_crumb_data);
    ?>
    <form action="" class="validation_form" method="POST">
        <div class="form_errors"><?php echo validation_errors(); ?></div>
        <div class="input_data">
            <div class="row">
                <div class="label"><label for="">name</label></div>
                <div class="input"><input type="input" name="name" class="validate[required,maxSize[255]]" value="<?php echo set_value('name') ?>" /></div>
            </div>

            <div class="row">
                <div class="label"><label for="">species</label></div>
                <div class="input"><input type="input" name="species" class="search_species validate[required,maxSize[255]]" value="<?php echo set_value('species') ?>" /></div>
            </div>

            <div class="row">
                <div class="label"><label for="">race</label></div>
                <div class="input"><input type="input" name="race" class="search_race" value="<?php echo set_value('race') ?>" /></div>
            </div>

            <div class="row">
                <div class="label"><label for="">gender</label></div>
                <div class="input">
                    <select name="gender">
                        <option value="0">male</option>
                        <option value="1">female</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="label"><label for="">price</label></div>
                <div class="input"><input type="input" name="price" class="validate[required,custom[number],maxSize[12]]" value="<?php echo set_value('price') ?>" /></div>
            </div>
            <div class="row">
                <div class="label"><label for="">description</label></div>
                <div class="input"><textarea name="description" value="<?php echo set_value('description') ?>" /></textarea></div>
            </div>

            <div class="row">
                <input type="submit" value="insert pet" />
            </div>
        </div>

    </form>
</div>
<?php
$this->load->view('admin/inc/foot');
