<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Meal_type extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Meal_type_model', 'meal_type');
    //$this->load->library('form_validation');
  }

  public function index()
  {
    $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();
    $data['meal_type'] = $this->meal_type->get_meal_type();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('meal_type/index', $data);
    $this->load->view('templates/footer');
  }

  public function add_meal_type()
  {
    $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('meal_type/add_meal_type');
    $this->load->view('templates/footer');
  }

  public function create_new_meal()
  {
    $desc = $this->input->post('desc');

    $meal_data = array(
      'description' => $desc,
    );

    $this->meal_type->create_meal_type($meal_data);

    $this->session->set_flashdata('message', '<div class ="alert alert-success" style="text-align-center" role ="alert">Added new meal type!</div>');
    redirect('meal_type/index');
  }

  public function edit($id)
    {
        // code...
        $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();
        $data['meal_type'] = $this->meal_type->get_meal_type($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('meal_type/edit_meal_type', $data);
        $this->load->view('templates/footer');
    }

    public function update_mt()
    {
        $id_meal_type = $this->input->post('id_meal_type');
        $description = $this->input->post('description');
        $data = array(
            'description' => $description,
            'id_meal_type' => $id_meal_type,
        );

        $this->meal_type->save_update($data);

        $this->session->set_flashdata('message', '<div class ="alert alert-success" style="text-align-center" role ="alert">Updated meal type!</div>');
        redirect('meal_type/index');
    }

}
