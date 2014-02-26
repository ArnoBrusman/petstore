<table>
    <tr class="order_links" js_table="page">
        <th><a class="order_by" js_order="title" href="">title</a></th>
        <th><a class="order_by" js_order="content" href="">content</a></th>
        <th></th>
    </tr>
    <?php
    foreach ($pages as $vdb_page) {
        ?>


        <tr>
            <td><?php echo $vdb_page->title ?></td>
            <td><?php echo substr(strip_tags($vdb_page->content), 0, 40) . '...' ?></td>
            <th><a href="admin/page/edit/<?php echo $vdb_page->id ?>"><img src="assets/images/icons/pencil.png" alt="" /></a><a class="js_delete" href="admin/page/delete/<?php echo $vdb_page->id ?>"><img src="assets/images/icons/delete.png" alt="" /></a></th>
        </tr>

        <?php
    }
    ?>
</table>
<?php
$tabledata = $this->session->userdata('table');
$limit = $tabledata['page']['limit'];
$page_count = $pages_count / $limit;
if ($page_count > 1) {
    ?>
    <ul class="pagination">
        <?php
        $i = 0;
        while ($i < $page_count) {
            ?>
            <li><a href="admin/page/display<?php echo '?page=' . ($i + 1) ?>" class="gotopage" js_page="<?php echo $i + 1 ?>"><?php echo $i + 1 ?></a></li>
                <?php
                $i++;
            }
            ?>
    </ul>
    <?php
}
?>