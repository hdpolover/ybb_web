<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class Summit_content_model extends CI_Model
{
    public function get_summit_content($id = null)
    {
        if ($id == null) {
            return $this->db->get('summit_contents')->result_array();
        } else {
            return $this->db->get_where('summit_contents', ['id_summit_content' => $id])->result_array();
        }
    }

    public function get_contents()
    {
        $query = "SELECT sc.id_summit_content AS `id_summit_content`,
        sc.modified_date AS `modified_date`,
        s.description AS `summit`,
        sc.description AS `description`,
        sc.file_path AS `file`,
        sc.title,
        sc.status AS `status`
        FROM summit_contents sc, summits s
        WHERE sc.id_summit = s.id_summit
        ORDER BY sc.modified_date DESC";

        return $this->db->query($query)->result_array();
    }

    public function add_content($data)
    {
        $this->db->insert('summit_contents', $data);
        return $this->db->affected_rows();
    }

    public function save_update($data)
    {
        $this->db->set('description', $data['description']);
        $this->db->set('title', $data['title']);
        $this->db->set('modified_date', $data['modified_date']);
        $this->db->set('status', $data['status']);
        $this->db->where('id_summit_content', $data['id_summit_content']);
        return $this->db->update('summit_contents');
    }
}
