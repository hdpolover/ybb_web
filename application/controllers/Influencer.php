<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Influencer extends CI_Controller

{



    public function __construct()

    {

        parent::__construct();

        is_logged_in();

        $this->load->model('influencer_model', 'influencer');

    }



    public function index()

    {

        $data['title'] = 'Data Influencer';
        $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();

        $data['influencers'] = $this->influencer->get_influencer();



        $this->load->view('templates/header', $data);

        $this->load->view('templates/sidebar', $data);

        $this->load->view('templates/topbar', $data);

        $this->load->view('influencer/index', $data);

        $this->load->view('templates/footer');

    }



    public function add_influencer()

    {

        $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();



        $this->load->view('templates/header', $data);

        $this->load->view('templates/sidebar', $data);

        $this->load->view('templates/topbar', $data);

        $this->load->view('influencer/add', $data);

        $this->load->view('templates/footer');

    }



    public function save_new_influencer()

    {

        //$id_influencer = $this->input->post('id_influencer');

        $full_name = $this->input->post('full_name');

        $institution = $this->input->post('institution');

        $field_of_study = $this->input->post('field_of_study');

        $referral_code = $this->input->post('referral_code');

        $instagram = $this->input->post('instagram');

        $tiktok = $this->input->post('tiktok');

        $status = $this->input->post('status');



        $data = array(

            //'id_influencer' => $id_influencer,

            'tiktok' => $tiktok,

            'instagram' => $instagram,

            'referral_code' => $referral_code,

            'status' => $status,

            'full_name' => $full_name,

            'institution' => $institution,

            'field_of_study' => $field_of_study,

        );



        $this->influencer->add($data);



        $this->session->set_flashdata('message', '<div class ="alert alert-success" style="text-align-center" role ="alert">Added new influencer!</div>');

        redirect('influencer/index');

    }



    public function view($id)

    {

        $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();

        $data['influencers'] = $this->influencer->get_influencer($id);

        $data['referred_participants'] = $this->influencer->get_referred_participant($id);



        $this->load->view('templates/header', $data);

        $this->load->view('templates/sidebar', $data);

        $this->load->view('templates/topbar', $data);

        $this->load->view('influencer/detail', $data);

        $this->load->view('templates/footer');

    }



    public function edit($id)

    {

        $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();

        $data['influencer'] = $this->influencer->get_influencer($id);



        $this->load->view('templates/header', $data);

        $this->load->view('templates/sidebar', $data);

        $this->load->view('templates/topbar', $data);

        $this->load->view('influencer/edit', $data);

        $this->load->view('templates/footer');

    }



    public function save_edit()

    {

        $full_name = $this->input->post('full_name');

        $institution = $this->input->post('institution');

        $field_of_study = $this->input->post('field_of_study');

        $referral_code = $this->input->post('referral_code');

        $instagram = $this->input->post('instagram');

        $tiktok = $this->input->post('tiktok');

        $status = $this->input->post('status');



        $data = array(

            //'id_influencer' => $id_influencer,

            'tiktok' => $tiktok,

            'instagram' => $instagram,

            'referral_code' => $referral_code,

            'status' => $status,

            'full_name' => $full_name,

            'institution' => $institution,

            'field_of_study' => $field_of_study,

        );



        $this->influencer->save_edit($data);



        $this->session->set_flashdata('message', '<div class ="alert alert-success" style="text-align-center" role ="alert">Updated influencer!</div>');

        redirect('influencer/index');

    }

}



