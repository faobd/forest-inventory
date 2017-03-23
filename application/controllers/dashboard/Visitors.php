<?php

    /**
     
     * @package Admin Panel
     * @author     Reazul Islam <reazul@atilimited.net>
     * @copyright  2017 ATI Limited Development Group
     
    */

    if (!defined('BASEPATH')) {
        exit('No direct script access allowed');


     /**
     * Website Class
     *
     * Parses URIs and determines routing
     *
     * @package     Admin Panel
     * @subpackage  Admin Panel
     * @category    Admin Panel
     * @author      Reazul Islam <reazul@atilimited.net>
     *
     */

 }

 class Visitors extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->user_session = $this->session->userdata('user_logged_in');
        if (!$this->user_session) {
            redirect('dashboard/auth/index');
        }
        $this->load->library("form_validation");
        $this->load->model('utilities');
        $this->load->model('Menu_model');
        $this->load->library('upload');
        $this->load->library('csvimport');
        $this->load->helper(array('html', 

            'form'));
        $this->load->model('setup_model');
    }

    /**
      * Show all pages in datatable
      
      
     */


    public function visitorList() {

        $data["breadcrumbs"] = array(
            "Page" => "dashboard/Website/postSetup",
            );
        $data['pageTitle'] = "All Visitor List ";
        $sql = "SELECT v.*, e.EDUCATION_DEGREE_NAME,i.INSTITUTE_NAME,i.INSTITUTE_ADDRESS,i.PHONE,i.FAX  FROM visitor_info v
        left JOIN education e ON v.EDUCATION_ID = e.EDUCATION_ID
        left JOIN institution i ON v.USER_ID = i.USER_ID  ORDER BY v.USER_ID
        ;";
        $data['all_visitors'] = $this->db->query($sql)->result();
            //echo"<pre>";print_r( $data['all_visitors']);exit;
        $data['content_view_page'] = 'setup/visitorList/all_visitor';
        $this->template->display($data);
    }


    function visitor_detail($USER_ID) {
        $data['visitor_info'] = $this->db->query("SELECT v.*, e.EDUCATION_DEGREE_NAME,i.INSTITUTE_NAME,i.INSTITUTE_ADDRESS,i.PHONE,i.FAX  FROM visitor_info v
         left JOIN education e ON v.EDUCATION_ID = e.EDUCATION_ID
         left JOIN institution i ON v.USER_ID = i.USER_ID 
         WHERE v.USER_ID= $USER_ID ORDER BY i.USER_ID")->row();
        //echo "<pre>";print_r($data['visitor_info']);exit;
        $this->load->view('setup/visitorList/visitor_details', $data);

    }


    /**
     * Edit ACTIVE_FLAG 
     */

    public function update_visitor() {
        $USER_ID = $this->input->post('USER_ID');
        $USER_MAIL = $this->input->post('USER_MAIL');
        $USER_NAME = $this->input->post('USER_NAME');
        $USER_PW = $this->input->post('USER_PW');

        $message = "Congratulation! Your account registered Successfully. <br>Dear" ."&nbsp;". $USER_NAME . ", <br> Please visit this link for login and update your information<br>" . base_url("index.php/Accounts/userLogin") . " <br>Your login details.<br /> Email:<b> " . $USER_MAIL . '</b><br> Password:<b>' . $USER_PW . '</b><br>Thanks <br> FAO';

        $subject = "FAO Applicant Login Info";

             //echo $message;exit;
        require 'gmail_app/class.phpmailer.php';
        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = "mail.harnest.com";
        $mail->Port = "465";
        $mail->SMTPAuth = true;
        $mail->Username = "support@harnest.com";
        $mail->Password = "Ati@2017";
        $mail->SMTPSecure = 'ssl';
        $mail->From = "support@harnest.com";
        $mail->FromName = "FAO";
        $mail->AddAddress($USER_MAIL);
             //$mail->AddReplyTo($emp_info->EMPLOYEE);
        $mail->IsHTML(TRUE);
        $mail->Subject = $subject;
        $mail->Body = $message;
        if ($mail->Send()){
            echo "Success";
        }
        else {
            echo "Faild";
        }
        $activeStatus = array(
            'ACTIVE_FLAG' => isset($_POST['ACTIVE_FLAG']) ? 1 : 0,
            );
        if ($this->utilities->updateData('visitor_info', $activeStatus, array('USER_ID' => $USER_ID))) {
            $this->session->set_flashdata('Success', 'Mail send successfully.');
            redirect('dashboard/Visitors/visitorList');
        }
    }



    public function deleteVisitor($id)
    {

        $attr = array(
            "USER_ID" => $id
            );
        return $this->utilities->deleteRowByAttribute("visitor_info", $attr);


    }
    
}