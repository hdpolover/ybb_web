<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Meal_attendance extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Participant_model', 'participant');
    $this->load->model('summit_day_model', 'summit_day');
    $this->load->model('meal_type_model', 'meal_type');
    $this->load->model('meal_attendance_model', 'meal_attendance');
  }

  public function index()
  {
    $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();
    $data['meal_attendances'] = $this->meal_attendance->get_meal_attendance();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('meal_attendance/index', $data);
    $this->load->view('templates/footer');
  }

  public function add()
  {
    $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();
    $data['summit_days'] = $this->summit_day->get_summit_day();
    $data['meal_types'] = $this->meal_type->get_meal_type();
    $data['participants'] = $this->participant->get_participants();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('meal_attendance/add', $data);
    $this->load->view('templates/footer');
  }

  public function save_add()
  {
    $id_summit_day = $this->input->post('id_summit_day');
    $id_meal_type = $this->input->post('id_meal_type');
    $id_participant = $this->input->post('id_participant');
    $check_in_time = $this->input->post('check_in_time');

    $data = array(
      'id_summit_day' => $id_summit_day,
      'id_meal_type' => $id_meal_type,
      'id_participant' => $id_participant,
      'check_in_time' => $check_in_time,
    );

    $this->meal_attendance->create_meal_attendance($data);

    $this->session->set_flashdata('message', '<div class ="alert alert-success" style="text-align-center" role ="alert">Added new meal attendance!</div>');
    redirect('meal_attendance');
  }
}
