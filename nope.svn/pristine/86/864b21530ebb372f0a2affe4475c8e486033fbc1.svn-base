<?php 
$includes['css'] = array('validationEngine.jquery.css');
$includes['js'] = array('jquery.js', 'jquery.validationEngine.js', 'languages/jquery.validationEngine-en.js', 'petstore_admin.js');
$this->load->view('store/inc/head',$includes); ?>

<div class="wrapper">
    input your info
    <form action="" class="validation_form" method="POST">
        <div class="form_errors"><?php echo validation_errors(); ?></div>
        <div>
            <label for="name">name</label><input id="name" class="validate[required]" type="text" name="name" value="<?php echo set_value('name')?>" />
        </div>
        <div>
            <label for="address">order info</label><input type="text" class="validate[required]" name="address" value="<?php echo set_value('address')?>" />
        </div>
        <div>
            <input type="submit" name="checkout" value="buy" />
        </div>
    </form>
</div>


<?php 
$this->load->view('store/inc/foot'); 
