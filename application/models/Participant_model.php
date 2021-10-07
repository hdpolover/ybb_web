<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class Participant_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function register($data)
  {
    $this->db->insert('participants', $data);
    return $this->db->affected_rows();
  }

  public function add_participant_details($data)
  {
    $this->db->insert('participant_details', $data);
    return $this->db->affected_rows();
  }

  public function get_participant_detail($id = null)
  {
    if ($id == null) {
      return $this->db->get('participant_details')->result_array();
    } else {
      $query = "SELECT `participant_details`.*, `participants`.*
                  FROM `participants` LEFT JOIN `participant_details` ON `participants`.`id_participant` = `participant_details`.`id_participant`
                 WHERE `participants`.`id_participant`= '$id' ";

      return $this->db->query($query)->result_array();
    }
  }

  public function update_participant_status($data, $id)
  {
    // code...
    $this->db->update('participants', $data, ['id_participant' => $id]);
    return $this->db->affected_rows();
  }

  public function get_participant_total_count()
  {
    $num_rows = $this->db->count_all_results('participants');
    return $num_rows;
  }

  public function get_valid_participant_total_count()
  {
    $this->db->where('status', 2);
    $num_rows = $this->db->count_all_results('participants');
    return $num_rows;
  }

  public function get_fixed_participant_total_count()
  {
    $this->db->where('status', 4);
    $num_rows = $this->db->count_all_results('participants');
    return $num_rows;
  }

  public function get_participants()
  {
    // code...
    $query = "SELECT `participant_details`.*, `participants`.*, `summits`.`description`
                FROM `participant_details` LEFT JOIN `participants` ON `participant_details`.`id_participant` = `participants`.`id_participant`
                LEFT JOIN `summits` ON `participants`.`id_summit` = `summits`.`id_summit`";

    return $this->db->query($query)->result_array();
  }

  public function addParticipant($data1, $data2)
  {
    $data1 = [
      "id_participant" => $this->input->post('id', true),
      "id_summit" => $this->input->post('summit', true),
      "email" => $this->input->post('email', true)
    ];
    $data2 = [
      "photo" => $this->input->post('photo', true),
      "full_name" => $this->input->post('fullname', true),
      "birthdate" => $this->input->post('birthdate', true),
      "gender" => $this->input->post('gender', true),
      "id_participant" => $this->input->post('id', true),
      "address" => $this->input->post('address', true),
      "nationality" => $this->input->post('nationality', true),
      "occupation" => $this->input->post('occupation', true),
      "field_of_study" => $this->input->post('field', true),
      "institution" => $this->input->post('institution', true),
      "emergency_contact" => $this->input->post('emergency', true),
      "wa_number" => $this->input->post('wa', true),
      "ig_account" => $this->input->post('ig', true),
      "tshirt_size" => $this->input->post('tshirt', true),
      "disease_history" => $this->input->post('disease', true),
      "contact_relation" => $this->input->post('relation', true),
      "is_vegetarian" => $this->input->post('vegetarian', true),
      "subtheme" => $this->input->post('subtheme', true),
      "essay" => $this->input->post('essay', true),
      "social_projects" => $this->input->post('social', true),
      "talents" => $this->input->post('talents', true),
      "achievements" => $this->input->post('achievements', true),
      "experiences" => $this->input->post('experiences', true),
      "know_program_from" => $this->input->post('know', true),
      "source_account_name" => $this->input->post('source', true),
      "video_link" => $this->input->post('videolink', true),
      "id_participant_detail" => $this->input->post('id_detail', true)
    ];
    $this->db->insert('participants', $data1);
    $this->db->insert('participant_details', $data2);
    return $this->db->affected_rows();
  }

  public function editParticipant($id)
  {
    $data = [
      "photo" => $this->input->post('photo', true),
      "full_name" => $this->input->post('fullname', true),
      "birthdate" => $this->input->post('birthdate', true),
      "gender" => $this->input->post('gender', true),
      "id_participant" => $this->input->post('id', true),
      "address" => $this->input->post('address', true),
      "nationality" => $this->input->post('nationality', true),
      "occupation" => $this->input->post('occupation', true),
      "field_of_study" => $this->input->post('field', true),
      "institution" => $this->input->post('institution', true),
      "emergency_contact" => $this->input->post('emergency', true),
      "wa_number" => $this->input->post('war', true),
      "ig_account" => $this->input->post('ig', true),
      "tshirt_size" => $this->input->post('tshirt', true),
      "disease_history" => $this->input->post('disease', true),
      "contact_relation" => $this->input->post('relation', true),
      "is_vegetarian" => $this->input->post('vegetarian', true),
      "subtheme" => $this->input->post('subtheme', true),
      "essay" => $this->input->post('essay', true),
      "social_projects" => $this->input->post('social', true),
      "talents" => $this->input->post('talents', true),
      "achievements" => $this->input->post('achievements', true),
      "experiences" => $this->input->post('experiences', true),
      "know_program_from" => $this->input->post('know', true),
      "source_account_name" => $this->input->post('source', true),
      "video_link" => $this->input->post('videolink', true),
      "id_participant_detail" => $this->input->post('id_detail', true)

    ];

    $this->db->update('participant_details', $data, ['id_participant' => $id]);
    return $this->db->affected_rows();
  }

  public function getSummit()
  {
    // code...
    $query = "SELECT `id_summit`,`description` FROM `summits`";
    return $this->db->query($query)->result_array();
  }

  public function get_fullParticipants()
  {
    // code...
    $query = "SELECT `participant_details`.*, `participants`.*, `summits`.`description`
                FROM `participant_details` LEFT JOIN `participants` ON `participant_details`.`id_participant` = `participants`.`id_participant`
                LEFT JOIN `summits` ON `participants`.`id_summit` = `summits`.`id_summit`
                WHERE `participants`.`is_fully_funded` = 1";

    return $this->db->query($query)->result_array();
  }

  public function addlist_fullParticipants()
  {
    // code...
    $query = "SELECT `participant_details`.*, `participants`.*, `summits`.`description`
                FROM `participant_details` LEFT JOIN `participants` ON `participant_details`.`id_participant` = `participants`.`id_participant`
                LEFT JOIN `summits` ON `participants`.`id_summit` = `summits`.`id_summit`
                WHERE `participants`.`is_fully_funded` = 0";

    return $this->db->query($query)->result_array();
  }

  public function add_fullParticipants($id)
  {
    // code...
    // $query = "UPDATE `participants`
    //              SET `is_fully_funded` = 1
    //            WHERE `participants`.`id_participant` = $id
    //             ";
    //
    // return $this->db->query($query)->result_array();
    // $data = [
    //     "is_fully_funded" => $this->input->post('1', true)
    //   ];
    $this->db->update('participants', ['is_fully_funded' => 1], ['id_participant' => $id]);
    return $this->db->affected_rows();
  }

  public function getSortedParticipant()
  {
    // code...
    $query = "SELECT `participant_details`.*, `participants`.*, `summits`.`description`
                FROM `participant_details` LEFT JOIN `participants` ON `participant_details`.`id_participant` = `participants`.`id_participant`
                LEFT JOIN `summits` ON `participants`.`id_summit` = `summits`.`id_summit`
                ORDER BY participant_details.full_name ASC";

    return $this->db->query($query)->result_array();
  }
}
