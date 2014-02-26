<table>
    <tr class="order_links">
        <th><a class="order_by" js_order="name" href="">name</a></th>
        <th><a class="order_by" js_order="address" href="">info</a></th>
        <th></th>
    </tr>
    <?php
    foreach ($dba_customers as $vdb_customer) {
        ?>
    
        <tr>
            <td><?php echo $vdb_customer->name ?></td>
            <td><?php echo strip_tags($vdb_customer->address) ?></td>
            <th><a href="admin/customer/edit/<?php echo $vdb_customer->id ?>"><img src="assets/images/icons/pencil.png" alt="" /></a><a class="js_delete" href="admin/customer/delete/<?php echo $vdb_customer->id ?>"><img src="assets/images/icons/delete.png" alt="" /></a></th>
        </tr>
    
        <?php
    }
    ?>
</table>
<?php
$tabledata = $this->session->userdata('table');
$limit = $tabledata['customer']['limit'];
$page_count = $customer_count / $limit;
if ($page_count > 1) {
    ?>
    <ul class="pagination">
        <?php
        $i = 0;
        while ($i < $page_count) {
            ?>
            <li><a href="admin/pet/display<?php echo '?page=' . ($i + 1) ?>" class="gotopage" js_page="<?php echo $i + 1 ?>"><?php echo $i + 1 ?></a></li>
                <?php
                $i++;
            }
            ?>
    </ul>
    <?php
}
?>
