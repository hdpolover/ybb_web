<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->model('Admin_model', 'admin');
    $this->load->model('summit_model', 'summit');
    //$this->load->library('form_validation');
  }

  public function index()
  {
    // code...
    $data['title'] = 'Data Admin';
    $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();
    $data['admins'] = $this->admin->get_admins();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin_management/index', $data);
    $this->load->view('templates/footer');
  }

  public function detail($id)
  {
    // code...
    $data['title'] = 'Detail Peserta';
    $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();
    $data['peserta'] = $this->peserta->getPesertaById($id);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('peserta/detail', $data);
    $this->load->view('templates/footer');
  }

  public function hapus($id)
  {
    // code...
    $this->peserta->hapusPeserta($id);
    redirect('peserta');
  }

  public function add_new_admin()
  {
    $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();
    $data['summits'] = $this->summit->get_summit();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin_management/add', $data);
    $this->load->view('templates/footer');
  }

  public function edit_admin($id)
  {
    $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();
    $data['summits'] = $this->summit->get_summit();
    $data['admin'] = $this->admin->get_admins($id);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin_management/edit', $data);
    $this->load->view('templates/footer');
  }

  public function save()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $id_summit = $this->input->post('summit');
    $status = $this->input->post('status');

    $data = array(
      'username' => $username,
      'password' => $password,
      'id_summit' => $id_summit,
      'status' => $status,
      'image'=> 'default.jpg',
    );

    $this->admin->add_admin($data);

    $this->session->set_flashdata('message', '<div class ="alert alert-success" style="text-align-center" role ="alert">New admin added!</div>');
    redirect('admin');
  }

  public function edit()
  {
    $id_admin = $this->input->post('id_admin');
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $id_summit = $this->input->post('summit');
    $status = $this->input->post('status');

    $data = array(
      'id_admin' => $id_admin,
      'username' => $username,
      'password' => $password,
      'id_summit' => $id_summit,
      'status' => $status,
      'image'=> 'default.jpg',
    );

    $this->admin->update_admin($data);

    $this->session->set_flashdata('message', '<div class ="alert alert-success" style="text-align-center" role ="alert">Admin updated!</div>');
    redirect('admin');
  }
}
