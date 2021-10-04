<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->model('participant_model', 'participant');
    $this->load->model('chart_model', 'chart');
    $this->load->model('payment_model', 'payment');
  }


  public function index()
  {
    // code...
    $data['title'] = 'Dashboard';
    $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();
    $data['participant_total'] = $this->participant->get_participant_total_count();
    $data['fixed_participant_total'] = $this->participant->get_fixed_participant_total_count();
    $data['valid_participant_total'] = $this->participant->get_valid_participant_total_count();
    $data['pending_payment_total'] = $this->payment->get_pending_payment_total_count();
    $data['gender'] = $this->chart->get_gender();
    $data['nationality'] = $this->chart->get_nationality();
    $data['subtheme'] = $this->chart->get_subtheme();
    $data['age'] = $this->chart->get_age();
    $data['register_per_day'] = $this->chart->get_register_per_day();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('dashboard/index', $data);
    $this->load->view('templates/footer', $data);
  }

  // public function get_gender_data()
  // {
  //   $data = $this->chart->get_gender();
  //   echo json_encode($data);
  // }
}
