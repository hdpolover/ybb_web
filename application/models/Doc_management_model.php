<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class Doc_management_model extends CI_Model
{
    public function get_loa($email)
    {
        $query = "select pd.full_name from participant_details pd inner join participants p on pd.id_participant = p.id_participant where p.email = '$email';";
        return $this->db->query($query)->result_array();
    }

    public function get_loa_by_id($id)
    {
        $query = "select pd.full_name from participant_details pd inner join participants p on pd.id_participant = p.id_participant where p.id_participant = '$id';";
        return $this->db->query($query)->result_array();
    }

    public function get_data($id) {
        $query = "select pd.full_name, pd.institution from participant_details pd inner join participants p on pd.id_participant = p.id_participant where p.id_participant = '$id';";
        return $this->db->query($query)->result_array();
    }
    
    public function get_data_by_email($email) {
        $query = "select p.id_participant, p.email, p.status, pd.full_name, pd.institution from participant_details pd inner join participants p on pd.id_participant = p.id_participant where p.email = '$email';";
        return $this->db->query($query)->result_array();
    }

    public function get_id($email) {
        $query = "select p.id_participant from participants p where p.email = '$email';";
        return $this->db->query($query)->result_array();
    }

}
