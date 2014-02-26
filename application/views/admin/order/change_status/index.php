<?php
$this->load->view('admin/inc/head');
?>
<div class="wrapper admin">
    
    <?php
    $vwd_crumb_data = array();
    $vwd_crumb_data['crumbs'] = array(
        array('title' => 'order', 'uri' => 'order/display'),
        array('title' => 'update order', 'uri' => 'order/change_status'),
    );
    $this->load->view('admin/inc/breadcrumb', $vwd_crumb_data);
    ?>
    
    <form action="" method="POST">
        <label for="">new status</label>
        <select name="status" >
        <?php 
        foreach($status_codes as $k_status_code => $v_status_code) {
            if($k_status_code == $db_order->status) {
                $selected = 'selected=\'\'';
            } else {
                $selected = '';
            }
        ?>
        <option <?php echo $selected ?> value="<?php echo $k_status_code ?>"><?php echo $v_status_code ?></option>
        <?php 
        }
        ?>
        </select>
        <input type="submit" name="update" value="update" />
    </form>
</div>
<?php
$this->load->view('admin/inc/foot');