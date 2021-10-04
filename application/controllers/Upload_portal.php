<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload_portal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('doc_management_model', 'doc_management');
        $this->load->model('agreement_letter_model', 'agreement_letter');
    }

    public function index()
    {
        $data['title'] = 'Upload Portal';
        $this->load->view('templates/summit_docs_header', $data);
        $this->load->view('upload_portal/index');
        $this->load->view('templates/summit_docs_footer');
    }

    public function result()
    {
        $email = $this->input->post('email');
        $data['title'] = 'Upload Portal';
        $res = $this->doc_management->get_data_by_email($email);

        $full_name = $res[0]['full_name'];
        $institution = $res[0]['institution'];
        $status = $res[0]['status'];
        $id = $res[0]['id_participant'];
        $email = $res[0]['email'];

        if ($full_name == null || $status < 2) {
            $this->session->set_flashdata('message', '<div class ="alert alert-danger" style="text-align-center" role ="alert">Sorry. We can\'t seem to find an eligible 5th Istanbul Youth Summit delegate for the submitted email!</div>');
            redirect('upload_portal');
        } else {
            $data = $this->agreement_letter->check_al($id);
            //echo(empty($data) );

            if (!empty($data)) {
                $this->session->set_flashdata('message', '<div class ="alert alert-info" style="text-align-center" role ="alert">You have already submitted the agreement letter.</div>');
                redirect('upload_portal');
            } else {
                $data['title'] = 'Upload Portal';
                $data['full_name'] = $full_name;
                $data['institution'] = $institution;
                $data['id_participant'] = $id;
                $data['email'] = $email;

                $this->load->view('templates/summit_docs_header', $data);
                $this->load->view('upload_portal/list', $data);
                $this->load->view('templates/summit_docs_footer');
            }
        }
    }

    public function save_al()
    {
        $data['title'] = 'Upload Portal';
        $id = $this->input->post('id_participant');
        $full_name = $this->input->post('full_name');

        $name = strtoupper(str_replace(' ', '_', trim($full_name)));

        $upload_image = $_FILES['image']['name'];
        $fileExt = pathinfo($upload_image, PATHINFO_EXTENSION);
        $new_file_name = $name . "_AL." . $fileExt;

        if ($fileExt != "pdf") {
            $this->session->set_flashdata('message', '<div class ="alert alert-danger" style="text-align-center" role ="alert">Please choose a PDF file. Try again.</div>');
            redirect('upload_portal');
        } else {
            if ($upload_image) {
                $newPath = './assets/img/docs/al/';

                if (!is_dir($newPath)) {
                    mkdir($newPath, 0777, TRUE);
                }

                $config['upload_path'] = $newPath; //path folder
                $config['allowed_types'] = 'pdf';
                $config['max_size']      = '10000';
                $config['file_name'] = $new_file_name;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $data = array(
                        'file_path' => $new_file_name,
                        'id_participant' =>  $id,
                    );

                    $this->db->insert('agreement_letters', $data);

                    $this->session->set_flashdata('message', '<div class ="alert alert-success" style="text-align-center" role ="alert">Congratulations! Agreement letter successfully submitted!</div>');
                    redirect('upload_portal/index');
                } else {
                    echo $this->upload->display_errors();
                }
            }
        }
    }
}
