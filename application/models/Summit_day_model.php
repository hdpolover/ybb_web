<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class Summit_day_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function create_summit_day($data)
  {
    $data = array(
      'id_summit' => $data['id_summit'],
      'description' => $data['description'],
      'day_date' => $data['day_date'],
    );

    $this->db->insert('summit_days', $data);
  }

  public function save_update($data)
  {
    $this->db->set('description', $data['description']);
    $this->db->set('day_date', $data['day_date']);
    $this->db->set('id_summit', $data['id_summit']);
    $this->db->where('id_summit_day', $data['id_summit_day']);
    return $this->db->update('summit_days');
  }

  public function get_summit_day($id = null)
  {
    if ($id == null) {
      $query = "SELECT summit_days.*, summits.*, summit_days.description AS `sd_desc`
      FROM summit_days
      INNER JOIN summits ON summits.id_summit = summit_days.id_summit";
      return $this->db->query($query)->result_array();
    } else {
      $query = "SELECT summit_days.*, summits.*, summit_days.description AS `sd_desc`
    FROM summit_days
    INNER JOIN summits ON summits.id_summit = summit_days.id_summit
      WHERE summit_days.id_summit_day=" . $id . "";
      return $this->db->query($query)->result_array();
    }
  }
}
