<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Summit_day extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Participant_model', 'participant');
    $this->load->model('summit_day_model', 'summit_day');
    $this->load->model('summit_model', 'summit');
    //$this->load->library('form_validation');
  }

  public function index()
  {
    $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();
    $data['summit_days'] = $this->summit_day->get_summit_day();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('summit_day/index', $data);
    $this->load->view('templates/footer');
  }

  public function add_summit_day()
  {
    $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();
    $data['summit'] = $this->summit->get_summit();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('summit_day/add_summit_day');
    $this->load->view('templates/footer');
  }

  public function save_new_sd()
  {
    $id_summit = $this->input->post('id_summit');
    $description = $this->input->post('description');
    $day_date = $this->input->post('day_date');

    $data = array(
      'id_summit' => $id_summit,
      'description' => $description,
      'day_date' => $day_date,
    );

    $this->summit_day->create_summit_day($data);

    $this->session->set_flashdata('message', '<div class ="alert alert-success" style="text-align-center" role ="alert">Added new summit day!</div>');
    redirect('summit_day');
  }

  public function edit_sd($id)
  {
    // code...
    $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();
    $data['summit_days'] = $this->summit_day->get_summit_day($id);
    $data['summits'] = $this->summit->get_summit();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('summit_day/edit', $data);
    $this->load->view('templates/footer');
  }

  public function update_sd()
  {
    $id_summit_day = $this->input->post('id_summit_day');
    $id_summit = $this->input->post('id_summit');
    $description = $this->input->post('description');
    $day_date = $this->input->post('day_date');

    $data = array(
      'id_summit' => $id_summit,
      'description' => $description,
      'day_date' => $day_date,
      'id_summit_day' => $id_summit_day,
    );

    $this->summit_day->save_update($data);

    $this->session->set_flashdata('message', '<div class ="alert alert-success" style="text-align-center" role ="alert">Updated <?php echo $description; ?>!</div>');
    redirect('summit_day/index');
  }
}
