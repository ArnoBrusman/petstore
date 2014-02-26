<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Petshop Admin</title>
        <base href="<?php echo base_url() ?>" />

        <!--style-->
        <link rel="stylesheet/less" href="assets/style/reset.less" />
        <link rel="stylesheet/less" href="assets/style/style.less" />
        <?php
        if (isset($css)) {
            foreach ($css as $v_css) {
                ?>
                <link rel="stylesheet" href="assets/css/<?php echo $v_css ?>" />
                <?php
            }
        }
        if (isset($less)) {
            foreach ($less as $v_less) {
                ?>
                <link rel="stylesheet/less" href="assets/style/<?php echo $v_less ?>" />
                <?php
            }
        }
        ?>
        <script type="text/javascript">
            less = {
//                env: "development"
            };
        </script>
        <script type="text/javascript" src="assets/js/less.js"></script>
        <!--/style-->
        <?php
        //script includes
        if (isset($js)) {
            foreach ($js as $v_js) {
                ?>
                <script type="text/javascript" src="assets/js/<?php echo $v_js ?>"></script>
                <?php
            }
        }
        ?>
    </head>
    <body>
        <div class="header_wrapper">
            <a href="<?php echo base_url('admin') ?>">
                <div class="header">
                    <div class="header_title">Pet store</div>
                    <div class="logout_link">
                        <a class="logout" href="admin/authentication/logout">logout</a>
                    </div>
                </div>
                    
            </a>
        </div>

        <div class="menu">
            <?php $this->load->view('admin/inc/menu') ?>
        </div>

        <a href="admin"></a>
