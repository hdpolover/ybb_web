<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class Summit_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function create_summit($data)
  {
    $data = array(
      'desc' => $data['desc'],
      'regist_fee' => $data['regist_fee'],
      'program_fee' => $data['program_fee'],
      'status' => $data['status'],
    );

    $this->db->insert('summits', $data);
  }

  public function save_update($data)
  {
    $this->db->set('description', $data['description']);
    $this->db->set('regist_fee', $data['regist_fee']);
    $this->db->set('program_fee', $data['program_fee']);
    $this->db->set('status', $data['status']);
    $this->db->set('regist_status', $data['regist_status']);
    $this->db->where('id_summit', $data['id_summit']);
    return $this->db->update('summits');
  }

  public function get_summit($id = null)
  {
    if ($id == null) {
      return $this->db->get('summits')->result_array();
    } else {
      return $this->db->get_where('summits', ['id_summit' => $id])->result_array();
    }
  }

  public function get_active_summits()
  {
    $this->db->where('status', 1);
    $this->db->from('summits');
    return $this->db->get()->result_array();
  }
}
