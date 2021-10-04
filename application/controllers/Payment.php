<?php

defined('BASEPATH') or exit('No direct script access allowed');



use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\SMTP;

use PHPMailer\PHPMailer\Exception;



//use phpmailer\classes\PHPMailer;

// require 'application/third_party/phpmailer/classes/class.phpmailer.php';



//Load Composer's autoloader

require 'vendor/autoload.php';



class Payment extends CI_Controller

{



    public function __construct()

    {

        parent::__construct();

        is_logged_in();

        $this->load->model('Payment_model', 'payment');

        $this->load->model('participant_model', 'participant');
        $this->load->model('doc_management_model', 'doc_management');

        //$this->load->library('form_validation');

    }



    public function index()

    {

        // code...

        $data['title'] = 'Participant Payments';

        $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();

        $data['payment'] = $this->payment->get_payment();



        $this->load->view('templates/header', $data);

        $this->load->view('templates/sidebar', $data);

        $this->load->view('templates/topbar', $data);

        $this->load->view('payment/index', $data);

        $this->load->view('templates/footer');
    }



    public function detail($id)

    {

        // code...

        $data['title'] = 'Participant Payment Detail';

        $data['current_admin'] = $this->db->get_where('admins', ['username' => $this->session->userdata('username')])->row_array();

        $data['payment'] = $this->payment->get_payment($id);



        $this->load->view('templates/header', $data);

        $this->load->view('templates/sidebar', $data);

        $this->load->view('templates/topbar', $data);

        $this->load->view('payment/detail', $data);

        $this->load->view('templates/footer');
    }

    public function validate_payment($id)
    {
        $payment = $this->payment->get_payment($id);

        $id_payment_type = $payment[0]['id_payment_type'];

        $id_participant = $payment[0]['id_participant'];

        $participant = $this->participant->get_participant_detail($id_participant);

        $email = $participant[0]['email'];

        $amount = $payment[0]['amount'];

        if ($amount == 140 || $amount == 240) {
            $nationality = "eng";
        } else {
            $nationality = "id";
        }

        if ($id_payment_type == 1) {

            $status = 2;
        } else if ($id_payment_type == 2) {
            $file_name = $this->generate_invoice($email, 1, $nationality);

            $status = 3;
        } else if ($id_payment_type == 3) {
            $file_name = $this->generate_invoice($email, 2, $nationality);

            $status = 4;
        }

        if ($this->send_email($id_participant, $id_payment_type, $file_name) == 1) {

            $payment_data = array(

                'payment_status' => 1,

                'id_admin' =>  $this->session->userdata('id_admin'),

            );

            //update partcipant status
            $data = array(

                'status' => $status

            );

            $this->payment->update_payment($payment_data, $id);

            $this->participant->update_participant_status($data, $id_participant);



            $this->session->set_flashdata('message', '<div class ="alert alert-success" style="text-align-center" role ="alert"> Payment validation success!</div>');

            redirect('payment/index');
        } else {
            $this->session->set_flashdata('message', '<div class ="alert alert-danger" style="text-align-center" role ="alert"> Payment validation failed!</div>');

            redirect('payment/index');
        }
    }

    function generate_invoice($email, $type, $nationality)
    {
        $res = $this->doc_management->get_data_by_email($email);

        $full_name = $res[0]['full_name'];
        $currentDate = new DateTime();
        $d = $currentDate->format('M d, Y');

        $query = "SELECT number from invoices";
        $res = $this->db->query($query)->result_array();
        $inv_number = 'IYS/PF/' . $type . '/' . $res[0]['number'];

        $file_name = strtoupper(str_replace(' ', '_', trim($full_name))) . "_INVOICE_BATCH_" . $type . "_" . $nationality . ".jpg";

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
                    $full_name,
                    array(
                        'fontFile' => realpath('font.ttf'),
                        'size' => 25,
                        'xOffset' => 90,
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

                return $file_name;
            // And much more! 💪
        } catch (Exception $err) {
            // Handle errors
            echo $err->getMessage();
        }
    }



    public function invalidate_payment($id)

    {

        $payment_data = array(

            'payment_status' => 2,

            'id_admin' =>  $this->session->userdata('id_admin'),

        );



        $this->payment->update_payment($payment_data, $id);



        $this->session->set_flashdata('message', '<div class ="alert alert-danger" style="text-align-center" role ="alert"> Payment invalidation success!</div>');

        redirect('payment/index');
    }



    public function send_email($id, $type, $file_name)

