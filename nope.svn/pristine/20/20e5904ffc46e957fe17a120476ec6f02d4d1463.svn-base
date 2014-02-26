<?php
$includes['js'] = array('jquery.js', 'petstore.js');
$this->load->view('store/inc/head', $includes); ?>

<div class="wrapper">
    <div class="basket">
        <?php
        if (!empty($basket)) {
            ?>
            your basket:
            <ul class="basket_items">

                <?php
                foreach ($basket as $v_pet) {
                    ?>
                    <li><?php echo $v_pet->name ?></li>
                    <?php
                }
                ?>
            </ul>
            <a class="purchase button" href="order/checkout">purchase</a>
            <form action="order/basket" method="POST">
                <input type="hidden" name="clean" value="yes" />
                <!--<input type="submit" value="clean basket" />-->
                <a href="" class="button submit clean">clean basket</a>
            </form>
            <?php
        } else {
            ?>
            <p>your basket is empty</p>
            <?php
        }
        ?>
    </div>
</div>


<?php
$this->load->view('store/inc/foot');
