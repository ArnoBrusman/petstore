<?php ?>

    <ul class="menu <?php echo $name ?>">
        <?php
        $this->load->helper('firephp');
        foreach ($subitems as $v_subitem) {
            echo $v_subitem;
        }
        ?>
    </ul>