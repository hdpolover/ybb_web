<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class Agreement_letter_model extends CI_Model
{
    public function get_al($id = null)
    {
        if ($id == null) {
            $query = "SELECT pd.full_name, p.email, al.al_id, al.file_path, p.id_participant from agreement_letters al LEFT join participants p on al.id_participant = p.id_participant left join participant_details pd on pd.id_participant = p.id_participant;";
            return $this->db->query($query)->result_array();
        } else {
            $query = "SELECT pd.full_name, p.email, al.al_id, al.file_path, p.id_participant from agreement_letters al LEFT join participants p on al.id_participant = p.id_participant left join participant_details pd on pd.id_participant = p.id_participant where al.al_id = $id";
            return $this->db->query($query)->result_array();
        }
    }

    public function check_al($id) {
        $query = "SELECT pd.full_name, p.email, al.al_id, al.file_path, p.id_participant from agreement_letters al LEFT join participants p on al.id_participant = p.id_participant left join participant_details pd on pd.id_participant = p.id_participant where p.id_participant = '$id'";
            return $this->db->query($query)->result_array();
    }
}
