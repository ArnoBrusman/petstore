<?php
$includes = array();
$includes['js'] = array('jquery.js', 'fancybox/jquery.fancybox.js', 'petstore_admin.js');
$includes['css'] = array('fancybox/jquery.fancybox.css');
$this->load->view('admin/inc/head', $includes);
?>
<div class="wrapper admin">
    
    <?php
    $vwd_crumb_data = array();
    $vwd_crumb_data['crumbs'] = array(
        array('title' => 'pages', 'uri' => 'page/display'),
    );
    $this->load->view('admin/inc/breadcrumb', $vwd_crumb_data);
    ?>
    <table class="display_table">
        <tr>
            <th>name</th>
            <th></th>
        </tr>
        <?php
        foreach ($dba_users as $vdb_user) {
        ?>


        <tr>
            <td><?php echo $vdb_user->username ?></td>
            <th><a href="admin/user/edit/<?php echo $vdb_user->id ?>"><img src="assets/images/icons/pencil.png" alt="" /></a><a class="js_delete" href="admin/user/delete/<?php echo $vdb_user->id ?>"><img src="assets/images/icons/delete.png" alt="" /></a></th>
        </tr>

        <?php
        }
        ?>
    </table>
</div>
<?php
$this->load->view('admin/inc/foot');

