<?php
$includes = array();
$includes['js'] = array('jquery.js', 'jquery.jcarousel.min.js', 'fancybox/jquery.fancybox.js', 'petstore.js');
$includes['css'] = array('fancybox/jquery.fancybox.css');
$this->load->view('store/inc/head', $includes);
$first_picture = array_shift($dba_pictures);
?>
<div class="wrapper store">

    <div class="pet_content">
        <div class="pet_image">
            <a href="<?php echo base_url('uploads/' . $first_picture->file_name) ?>" rel="gall" class="fancy-img"><img class="pet_image" src="<?php echo base_url('uploads/' . $first_picture->file_name) ?>" alt="" /></a>
        </div>
        <a class="add_to_basket button" petid="<?php echo $db_pet->id; ?>" href="order/basket">Order this pet</a>
        <h1><?php echo $db_pet->name ?></h1>
        <ul>
            <li>species: <?php echo $db_pet->species ?></li>
            <?php if (!empty($db_pet->race)) { ?>
                <li>race: <?php echo $db_pet->race ?></li>
            <?php } ?>
            <li>gender: <?php echo $db_pet->gender == 0 ? 'male' : 'female' ?></li>
            <?php if (!empty($db_pet->description)) { ?>
                <li>description: <span class="description"><?php echo $db_pet->description ?></span class="description"></li>
            <?php } ?>
        </ul>

        <?php echo $db_pet->content ?>

    </div>
    <?php
    if (!empty($dba_pictures)) {
        ?>
        <div class="pet_images_wrapper">
            <div class="pet_images">

                <ul>
                    <?php
                    foreach ($dba_pictures as $v_pic) {
                        ?>
                        <li>
                            <a  href="<?php echo base_url('uploads/' . $v_pic->file_name) ?>" rel="gall" class="fancy-img"><img src="<?php echo base_url('uploads/' . $v_pic->raw_name) . '_thumb' . $v_pic->file_ext ?>" alt="" /></a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
            <a href="#" class="jcarousel-control-next">&rsaquo;</a>
        </div>
    <?php } ?>

</div>
<?php
$this->load->view('store/inc/foot');
