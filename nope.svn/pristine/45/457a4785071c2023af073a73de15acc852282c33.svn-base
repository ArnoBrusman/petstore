<?php
$full_url = base_url('admin');
?>
<ul class="breadcrumbs">
    <li><a href="<?php echo base_url('admin') ?>">admin</a></li>
    <?php
    end($crumbs);
    $lastkey = key($crumbs);
    foreach ($crumbs as $k => $v_crumb) {
        if ($k === $lastkey) {
            $last = TRUE;
        } else {
            $last = FALSE;
        }
        $crumb_url = $full_url . '/' . $v_crumb['uri'];
        if ($last) {
            ?>
            <li class="last"><?php echo $v_crumb['title'] ?></li>
                <?php
            } else {
                ?>
            <li><a href="<?php echo $crumb_url ?>"><?php echo $v_crumb['title'] ?></a></li>
            <?php
        }
    }
    ?>
</ul>