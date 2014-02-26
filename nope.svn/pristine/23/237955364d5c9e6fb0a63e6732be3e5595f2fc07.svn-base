<?php

class Pet_model extends MY_Model {

    var $title = '';
    var $content = '';
    var $date = '';
    var $table_name = 'pet';

    function __construct() {
        parent::__construct();
    }

    public function create(array $data) {
        $this->load->model('gallery/album_model');
        $now = date('Y-m-d H:i:s');
        $album_data = array(
            'uuid' => $this->create_uuid(),
            'created_at' => $now,
            'updated_at' => $now);
        $album_id = $this->album_model->create($album_data);
        $data['album'] = $album_id;
        $insert_id = parent::create($data);
        return $insert_id;
    }
    
    public function delete($pet_id) {
        $db_pet = $this->find_by_id($pet_id);
        parent::delete($pet_id);
        $this->load->model('gallery/album_model');
        $this->album_model->delete($db_pet->album);
    }

    /**
     * get the all the pet's that aren't ordered yet.
     * 
     * @return array
     */
    function get_available() {
//        $this->load->model('order_model');
//        $dba_orders = $this->order_model->fetch();
//        foreach ($dba_orders as $vdb_order) {
        $this->db->select(array('pet.id','name','species','race','price','description','album'))
                ->join('order', 'order.pet_id = pet.id', 'left')
                ->where('order.id', NULL);
//        }
        $fetched = $this->fetch();
        return $fetched;
    }

    /**
     * get the first pictures of every pet
     * 
     * @return array
     */
    function get_first_pictures() {
        $pets = $this->fetch();
        $pets_first_picture = array();
        foreach ($pets as $v_pet) {
            $images = $this->get_images_by_id($v_pet->id);
            $first_picture = array_shift($images);
            $pets_first_picture[$v_pet->id] = $first_picture;
        }
        return $pets_first_picture;
    }

    /**
     * return images from a pet by pet id
     * @param type $pet_id
     * @return type
     */
    function get_images_by_id($pet_id) {
        $pet = $this->find_by_id($pet_id);
        $this->load->model('gallery/image_model');
        $images = $this->image_model->get_images_by_album_id($pet->album);
        return $images;
    }

    /**
     * get the count of pets, total, by species & by race
     * @return type
     */
    function get_count_data() {

        $count_data['pets'] = $this->count();

        $count_data['species'] = $this->count('species');
        $count_data['race'] = $this->count('`race`, `species`');

        $dba_species = $this->fetch_field('species');
        foreach ($dba_species as $vdb_species) {
            $this->db->where('species', $vdb_species->species);
            $count_data['species_' . $vdb_species->species] = $this->count();
            $this->db->where('species', $vdb_species->species);
            $dba_races = $this->fetch_field('race');
            foreach ($dba_races as $vdb_race) {
                $this->db->where('species', $vdb_species->species);
                $this->db->where('race', $vdb_race->race);
                $count_data['race_' . $vdb_species->species . '_' . $vdb_race->race] = $this->count();
            }
        }
        return $count_data;
    }

}
