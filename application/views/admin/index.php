<?php 
$this->load->view('admin/inc/head');
?>

<div class="wrapper admin">
    <div class="block">
        
        <div class="block_head"><h2>amount</h2></div>
        <div class="block_content">
            <table>
                <tr><td>pets total: </td><td><?php echo $count_data['pets'] ?></td></tr>
                <tr><td>different species: </td><td><?php echo $count_data['species'] ?></td></tr>
                <tr><td>different races:</td><td><?php echo $count_data['race'] ?></td></tr>
            </table>
        </div>
        
    </div>
    <div class="block">
        <div class="block_head"><h2>species</h2></div>
        <div class="block_content">
            <table>
            <?php
            foreach ($dba_species as $vdb_species) {
            ?>
                <tr>
            <?php echo '<td>' . $vdb_species->species . ': </td><td>' . $count_data['species_' . $vdb_species->species] . '</td>' ?>
                </tr>
            <?php
            }
            ?>
            </table>
        </div>
    </div>
    <div class="block">
        <div class="block_head"><h2>races</h2></div>
        <div class="block_content">
            <table>
            <?php
            foreach ($dba_race as $vdb_race) {
                ?>
                    <tr>
                <?php echo '<td>' . $vdb_race->race . ' ('. $vdb_race->species . '): </td><td>' . $count_data['race_' . $vdb_race->species . '_' . $vdb_race->race] . '</td>' ?>
                    </tr>
                <?php
            }
            ?>
            </table>
        </div>
    </div>
    <div class="block">
        <div class="block_head"><h2>orders</h2></div>
        <div class="block_content">
            <table>
                <tr><td>total:</td> <td><?php echo $order_data['total']?></td></tr>
                <tr class="separator"></tr>
                <tr><td>processing: </td><td><?php echo $order_data['processing']?></td></tr>
                <tr><td>total: </td><td>€ <?php echo number_format($order_data['processing_price'], 2)?></td></tr>
                <tr class="separator"></tr>
                <tr><td>sold: </td><td><?php echo $order_data['completed']?></td></tr>
                <tr><td>total: </td><td>€ <?php echo number_format($order_data['completed_price'], 2)?></td></tr>
            </table>
        </div>
    </div>
</div>
<?php
$this->load->view('admin/inc/foot');
?>