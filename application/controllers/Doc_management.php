<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Doc_management extends CI_Controller

{

    public function __construct()

    {

        parent::__construct();

        is_logged_in();
        $this->load->model('doc_management_model', 'doc_management');
    }



    public function index()

    {

        $data['title'] = 'Document Management';
        $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);

        $this->load->view('templates/sidebar', $data);

        $this->load->view('templates/topbar', $data);

        $this->load->view('doc_management/index', $data);

        $this->load->view('templates/footer');
    }

    public function create_qr_code()
    {
        $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);

        $this->load->view('templates/sidebar', $data);

        $this->load->view('templates/topbar', $data);

        $this->load->view('doc_management/add_qr_code', $data);

        $this->load->view('templates/footer');
    }

    public function save_new_qr_code()

    {
        $email = $this->input->post('email');

        $id = $this->doc_management->get_id($email);

        $this->generateQrCode($id[0]['id_participant']);

        $this->session->set_flashdata('message', '<div class ="alert alert-success" style="text-align-center" role ="alert">QR Code successfully generated!</div>');

        redirect('doc_management/index');
    }

    public function generateQrCode($id)
    {
        $data = isset($_GET['data']) ? $_GET['data'] : $id;
        $size = isset($_GET['size']) ? $_GET['size'] : '300x300';
        $logo = isset($_GET['logo']) ? $_GET['logo'] : './assets/img/logo.png';

        //header('Content-type: image/png');
        // Get QR Code image from Google Chart API
        // http://code.google.com/apis/chart/infographics/docs/qr_codes.html
        $QR = imagecreatefrompng('https://chart.googleapis.com/chart?cht=qr&chld=H|0&chs=' . $size . '&chl=' . urlencode($data));
        if ($logo !== FALSE) {
            $logo = imagecreatefromstring(file_get_contents($logo));

            $QR_width = imagesx($QR);
            $QR_height = imagesy($QR);

            $logo_width = imagesx($logo);
            $logo_height = imagesy($logo);

            // Scale logo to fit in the QR Code
            $logo_qr_width = $QR_width / 3;
            $scale = $logo_width / $logo_qr_width;
            $logo_qr_height = $logo_height / $scale;

            imagecopyresampled($QR, $logo, $QR_width / 3, $QR_height / 3, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
        }
        imagepng($QR, "./assets/img/qr_codes/" . $id . ".png");
        imagedestroy($QR);
    }

    public function create_loa()

    {
        $data['title'] = 'Document Management';

        $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);

        $this->load->view('templates/sidebar', $data);

        $this->load->view('templates/topbar', $data);

        $this->load->view('doc_management/add_loa', $data);

        $this->load->view('templates/footer');
    }


    public function save_new_loa()

    {
        $full_name = $this->input->post('full_name');

        $institution = $this->input->post('institution');

        $data = array(
            //'full_name'=> preg_replace("/[^a-zA-Z0-9\s]/", "", $full_name),
            'full_name' => strtoupper($full_name),
            'institution' => strtoupper($institution),
        );

        $check = $this->generateLoa($data);

        if ($check == "pernah") {
            $this->session->set_flashdata('message', '<div class ="alert alert-danger" style="text-align-center" role ="alert">LoA with the same name exists! </div>');

            redirect('doc_management');
        } else {
            $this->session->set_flashdata('message', '<div class ="alert alert-success" style="text-align-center" role ="alert">LoA successfully generated!</div>');

            redirect('doc_management');
        }
    }

    public function create_loa_by_email()

    {
        $data['title'] = 'Document Management';

        $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);

        $this->load->view('templates/sidebar', $data);

        $this->load->view('templates/topbar', $data);

        $this->load->view('doc_management/add_loa_by_email', $data);

        $this->load->view('templates/footer');
    }


    public function save_new_loa_by_email()

    {
        $email = $this->input->post('email');

        $res = $this->doc_management->get_data_by_email($email);

        $full_name = $res[0]['full_name'];
        $institution = $res[0]['institution'];

        $data = array(
            //'full_name'=> preg_replace("/[^a-zA-Z0-9\s]/", "", $full_name),
            'full_name' => strtoupper($full_name),
            'institution' => strtoupper($institution),
        );

        $check = $this->generateLoa($data);

        if ($check == "pernah") {
            $this->session->set_flashdata('message', '<div class ="alert alert-danger" style="text-align-center" role ="alert">LoA with the same name exists! </div>');

            redirect('doc_management');
        } else {
            $this->session->set_flashdata('message', '<div class ="alert alert-success" style="text-align-center" role ="alert">LoA successfully generated!</div>');

            redirect('doc_management');
        }
    }

    public function generateLoa($data)
    {
        $full_name = strtoupper(str_replace(' ', '_', $data['full_name']));
        $nama_file = $full_name . '_LOA' . '.pdf';

        //$this->load->view('doc_management/loa_template', $data);
        try {
            $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
            $html = $this->load->view('doc_management/loa_template', $data, true);
            $mpdf->WriteHTML(utf8_encode($html));
            // Other code
            if (!realpath(FILE_PATH . $nama_file)) {
                $mpdf->Output(FILE_PATH . $nama_file, 'F');
            } else {
                return "pernah";
            }

            return $nama_file;
            //$mpdf->Output('Laporan_personalia_'.$bulan.'-'.$tp.'.pdf', 'D');
        } catch (\Mpdf\MpdfException $e) { // Note: safer fully qualified exception name used for catch
            // Process the exception, log, print etc.
            echo $e->getMessage();
        }
    }

    public function create_invoice()

    {
        $data['title'] = 'Document Management';

        $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);

        $this->load->view('templates/sidebar', $data);

        $this->load->view('templates/topbar', $data);

        $this->load->view('doc_management/add_invoice', $data);

        $this->load->view('templates/footer');
    }

    public function save_invoice()
    {
        $email = $this->input->post('email');
        $type = $this->input->post('type');
        $nationality = $this->input->post('nationality');

        $this->generate_invoice($email, $type, $nationality);

        $this->session->set_flashdata('message', '<div class ="alert alert-success" style="text-align-center" role ="alert">Invocice generated! </div>');

        redirect('doc_management');
    }

    function initials($str) {
        $first_name = explode(' ', trim($str))[0];
        $rest_name = preg_replace("/^(\w+\s)/", "", $str);
        $ret = '';

        foreach (explode(' ', $rest_name) as $word)
            $ret = $ret . strtoupper($word[0]) . ".";
        
        $name = $first_name . " " . $ret;
        return $name;
    }

    function generate_invoice($email, $type, $nationality)
    {
        $res = $this->doc_management->get_data_by_email($email);

        $full_name = strtoupper($res[0]['full_name']);
        $formatted_name = $this->initials($full_name);

        $currentDate = new DateTime();
        $d = $currentDate->format('M d, Y');        

        $query = "SELECT number from invoices";
        $res = $this->db->query($query)->result_array();
        $inv_number = 'IYS/PF/' . $type . '/' . $res[0]['number'];

        $file_name = str_replace(' ', '_', trim($full_name)) . "_INVOICE_BATCH_" . $type . "_" . $nationality . ".jpg";

        //update invoice number
        $n = $res[0]['number'] + 1;
        $query = "UPDATE invoices SET number = $n WHERE id = 1";
        $this->db->query($query);

        try {
            // Create a new SimpleImage object
            $image = new \claviska\SimpleImage();

            $image
                ->fromFile('assets/img/payments/batch_' . $type . '_' . $nationality . '.jpg')                     // load image.jpg
                ->autoOrient()                              // adjust orientation based on exif data
                ->text(
                    $inv_number,
                    array(
                        'fontFile' => realpath('font.ttf'),
                        'size' => 20,
                        'anchor' => 'top',
                        'xOffset' => 330,
                        'yOffset' => 213,
                    )
                )
                ->text(
                    $formatted_name,
                    array(
                        'fontFile' => realpath('font.ttf'),
                        'size' => 22,
                        'anchor' => 'center',
                        'xOffset' => 120,
                        'yOffset' => -320,
                    )
                )
                ->text(
                    $d,
                    array(
                        'fontFile' => realpath('font.ttf'),
                        'size' => 25,
                        'anchor' => 'center',
                        'xOffset' => -10,
                        'yOffset' => 300,
                    )
                )
                //->toScreen();                               // output to the screen
                ->toFile('assets/img/payments/invoices/' . $type . '/' . $file_name);

            // And much more! 💪
        } catch (Exception $err) {
            // Handle errors
            echo $err->getMessage();
        }
    }
}