    {

        $participant = $this->participant->get_participant_detail($id);

        $from_email = "istanbulyouthsummit@gmail.com";

        $to_email = $participant[0]['email'];

        $to_name = $participant[0]['full_name'];

        if ($type == 1) {
            $subject = "Registration Fee Payment Validation Notice";
            $body = '<div style="margin: 0; padding: 0;">

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
      
                                    <h1 style=" font-family: Arial, sans-serif;font-size: 24px; margin: 0; color:#000000;">Registration Fee Payment Validation</h1>
      
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
      
                                                    We are glad to inform you that your registration fee payment has been validated. You are now a valid participant of the 5th Istanbul Youth Summit.
      
                                                </p>
      
                                            </td>
      
                                        </tr>
      
                                        <tr>
      
                                            <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 0 0;">
      
                                                <p style="margin: 0; color:#ffffff; text-align:justify;">
      
                                                    Attached is an image poster abour your participation in this summit. Take a screenshot or download it, and share it to your Instagram and tag us <a href="https://instagram.com/istanbulyouthsummit" target="_blank">(@istanbulyouthsummit)</a>. You may be featured on our Instagram story.
      
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
      
                                                <p style="margin: 0; color:#ffffff; text-align:justify;">
      
                                                    Let others know that you are ready for the 5th Istanbul Youth Summit. We look forward to seeing you in Istanbul soon.
      
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
        } else if ($type == 2) {
            $subject = "Program Fee Batch 1 Payment Validation Notice";
            $body = '<div style="margin: 0; padding: 0;">

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
      
                                    <h1 style=" font-family: Arial, sans-serif;font-size: 24px; margin: 0; color:#000000;">Program Fee Batch 1 Payment Validation</h1>
      
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
      
                                                    We are glad to inform you that your program fee batch 1 payment has been validated. You will be able to make the payment for the next batch when it is time. You are one step closer to Istanbul! Yay!
      
                                                </p>
      
                                            </td>
      
                                        </tr>
      
                                        <tr>
      
                                            <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 0 0;">
      
                                                <p style="margin: 0; color:#ffffff; text-align:justify;">
      
                                                    Attached is the payment invoice. Take a screenshot or download it, and share it to your Instagram and tag us <a href="https://instagram.com/istanbulyouthsummit" target="_blank">(@istanbulyouthsummit)</a>. You may be featured on our Instagram story.
      
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
      
                                                <p style="margin: 0; color:#ffffff; text-align:justify;">
      
                                                    Let others know that you are ready for the 5th Istanbul Youth Summit. We look forward to seeing you in Istanbul soon.
      
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
        } else if ($type == 3) {
            $subject = "Program Fee Batch 2 Payment Validation Notice";
            $body = '<div style="margin: 0; padding: 0;">

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
      
                                    <h1 style=" font-family: Arial, sans-serif;font-size: 24px; margin: 0; color:#000000;">Program Fee Batch 2 Payment Validation</h1>
      
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
      
                                                    We are glad to inform you that your program fee batch 2 payment has been validated. You will be able to make the payment for the next batch when it is time. You are one step closer to Istanbul! Yay!
      
                                                </p>
      
                                            </td>
      
                                        </tr>
      
                                        <tr>
      
                                            <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 0 0;">
      
                                                <p style="margin: 0; color:#ffffff; text-align:justify;">
      
                                                    Attached is the payment invoice. Take a screenshot or download it, and share it to your Instagram and tag us <a href="https://instagram.com/istanbulyouthsummit" target="_blank">(@istanbulyouthsummit)</a>. You may be featured on our Instagram story.
      
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
      
                                                <p style="margin: 0; color:#ffffff; text-align:justify;">
      
                                                    Let others know that you are ready for the 5th Istanbul Youth Summit. We look forward to seeing you in Istanbul soon.
      
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
        }

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

            if ($type == 1) {
                $mail->addAttachment('./assets/img/Registered_Ticket_EXTENDED.jpg', 'Registered Ticket');
            } else if ($type == 2) {
                $mail->addAttachment('./assets/img/payments/invoices/1/' . $file_name, 'Invoice Batch 1');
            } else if ($type == 3) {
                $mail->addAttachment('./assets/img//payments/invoices/2/' . $file_name, 'Invoice Batch 2');
            }
            //Add attachments

            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name


            //Content

            $mail->isHTML(true);                                  //Set email format to HTML

            $mail->Subject = $subject;

            $mail->MsgHTML($body);


            
            $mail->send();

            //   echo 'Message has been sent';

            return 1;
        } catch (Exception $e) {

            //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

            return 0;
        }
    }
}
