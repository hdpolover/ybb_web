<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

use chriskacerguis\RestServer\RestController;

class Payment extends RestController
{

    public function __construct()
    {
        // code...
        parent::__construct();
        $this->load->model('payment_model', 'payment');
        $this->load->model('participant_model', 'participant');
    }

    public function index_get()
    {
        // code...
        $id_participant = $this->get('id_participant');
        $id_payment_type = $this->get('id_payment_type');

        $payment = $this->payment->get_payment_details($id_participant, $id_payment_type);

        if ($payment) {
            // code...
            $this->response([
                'status' => true,
                'data' => $payment
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
        $time = strtotime($this->post('payment_date'));
        $id = $this->post('id_participant');

        $payment_date = date('Y-m-d', $time);

        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $newPath = './assets/img/payments/' . $this->post('id_payment_type') . '/';

            if (!is_dir($newPath)) {
                mkdir($newPath, 0777, TRUE);
            }

            $config['upload_path'] = $newPath; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = '10000';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $payment_data
                    = array(
                        'id_participant' =>  $id,
                        'id_payment_type' =>  $this->post('id_payment_type'),
                        'bank_name' =>  $this->post('bank_name'),
                        'account_name' =>  $this->post('account_name'),
                        'amount' =>  $this->post('amount'),
                        'payment_date' => $payment_date,
                        'payment_proof' => $upload_image,
                        'check_status' => 0,
                        'payment_status' => 0,
                    );

                $res = $this->payment->add_payment($payment_data);

                if ($this->post('id_payment_type') == 1) {
                    $this->send_email_regist($id);
                }

                if ($res > 0) {
                    // code...
                    $this->response([
                        'status' => true,
                        'message' => 'payment added'
                    ],  RestController::HTTP_CREATED);
                } else {
                    // code...
                    $this->response([
                        'status' => false,
                        'message' => 'failed to register'
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

    public function send_email_regist($id)
    {
        $participant = $this->participant->get_participant_detail($id);
        $from_email = "istanbulyouthsummit@gmail.com";
        $to_email = $participant[0]['email'];
        $to_name = $participant[0]['full_name'];

        $subject = "Registration Fee Payment Submission Notice";
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
      $mail->MsgHTML(' <div style="margin: 0; padding: 0;">
                <style type="text/css">
                    a[x-apple-data-detectors] {
                        color: inherit !important;
                    }
                </style>
                <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td style="padding: 20px 0 30px 0;">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse; border: 1px solid #dca823;">
                                <tr>
                                    <td align="center" bgcolor="#dca823" style="padding: 40px 0 30px 0; color:#000000; ">
                                        <h1 style=" font-family: Arial, sans-serif;font-size: 24px; margin: 0; color:#000000; ">Registration Fee Payment Submission</h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#000000" style="padding: 40px 30px 0px 30px;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                            <tr>
                                                <td style="color: #dca823; font-family: Arial, sans-serif;">
                                                    <h1 style="font-size: 24px; margin: 0;">Congratulations, ' . $to_name . '!</h1>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 0 0;">
                                                    <p style="margin: 0; color:#ffffff; text-align:justify;">
                                                        We have received your submission of the registration fee payment for the 5th Istanbul Youth Summit. Your payment will be processed by our team very soon.
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 0 0;">
                                                    <p style="margin: 0; color:#ffffff; text-align:justify;">
                                                        This email is proof that you have successfully submitted the payment. Please kindly wait for further information from us. We will let you know once your payment is validated.
                                                    </p>
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
                                                    <img src="https://ybbfoundation.com/assets/img/iys_logo_white.png" alt="The 5th Istanbul Youth Summit Logo" width="200" height="70" style="padding: 20px 20px;" />
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
                                                    <p style="margin: 0; color:#000000; ">&reg; The 5th Istanbul Youth Summit @ 2021 - 2022<br />
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
            //echo 'Message has been sent';
            return 1;
        } catch (Exception $e) {
            //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"
            return 0;
        }
    }
}
