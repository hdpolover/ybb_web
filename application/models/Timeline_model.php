<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class Timeline_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function create($data)
    {
        // code...
        $data = array(
            'id_summit' => $data[0],
            'desc' => $data[1],
            'timeline' => $data[2],
            'status' => $data[3],
        );
        $this->db->insert('timelines', $data);
        //return $this->db->affected_rows();
    }

    public function save_update($data)
    {
        $this->db->set('description', $data['description']);
        $this->db->set('start_timeline', $data['start_timeline']);
        $this->db->set('end_timeline', $data['end_timeline']);
        $this->db->set('timeline', $data['timeline']);
        $this->db->where('id_summit_timeline', $data['id_summit_timeline']);
        return $this->db->update('summit_timelines');
    }

    public function get_timeline($id = null)
    {
        if ($id == null) {
            $query = "SELECT summit_timelines.*, summits.*, summit_timelines.description AS `timeline_desc`
            FROM summit_timelines
            INNER JOIN summits ON summits.id_summit = summit_timelines.id_summit";
            return $this->db->query($query)->result_array();
        } else {
            $query = "SELECT summit_timelines.*, summits.*, summit_timelines.description AS `timeline_desc`
            FROM summit_timelines
            INNER JOIN summits ON summits.id_summit = summit_timelines.id_summit
            WHERE summit_timelines.id_summit_timeline =" . $id . "";
            return $this->db->query($query)->result_array();
        }
    }

    public function get_by_id($id)
    {
        $this->db->select('t.id_summit_timeline AS `id_summit_timeline`, t.description AS `desc`, s.description AS `summit_desc`, t.timeline AS `timeline`, t.status AS `status`');
        $this->db->from('summit_timelines AS t');
        $this->db->join('summits AS s', 't.id_summit = s.id_summit');
        $this->db->where('id_summit_timeline', $id);
        $result = $this->db->get();

        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return false;
        }
    }
}
