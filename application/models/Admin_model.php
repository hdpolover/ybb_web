<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class Admin_model extends CI_Model
{
    public function get_admins($id = null)
    {
        if ($id == null) {
            return $this->db->get('admins')->result_array();
        } else {
            return $this->db->get_where('admins', ['id_admin' => $id])->result_array();
        }
    }


    public function add_admin($data)
    {
        return $this->db->insert('admins', $data);
    }

    public function update_admin($data) {
        $this->db->set('username', $data['username']);
        $this->db->set('password', $data['password']);
        $this->db->set('status', $data['status']);
        $this->db->set('id_summit', $data['id_summit']);
        $this->db->where('id_admin', $data['id_admin']);
        return $this->db->update('admins');
    }
}
