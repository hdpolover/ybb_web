<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agreement_letter extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('agreement_letter_model', 'agreement_letter');
  }

  public function index()
  {
    $data['title'] = 'Agreement Letter';
    $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();
    $data['agreement_letters'] = $this->agreement_letter->get_al();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('agreement_letter/index', $data);
    $this->load->view('templates/footer');
  }

  public function detail($id)
  {
    $data['title'] = 'Agreement Letter Details';
    $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();
    $data['agreement_letters'] = $this->agreement_letter->get_al($id);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('agreement_letter/detail', $data);
    $this->load->view('templates/footer');
  }

  
}
