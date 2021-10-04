<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class Meal_type_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function get_meal_type($id = null)
  {
    if ($id == null) {
      return $this->db->get('meal_types')->result_array();
    } else {
      return $this->db->get_where('meal_types', ['id_meal_type' => $id])->result_array();
    }
  }

  public function create_meal_type($data)
  {
    $data = array(
      'description' => $data['description'],
    );

    $this->db->insert('meal_types', $data);
  }

  public function save_update($data)
  {
    $this->db->set('description', $data['description']);
    $this->db->where('id_meal_type', $data['id_meal_type']);
    return $this->db->update('meal_types');
  }
}
