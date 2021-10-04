<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class Influencer_model extends CI_Model
{
    public function get_influencer($id = null)
    {
        if ($id == null) {
            $query = "select influencers.referral_code, influencers.full_name, count(participant_details.referral_code) AS referral_count, influencers.status from influencers left join participant_details on participant_details.referral_code = influencers.referral_code where influencers.referral_code not like '-' GROUP by influencers.referral_code";
            return $this->db->query($query)->result_array();
        } else {
            $query = "select influencers.referral_code, influencers.full_name AS inf_name, influencers.*, count(participant_details.referral_code) AS referral_count from influencers inner join participant_details on participant_details.referral_code = influencers.referral_code where influencers.referral_code = '" . $id . "'";
            return $this->db->query($query)->result_array();
        }
    }

    public function get_referred_participant($id)
    {
        $query = "select participant_details.id_participant, participant_details.full_name, participants.email from participant_details inner join participants on participant_details.id_participant = participants.id_participant INNER join influencers on participant_details.referral_code = influencers.referral_code where influencers.referral_code = '" . $id .  "'";
        return $this->db->query($query)->result_array();
    }

    public function add($data)
    {
        $this->db->insert('influencers', $data);
        return $this->db->affected_rows();
    }

    public function save_edit($data)
    {
        $this->db->set('full_name', $data['full_name']);
        $this->db->set('institution', $data['institution']);
        $this->db->set('tiktok', $data['tiktok']);
        $this->db->set('status', $data['status']);
        $this->db->set('instagram', $data['instagram']);
        $this->db->set('field_of_study', $data['field_of_study']);
        $this->db->where('referral_code', $data['referral_code']);
        return $this->db->update('influencers');
    }
}
