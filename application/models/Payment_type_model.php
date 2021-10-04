<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class Payment_type_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_payment_type($id = null)
    {
        if ($id == null) {
            $query = "SELECT payment_types.*, summits.*, payment_types.description AS `pt_desc`
            FROM payment_types
            INNER JOIN summits ON summits.id_summit = payment_types.id_summit";
            return $this->db->query($query)->result_array();
        } else {
            $query = "SELECT payment_types.*, summits.*, payment_types.description AS `pt_desc`
            FROM payment_types
            INNER JOIN summits ON summits.id_summit = payment_types.id_summit
            WHERE payment_types.id_payment_type=" . $id . "";
            return $this->db->query($query)->result_array();
        }
    }

    public function save_update($data)
    {
        $this->db->set('id_summit', $data['id_summit']);
        $this->db->set('start_date', $data['start_date']);
        $this->db->set('end_date', $data['end_date']);
        $this->db->set('description', $data['description']);
        $this->db->where('id_payment_type', $data['id_payment_type']);
        return $this->db->update('payment_types');
    }

    public function save_new($data)
    {
        $this->db->insert('payment_types', $data);
        return $this->db->affected_rows();
    }
}
