<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Summit_docs extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('doc_management_model', 'doc_management');
    }

    public function index()
    {
        $data['title'] = 'Summit Docs';
        $this->load->view('templates/summit_docs_header', $data);
        $this->load->view('summit_docs/index');
        $this->load->view('templates/summit_docs_footer');
    }

    public function result($id = null)
    {
        if ($id == null) {
            $email = $this->input->post('email');
            $data['title'] = 'Summit Docs';
            $data['loa'] = $this->doc_management->get_loa($email);

            if ($data['loa'] == null) {
                $this->session->set_flashdata('message', '<div class ="alert alert-danger" style="text-align-center" role ="alert">Sorry. We can\'t seem to find the 5th Istanbul Youth Summit documents for the submitted email!</div>');
                redirect('summit_docs');
            } else {
                $full_name = strtoupper(str_replace(' ', '_', $data['loa'][0]['full_name']));
                $nama_file = $full_name . '_LOA' . '.pdf';
                $filename = base_url() . 'assets/img/docs/loa/' . $nama_file;
            
                if (realpath(FILE_PATH . $nama_file)) {
                    $this->load->view('templates/summit_docs_header', $data);
                    $this->load->view('summit_docs/result', $data);
                    $this->load->view('templates/summit_docs_footer');
                } else {
                    $this->session->set_flashdata('message', '<div class ="alert alert-danger" style="text-align-center" role ="alert">You are registered in our system, but we can\'t find the 5th Istanbul Youth Summit documents for you. Make sure you have tried downloading them on the YBB app. <br> If you think this is a mistake, contact admin on WhatsApp by clicking <a target="_blank" href="https://wa.me/6281218463506">here.</a></a></div>');
                    redirect('summit_docs');
                }
            }
        } else {
            $data['title'] = 'Summit Docs';
            $data['loa'] = $this->doc_management->get_loa_by_id($id);

            $this->load->view('templates/summit_docs_header', $data);
            $this->load->view('summit_docs/result', $data);
            $this->load->view('templates/summit_docs_footer');
        }
    }
}
