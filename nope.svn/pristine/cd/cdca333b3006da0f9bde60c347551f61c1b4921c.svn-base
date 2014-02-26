<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $meta_title ?></title>
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
        <!-- /style-->
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
            <div class="header">
                <a href="<?php echo base_url() ?>">
                    <div class="header_title">
                        <p class="ht1">The petshop of Noah</p>
                        <p class="ht2">Exotic is all relative</p>
                    </div>
                </a>
                <a class="basket_link" href="order/basket">basket</a>
            </div>
        </div>

        <div class="menu">
            <?php $this->load->view('store/inc/menu') ?>
        </div>
