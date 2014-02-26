<table>
    <tr class="order_links" js_table="pet">
        <th><a class="order_by" js_order="name" href="">name</a></th>
        <th><a class="order_by" js_order="species" href="">species</a></th>
        <th><a class="order_by" js_order="race" href="">race</a></th>
        <th><a class="order_by" js_order="gender" href="">♂/♀</a></th>
        <th><a class="order_by" js_order="price" href="">price</a></th>
        <th><a class="order_by" js_order="description" href="">description</a></th>
        <th></th>
    </tr>

    <?php
    foreach ($pets as $v_pet) {
        ?>

        <tr>
            <td><?php echo $v_pet->name ?></td>
            <td><?php echo $v_pet->species ?></td>
            <td><?php echo $v_pet->race ?></td>
            <td><?php echo $v_pet->gender == 0 ? '♂' : '♀' ?></td>
            <td>€<?php echo $v_pet->price ?></td>
            <td><?php echo substr($v_pet->description, 0, 40) . '...' ?></td>
            <th><a href="admin/pet/edit/<?php echo $v_pet->id ?>"><img src="assets/images/icons/pencil.png" alt="" /></a><a class="js_delete" href="admin/pet/delete/<?php echo $v_pet->id ?>"><img src="assets/images/icons/delete.png" alt="" /></a></th>
        </tr>

        <?php
    }
    ?>
</table>
<?php
$tabledata = $this->session->userdata('table');
$limit = $tabledata['Pet']['limit'];
$page_count = $pet_count / $limit;
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