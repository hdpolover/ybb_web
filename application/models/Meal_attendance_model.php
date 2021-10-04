<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class Meal_attendance_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function get_meal_attendance($id = null)
  {
    if ($id == null) {
      $query = "
      SELECT participant_details.full_name, meal_types.description AS `meal_name`, meal_attendances.check_in_time, summits.description AS `summit_name`, summits.id_summit, meal_types.id_meal_type, participants.id_participant, summit_days.id_summit_day, summit_days.day_date, summit_days.description AS `sd_name`
FROM meal_attendances
INNER JOIN meal_types ON meal_attendances.id_meal_type = meal_types.id_meal_type
INNER JOIN summit_days ON meal_attendances.id_summit_day = summit_days.id_summit_day
INNER JOIN participants ON meal_attendances.id_participant = participants.id_participant
INNER JOIN participant_details ON participants.id_participant = participant_details.id_participant
INNER JOIN summits on summit_days.id_summit = summits.id_summit";
      return $this->db->query($query)->result_array();
    } else {
      return $this->db->get_where('meal_types', ['id_meal_type' => $id])->result_array();
    }
  }

  public function create_meal_attendance($data)
  {
    $data = array(
      'id_summit_day' => $data['id_summit_day'],
      'id_meal_type' => $data['id_meal_type'],
      'id_participant' => $data['id_participant'],
      'check_in_time' => $data['check_in_time'],
    );
    $this->db->insert('meal_attendances', $data);
  }
}
