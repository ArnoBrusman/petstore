<div class="pet">
    
    <a href="<?php echo base_url('/pet/'. $db_pet->id) ?>">
        <?php 
            if(isset($first_picture)) {
        ?>
        <div class="image"><img src="<?php echo 'uploads/' . $first_picture->raw_name . '_thumb' . $first_picture->file_ext?>" alt="" /></div>
        <?php 
            }
        ?>
        <div class="name"><?php echo $db_pet->name ?></div>
    </a>
    
</div>