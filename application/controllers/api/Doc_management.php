<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Doc_management extends RestController
{

    public function __construct()
    {
        // code...
        parent::__construct();
        $this->load->model('doc_management_model', 'doc_management');
    }

    public function index_get()
    {
        // code...
        $id = $this->get('id_participant');

        $res = $this->doc_management->get_data($id);

        $full_name = $res[0]['full_name'];
        $institution = $res[0]['institution'];

        $data = array(
            //'full_name'=> preg_replace("/[^a-zA-Z0-9\s]/", "", $full_name),
            'full_name' => strtoupper($full_name),
            'institution' => strtoupper($institution),
        );

        $this->generateLoa($data);

        if ($res) {
            // code...
            $this->response([
                'status' => true,
                'data' => $res
            ],  RestController::HTTP_OK);
        } else {
            // code...
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ],  RestController::HTTP_NOT_FOUND);
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
}
