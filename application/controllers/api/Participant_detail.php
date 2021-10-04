<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

use chriskacerguis\RestServer\RestController;

class Participant_detail extends RestController
{

  public function __construct()
  {
    // code...
    parent::__construct();
    $this->load->model('participant_model', 'participant');

    $this->methods['index_get']['limit'] = 1000;
  }

  public function index_get()
  {
    // code...
    $id = $this->get('id_participant');
    if ($id === NULL) {
      // code...
      $participant = $this->participant->get_participant_detail();
    } else {
      // code...
      $participant = $this->participant->get_participant_detail($id);
    }

    if ($participant) {
      // code...
      $this->response([
        'status' => true,
        'data' => $participant
      ],  RestController::HTTP_OK);
    } else {
      // code...
      $this->response([
        'status' => false,
        'message' => 'id not found'
      ],  RestController::HTTP_NOT_FOUND);
    }
  }

  public function index_post()
  {
    $param = $this->post();
    $id = $param['id_participant'];

    $upload_image = $_FILES['image']['name'];

    if ($upload_image) {
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $config['max_size']      = '10000';
      $config['upload_path'] = './assets/img/profile/participants/';

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('image')) {
        $data = [
          'id_participant' => $id,
          'photo' => $upload_image,
          'full_name' => $param['full_name'],
          'birthdate' => $param['birthdate'],
          'gender' => $param['gender'],
          'address' => $param['address'],
          'nationality' => $param['nationality'],
          'occupation' => $param['occupation'],
          'field_of_study' => $param['field_of_study'],
          'institution' => $param['institution'],
          'emergency_contact' => $param['emergency_contact'],
          'wa_number' => $param['wa_number'],
          'ig_account' => $param['ig_account'],
          'tshirt_size' => $param['tshirt_size'],
          'disease_history' => $param['disease_history'],
          'contact_relation' => $param['contact_relation'],
          'is_vegetarian' => $param['is_vegetarian'],
          'subtheme' => $param['subtheme'],
          'essay' => $param['essay'],
          'social_projects' => $param['social_projects'],
          'talents' => $param['talents'],
          'achievements' => $param['achievements'],
          'experiences' => $param['experiences'],
          'know_program_from' => $param['know_program_from'],
          'source_account_name' => $param['source_account_name'],
          'video_link' => $param['video_link'],
          'referral_code' => $param['referral_code'],
        ];

        $res = $this->participant->add_participant_details($data);
        $participant = $this->participant->get_participant_detail($id);

        //send email
        $this->send_email($id, $param['full_name']);

        if ($res > 0) {
          // code...
          $this->response([
            'status' => true,
            'data' => $participant,
            'message' => 'participant details added'
          ],  RestController::HTTP_CREATED);
        } else {
          // code...
          $this->response([
            'status' => false,
            'message' => 'failed adding participant details'
          ],  RestController::HTTP_BAD_REQUEST);
        }
      } else {
        echo $this->upload->display_errors();
      }
    } else {
      $this->response([
        'status' => false,
        'message' => 'failed to register'
      ],  RestController::HTTP_BAD_REQUEST);
    }
  }


  public function send_email($id, $name)
  {
    $participant = $this->participant->get_participant_detail($id);
    $from_email = "istanbulyouthsummit@gmail.com";
    $to_email = $participant[0]['email'];

    $subject = "Registration Form Completion Notice";
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
      //Server settings
      $mail = new PHPMailer(true); 
        $mail->IsSMTP();
        $mail->SMTPSecure = 'tls'; 
        $mail->Host = "smtp.gmail.com"; //host masing2 provider email
        $mail->SMTPDebug = 2;
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Username = "istanbulyouthsummit@gmail.com"; //user email
        $mail->Password = "iysybb16"; //password email 
        $mail->SetFrom($from_email, 'The 5th Istanbul Youth Summit'); //set email pengirim
        $mail->Subject = $subject; //subyek email
        $mail->AddAddress($to_email);  //tujuan email

      //Recipients
      $mail->setFrom($from_email, 'The 5th Istanbul Youth Summit');
      $mail->addAddress($to_email);     //Add a recipient

      //Attachments
      //$mail->addAttachment('./assets/img/logo.png', 'Logo');         //Add attachments
      // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = $subject;
      $mail->MsgHTML('<div style="margin: 0; padding: 0;">
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
                                          <h1 style="font-size: 24px; margin: 0;">Dear, ' . $name . '!</h1>
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
                                                          <p style="margin: 0; color:#ffffff">paypal.me/istanbulyouthsummit</p>
                                                      </td>
                                                      <td style="padding: 10px 10px; color: #cccccc; font-family: Arial, sans-serif; font-size: 14px; vertical-align: middle; border-color: #ffffff; border-style: solid; border-width: 1px;" align="center">
                                                          <p style="margin: 0; color:#ffffff">istanbulyouthsummit@gmail.com</p>
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
  </div>');

      $mail->send();
    //   echo 'Message has been sent';
    return 1;
    } catch (Exception $e) {
    //   echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    return 0;
    }
  }
}
