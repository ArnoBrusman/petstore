<table>
    <tr class="order_links" js_table="order">
        <th><a class="order_by" js_order="customer_name" href="">customer name</a></th>
        <th><a class="order_by" js_order="pet_name" href="">pet name</a></th>
        <th><a class="order_by" js_order="price" href="">price</a></th>
        <th><a class="order_by" js_order="status" href="">status</a></th>
        <th></th>
    </tr>
    <?php
    foreach ($dba_orders as $vdb_order) {
        ?>


        <tr>
            <td><a href="admin/customer/edit/<?php echo $vdb_order->customer_id ?>"><?php echo $vdb_order->customer_name ?></a></td>
            <td><a href="admin/pet/edit/<?php echo $vdb_order->pet_id ?>"><?php echo $vdb_order->pet_name ?> (<?php echo $vdb_order->species ?>)</a></td>
            <td><?php echo $vdb_order->price ?></td>
            <td><?php echo $status_codes[$vdb_order->status] ?></td>
            <th><a href="admin/order/change_status/<?php echo $vdb_order->id ?>"><img src="assets/images/icons/pencil.png" alt="" /></a><a class="js_delete" href="admin/order/delete/<?php echo $vdb_order->id ?>"><img src="assets/images/icons/delete.png" alt="" /></a></th>
        </tr>

        <?php
    }
    ?>
</table>
<?php
$tabledata = $this->session->userdata('table');
$limit = $tabledata['order']['limit'];
$page_count = $order_count / $limit;
if ($page_count > 1) {
    ?>
    <ul class="pagination">
        <?php
        $i = 0;
        while ($i < $page_count) {
            ?>
            <li><a href="admin/order/display<?php echo '?page=' . ($i + 1) ?>" class="gotopage" js_page="<?php echo $i + 1 ?>"><?php echo $i + 1 ?></a></li>
                <?php
                $i++;
            }
            ?>
    </ul>
    <?php
}
?>