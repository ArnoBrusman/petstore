<?php $this->load->view('store/inc/head'); ?>
<div class="wrapper store">
    <?php
    foreach ($pets_display as $v_pet) {
        echo $v_pet;
    }
    ?>
    
</div>

<?php $this->load->view('store/inc/foot'); ?>