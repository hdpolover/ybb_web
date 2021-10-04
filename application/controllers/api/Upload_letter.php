<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

use chriskacerguis\RestServer\RestController;

class Upload_letter extends RestController
{

    public function __construct()
    {
        // code...
        parent::__construct();
        $this->load->model('participant_model', 'participant');
    }

    public function index_get()
    {
        // code...
        $id_participant = $this->get('id_participant');

        $query = "SELECT * from agreement_letters where id_participant='$id_participant'";
        $upload = $this->db->query($query)->result_array();

        if ($upload) {
            // code...
            $this->response([
                'status' => true,
                'data' => $upload
            ],  RestController::HTTP_OK);
        } else {
            // code...
            $this->response([
                'status' => false,
                'message' => 'file not found'
            ],  RestController::HTTP_NOT_FOUND);
        }
    }

    public function index_post()
    {
        $id = $this->post('id_participant');

        $data = $this->participant->get_participant_detail($id);
        $full_name = strtoupper(str_replace(' ', '_', trim($data[0]['full_name'])));
    
        $upload_image = $_FILES['image']['name'];
        $new_file_name = $full_name . "_AL.". pathinfo($upload_image, PATHINFO_EXTENSION);

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
                $data
                    = array(
                        'id_participant' =>  $id,
                        'file_path' => $new_file_name,
                    );

                $this->db->insert('agreement_letters', $data);
                $res = $this->db->affected_rows();

                if ($res > 0) {
                    // code...
                    $this->response([
                        'status' => true,
                        'message' => 'file uploaded'
                    ],  RestController::HTTP_CREATED);
                } else {
                    // code...
                    $this->response([
                        'status' => false,
                        'message' => 'failed to upload'
                    ],  RestController::HTTP_BAD_REQUEST);
                }
            } else {
                echo $this->upload->display_errors();
            }
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to upload'
            ],  RestController::HTTP_BAD_REQUEST);
        }
    }
}
