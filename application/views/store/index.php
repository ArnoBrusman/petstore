<?php 
$includes = array();
$includes['js'] = array('jquery.js', 'jquery-ui-1.10.4.custom.js','jquery-ui-groupsearch.js', 'petstore.js');
$includes['css'] = array('jquery-ui-1.10.4.custom.min.css');
$this->load->view('store/inc/head', $includes);
?>

<div class="wrapper store">
    <div class="search_form">
        <form action="pets/" method="POST">
            <label for="petsearch">search pet: </label><input class="search_input" name="search" type="text" id='petsearch'/>
            <input type="hidden" value="" name="field" id="petsearch_field" />
            <a href="" class="submit button">Search</a>
        </form>
    </div>
    <div class="pet_display">
        <?php
        foreach ($pets as $vdb_pet) {
            $pet_data = array();
            $pet_data['db_pet'] = $vdb_pet;
            $pet_data['first_picture'] = $pets_first_picture[$vdb_pet->id];
            $this->load->view('store/inc/pet', $pet_data);
        }
        ?>
    </div>
    
</div>

<?php $this->load->view('store/inc/foot');