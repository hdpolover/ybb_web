<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Others extends CI_Controller
{
    public function __construct()
    {
        // code...
        parent::__construct();
        is_logged_in();

        $this->load->library('form_validation');
        $this->load->model('summit_model', 'summit');
        $this->load->model('timeline_model', 'timeline');
        $this->load->model('payment_type_model', 'payment_type');
    }

    public function index_summits()
    {
        // // code...
        $data['title'] = 'Summits';
        $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();
        $data['summits'] = $this->summit->get_summit();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('others/summits', $data);
        $this->load->view('templates/footer');
    }

    public function index_payment_types()
    {
        // // code...
        $data['title'] = 'Payment Types';
        $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();
        $data['payment_types'] = $this->payment_type->get_payment_type();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('others/payment_types', $data);
        $this->load->view('templates/footer');
    }

    public function add_new_summit()
    {
        // code...
        $data['title'] = 'Add New Summit';
        $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('others/add_summit', $data);
        $this->load->view('templates/footer');
    }

    public function create_new_summit()
    {
        $desc = $this->input->post('desc');
        $regist_fee = $this->input->post('regist_fee');
        $program_fee = $this->input->post('program_fee');
        $status = $this->input->post('status');

        $summit_data = array(
            'desc' => $desc,
            'regist_fee' => $regist_fee,
            'program_fee' => $program_fee,
            'status' => $status
        );

        $this->summit->create_summit($summit_data);

        $this->session->set_flashdata('message', '<div class ="alert alert-success" style="text-align-center" role ="alert"> Congratulations! You successfully created a new summit.</div>');
        redirect('others/index_summits');
    }

    public function edit_summit($id)
    {
        // code...
        $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();
        $data['summit'] = $this->summit->get_summit($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('others/edit_summit', $data);
        $this->load->view('templates/footer');
    }

    public function update_summit()
    {
        $id_summit = $this->input->post('id_summit');
        $desc = $this->input->post('desc');
        $regist_fee = $this->input->post('regist_fee');
        $program_fee = $this->input->post('program_fee');
        $status = $this->input->post('status');
        $regist_status = $this->input->post('regist_status');

        $summit_data = array(
            'id_summit' => $id_summit,
            'description' => $desc,
            'regist_fee' => $regist_fee,
            'program_fee' => $program_fee,
            'status' => $status,
            'regist_status' => $regist_status,
        );

        $this->summit->save_update($summit_data);

        $this->session->set_flashdata('message', '<div class ="alert alert-success" style="text-align-center" role ="alert">Updated <?php echo $desc; ?> details.</div>');
        redirect('others/index_summits');
    }

    public function index_timelines()
    {
        $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();
        $data['timelines'] = $this->timeline->get_timeline();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('others/timelines', $data);
        $this->load->view('templates/footer');
    }

    public function view_timeline($id)
    {
        // code...
        $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();
        $data['timeline'] = $this->timeline->get_timeline($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('others/view_timeline', $data);
        $this->load->view('templates/footer');
    }

    public function edit_timeline($id)
    {
        // code...
        $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();
        $data['timeline'] = $this->timeline->get_timeline($id);
        $data['summit'] = $this->summit->get_summit();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('others/edit_timeline', $data);
        $this->load->view('templates/footer');
    }

    public function update_timeline()
    {
        $id_summit_timeline = $this->input->post('id_summit_timeline');
        $description = $this->input->post('description');
        $start_timeline = $this->input->post('start_timeline');
        $end_timeline = $this->input->post('end_timeline');
        $timeline = $this->input->post('timeline');

        $data = array(
            'id_summit_timeline' => $id_summit_timeline,
            'description' => $description,
            'start_timeline' => $start_timeline,
            'end_timeline' => $end_timeline,
            'timeline' => $timeline,
        );

        $this->timeline->save_update($data);

        $this->session->set_flashdata('message', '<div class ="alert alert-success" style="text-align-center" role ="alert">Updated <?php echo $description!; ?> details.</div>');
        redirect('others/index_timelines');
    }

    public function edit_payment_type($id)
    {
        // code...
        $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();
        $data['payment_type'] = $this->payment_type->get_payment_type($id);
        $data['summit'] = $this->summit->get_summit();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('others/edit_payment_type', $data);
        $this->load->view('templates/footer');
    }

    public function update_payment_type()
    {
        $id_payment_type = $this->input->post('id_payment_type');
        $id_summit = $this->input->post('id_summit');
        $description = $this->input->post('description');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $type = $this->input->post('type');

        $data = array(
            'id_summit' => $id_summit,
            'description' => $description,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'type' => $type,
            'id_payment_type' => $id_payment_type,
        );

        $this->payment_type->save_update($data);

        $this->session->set_flashdata('message', '<div class ="alert alert-success" style="text-align-center" role ="alert">Updated <?php echo $description!; ?> details.</div>');
        redirect('others/index_payment_types');
    }

    public function add_new_payment_type()
    {
        // code...
        $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();
        $data['summit'] = $this->summit->get_summit();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('others/add_payment_type', $data);
        $this->load->view('templates/footer');
    }

    public function save_new_pt()
    {
        $id_payment_type = $this->input->post('id_payment_type');
        $id_summit = $this->input->post('id_summit');
        $description = $this->input->post('description');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $type = $this->input->post('type');

        $data = array(
            'id_summit' => $id_summit,
            'description' => $description,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'type' => $type,
            'id_payment_type' => $id_payment_type,
        );

        $this->payment_type->save_new($data);

        $this->session->set_flashdata('message', '<div class ="alert alert-success" style="text-align-center" role ="alert">Added new <?php echo $description!; ?> details.</div>');
        redirect('others/index_payment_types');
    }
}
