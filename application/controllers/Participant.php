<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

class Participant extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Participant_model', 'participant');
        $this->load->library('form_validation');
    }

    public function index()
    {
        // code...
        $data['title'] = 'Data Peserta';
        $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();
        //$data['peserta'] = $this->Peserta_model->campurData();
        $data['participants'] = $this->participant->get_participants();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('participant/index', $data);
        $this->load->view('templates/footer');

        //$this->send_email("0FkIptVWVifKb9sHqhvsWDDVinx2", "Hendra");
        //$this->load->view('auth/form');
    }

    public function send_email($id, $name)
    {
        $participant = $this->participant->get_participant_detail($id);
        $from_email = "istanbulyouthsummit@gmail.com";
        //$to_email = $participant[0]['email']; 
        $to_email = "hendrapolover@gmail.com";
        $subject = "Registration Fee Payment Submission Notice";
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'ssl://smtp.googlemail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'istanbulyouthsummit@gmail.com';                     //SMTP username
            $mail->Password   = 'iysybb16';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('istanbulyouthsummit@gmail.com', 'The 5th Istanbul Youth Summit');
            $mail->addAddress($to_email);     //Add a recipient

            //Attachments
            //$mail->addAttachment('./assets/img/logo.png', 'Logo');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = '<div style="margin: 0; padding: 0;">
      <style type="text/css">
          a[x-apple-data-detectors] {
              color: inherit !important;
          }
      </style>
      <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
          <tr>
              <td style="padding: 20px 0 30px 0;">
                  <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse; border: 1px solid #cccccc;">
                      <tr>
                          <td align="center" bgcolor="#dca823" style="padding: 40px 0 30px 0;">
                              <h1 style=" font-family: Arial, sans-serif;font-size: 24px; margin: 0; color:#000000;">Registration Form Completion</h1>
                          </td>
                      </tr>
                      <tr>
                          <td bgcolor="#000000" style="padding: 40px 30px 0px 30px;">
                              <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                  <tr>
                                      <td style="color: #dca823; font-family: Arial, sans-serif;">
                                          <h1 style="font-size: 24px; margin: 0;">Dear, Hendra!</h1>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 0 0;">
                                          <p style="margin: 0; color:#ffffff; text-align:justify;">
                                              Thank you for your interest in participating in the 5th Istanbul Youth Summit. Your registration form is complete. Now you can proceed with the registration fee payment.
                                          </p>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 0 0;">
                                          <p style="margin: 0; color:#ffffff; text-align:justify;">
                                              The registration fee is <b>10 USD</b> or <b>125.000 IDR</b>. Once the payment has been made, upload the payment proof on the YBB app. Below is the payment account information of the 5th Istanbul Youth Summit:
                                          </p>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td style="padding: 20px 0px 0px 0px;">
                                          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; border: 1px solid #ffffff;">
                                              <thead>
                                                  <tr>
                                                      <th style="padding: 10px 10px; color: #cccccc; font-family: Arial, sans-serif; font-size: 14px; vertical-align: middle; border-color: #ffffff; border-style: solid; border-width: 1px;" align="center" colspan="3">
                                                          <p style="margin: 0; color:#ffffff">Bank Transfer <b>(*Indonesians only)</b></p>
                                                      </th>
                                                  </tr>
                                                  <tr>
                                                      <th style=" padding: 10px 10px;color: #cccccc; font-family: Arial, sans-serif; font-size: 14px; vertical-align: middle; border-color: #ffffff; border-style: solid; border-width: 1px;" align="center">
                                                          <p style="margin: 0; color:#ffffff">Bank name</p>
                                                      </th>
                                                      <th style=" padding: 10px 10px;color: #cccccc; font-family: Arial, sans-serif; font-size: 14px; vertical-align: middle; border-color: #ffffff; border-style: solid; border-width: 1px;" align="center">
                                                          <p style="margin: 0; color:#ffffff">Account Holder Name</p>
                                                      </th>
                                                      <th style=" padding: 10px 10px;color: #cccccc; font-family: Arial, sans-serif; font-size: 14px; vertical-align: middle; border-color: #ffffff; border-style: solid; border-width: 1px;" align="center">
                                                          <p style="margin: 0; color:#ffffff">Account Number</p>
                                                      </th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                  <tr>
                                                      <td style=" padding: 10px 10px;color: #cccccc; font-family: Arial, sans-serif; font-size: 14px; vertical-align: middle; border-color: #ffffff; border-style: solid; border-width: 1px;" align="center">
                                                          <p style="margin: 0; color:#ffffff">Bank Central Asia (BCA)</p>
                                                      </td>
                                                      <td style="padding: 10px 10px; color: #cccccc; font-family: Arial, sans-serif; font-size: 14px; vertical-align: middle; border-color: #ffffff; border-style: solid; border-width: 1px;" align="center">
                                                          <p style="margin: 0; color:#ffffff">Meldi Latifah Saraswati</p>
                                                      </td>
                                                      <td style="padding: 10px 10px; color: #cccccc; font-family: Arial, sans-serif; font-size: 14px; vertical-align: middle; border-color: #ffffff; border-style: solid; border-width: 1px;" align="center">
                                                          <p style="margin: 0; color:#ffffff">0374505145</p>
                                                      </td>
                                                  </tr>
                                              </tbody>
                                          </table>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td style="padding: 20px 0px 0px 0px;">
                                          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; border: 1px solid #ffffff;">
                                              <thead>
                                                  <tr>
                                                      <th style="padding: 10px 10px; color: #cccccc; font-family: Arial, sans-serif; font-size: 14px; vertical-align: middle; border-color: #ffffff; border-style: solid; border-width: 1px;" align="center" colspan="2" rowspan="2">
                                                          <p style="margin: 0; color:#ffffff">PayPal</p>
                                                      </th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                  <tr>
                                                      <td style="padding: 10px 10px; color: #cccccc; font-family: Arial, sans-serif; font-size: 14px; vertical-align: middle; border-color: #ffffff; border-style: solid; border-width: 1px;" align="center">
                                                          <p style="margin: 0; color:#ffffff">paypal.me/aldisubakti</p>
                                                      </td>
                                                      <td style="padding: 10px 10px; color: #cccccc; font-family: Arial, sans-serif; font-size: 14px; vertical-align: middle; border-color: #ffffff; border-style: solid; border-width: 1px;" align="center">
                                                          <p style="margin: 0; color:#ffffff">Subaktialdi88@gmail.com</p>
                                                      </td>
                                                  </tr>
                                              </tbody>
                                          </table>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 0 0;">
                                          <p style="margin: 0; color:#ffffff; text-align:justify;">
                                              If you have any questions about the 5th Istanbul Youth Summit, you can contact us at (+62 812 1846 3506) or reply this email.
                                          </p>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 0 0;">
                                          <p style="margin: 0; color:#ffffff;">
                                              Best regards,
                                          </p>
                                          <p style="margin: 0; color:#ffffff;">
                                              The 5th Istanbul Youth Summit Team
                                          </p>
                                      </td>

                                  </tr>
                                  <tr>
                                      <td align="center">
                                          <img src="https://ybbfoundation.com/assets/img/iys_logo_white.png" alt="The 5th Istanbul Youth Summit" width="200" height="70" style="padding: 20px 20px;" />
                                      </td>
                                  </tr>
                              </table>
                          </td>
                      </tr>
                      <tr>
                          <td bgcolor="#dca823" style="padding: 30px 30px;">
                              <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                  <tr>
                                      <td style="color: #000000; font-family: Arial, sans-serif; font-size: 14px;" align="center">
                                          <p style="margin: 0;">&reg; The 5th Istanbul Youth Summit @ 2021 - 2022<br />
                                      </td>
                                  </tr>
                                  <tr>
                                      <td align="center">
                                          <a href="https://iys.youthbreaktheboundaries.com/" target="_blank">www.iys.youthbreaktheboundaries.com</a><br>
                                      </td>
                                  </tr>
                              </table>
                          </td>
                      </tr>
                  </table>
              </td>
          </tr>
      </table>
  </div>';
            //     $mail->Body    = ' <div style="margin: 0; padding: 0;">
            //     <style type="text/css">
            //         a[x-apple-data-detectors] {
            //             color: inherit !important;
            //         }
            //     </style>
            //     <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
            //         <tr>
            //             <td style="padding: 20px 0 30px 0;">
            //                 <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse; border: 1px solid #dca823;">
            //                     <tr>
            //                         <td align="center" bgcolor="#dca823" style="padding: 40px 0 30px 0; color:#000000; ">
            //                             <h1 style=" font-family: Arial, sans-serif;font-size: 24px; margin: 0; color:#000000; ">Registration Fee Payment Submission</h1>
            //                         </td>
            //                     </tr>
            //                     <tr>
            //                         <td bgcolor="#000000" style="padding: 40px 30px 0px 30px;">
            //                             <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
            //                                 <tr>
            //                                     <td style="color: #dca823; font-family: Arial, sans-serif;">
            //                                         <h1 style="font-size: 24px; margin: 0;">Congratulations, Hendra!</h1>
            //                                     </td>
            //                                 </tr>
            //                                 <tr>
            //                                     <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 0 0;">
            //                                         <p style="margin: 0; color:#ffffff; text-align:justify;">
            //                                             We have received your submission of the registration fee payment for the 5th Istanbul Youth Summit. Your payment will be processed by our team very soon.
            //                                         </p>
            //                                     </td>
            //                                 </tr>
            //                                 <tr>
            //                                     <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 0 0;">
            //                                         <p style="margin: 0; color:#ffffff; text-align:justify;">
            //                                             This email is proof that you have successfully submitted the payment. Please kindly wait for further information from us. We will let you know once your payment is validated.
            //                                         </p>
            //                                     </td>
            //                                 </tr>
            //                                 <tr>
            //                                     <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 0 0;">
            //                                         <p style="margin: 0; color:#ffffff; text-align:justify;">
            //                                             If you have any questions about the 5th Istanbul Youth Summit, you can contact us at (+62 812 1846 3506) or reply this email.
            //                                         </p>
            //                                     </td>
            //                                 </tr>
            //                                 <tr>
            //                                     <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 0 0;">
            //                                         <p style="margin: 0; color:#ffffff;">
            //                                             Best regards,
            //                                         </p>
            //                                         <p style="margin: 0; color:#ffffff;">
            //                                             The 5th Istanbul Youth Summit Team
            //                                         </p>
            //                                     </td>

            //                                 </tr>
            //                                 <tr>
            //                                     <td align="center">
            //                                         <img src="https://ybbfoundation.com/assets/img/iys_logo_white.png" alt="The 5th Istanbul Youth Summit Logo" width="200" height="70" style="padding: 20px 20px;" />
            //                                     </td>
            //                                 </tr>
            //                             </table>
            //                         </td>
            //                     </tr>
            //                     <tr>
            //                         <td bgcolor="#dca823" style="padding: 30px 30px;">
            //                             <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
            //                                 <tr>
            //                                     <td style="color: #000000; font-family: Arial, sans-serif; font-size: 14px;" align="center">
            //                                         <p style="margin: 0; color:#000000; ">&reg; The 5th Istanbul Youth Summit @ 2021 - 2022<br />
            //                                     </td>
            //                                 </tr>
            //                                 <tr>
            //                                     <td align="center">
            //                                         <a href="https://iys.youthbreaktheboundaries.com/" target="_blank">www.iys.youthbreaktheboundaries.com</a><br>
            //                                     </td>
            //                                 </tr>
            //                             </table>
            //                         </td>
            //                     </tr>
            //                 </table>
            //             </td>
            //         </tr>
            //     </table>
            // </div>';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function detail($id)
    {
        // code...
        $data['title'] = 'Detail Peserta';
        $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();
        $data['participants'] = $this->participant->get_participant_detail($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('participant/detail', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        // code...
        $data['title'] = 'Add Participant';
        $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();
        $data['subtheme'] = ['Economy', 'Education', 'Public Policy', 'Mental Health'];
        $data['veget'] = ['1', '0'];
        $data['tshirt'] = ['XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL'];
        $data['program'] = ['WhatsApp', 'Facebook', 'Instagram', 'Twitter', 'Website', 'Other'];
        $data['gender'] = ['M', 'F'];
        $data['summits'] = $this->participant->getSummit();

        $this->form_validation->set_rules('fullname', 'Full Name', 'required');

        if ($this->form_validation->run() == false) {
            // code...
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('participant/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            // code...
            $this->participant->addParticipant();
            $this->session->set_flashdata('flash', 'Added');
            redirect('participant');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Form Edit Participant';
        $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();
        $data['participant'] = $this->participant->get_participant_detail($id);
        $data['subtheme'] = ['Economy', 'Education', 'Public Policy', 'Mental Health'];
        $data['veget'] = ['1', '0'];
        $data['tshirt'] = ['XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL'];
        $data['program'] = ['WhatsApp', 'Facebook', 'Instagram', 'Twitter', 'Website', 'Other'];
        $data['gender'] = ['M', 'F'];

        $this->form_validation->set_rules('fullname', 'Full Name', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('participant/edit', $data);
            $this->load->view('templates/footer');
        } else {
            // code...
            $this->participant->editParticipant($id);
            $this->session->set_flashdata('flash', 'Updated');
            redirect('participant');
        }
    }

    public function full()
    {
        $data['title'] = 'Fully Funded Participants';
        $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();
        $data['participants'] = $this->participant->get_fullParticipants();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('participant/full', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_full()
    {
        $data['title'] = 'Fully Funded Participants';
        $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();
        $data['participants'] = $this->participant->addlist_fullParticipants();
        $data['summits'] = $this->participant->getSummit();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('participant/tambahfull', $data);
        $this->load->view('templates/footer');
    }

    public function tambahin($id)
    {
        // code...
        $this->participant->add_fullParticipants($id);
        redirect('participant/full');
    }
}
