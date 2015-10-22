<?php

require_once 'Commons.php';
/**
 * Created by PhpStorm.
 * User: bryanitur
 * Date: 10/20/15
 * Time: 11:18 AM
 */
class MY_Controller extends CI_Controller implements Commons
{

    const AT_userName = null;

    const AT_shortCode = null;

    const AT_apiKey = null;

    const projectName = "LaunchIgniter";

    const slogan = "Kickstart your projects";

    public function __construct()
    {

        parent::__construct();

    }

    public function createViewObject($view, $data = null)
    {
        // TODO: Implement createViewObject() method.

        return json_decode(json_encode(array("view" => $view, "data" => $data)));

    }

    public function createIncludeObject($show, $data = null)
    {
        // TODO: Implement createIncludeObject() method.

        $data['project'] = self::projectName;

        $data['slogan'] = self::slogan;

        return json_decode(json_encode(array("show" => $show, "data" => $data)));

    }

    public function ShowUserPage($header, $view, $footer)
    {
        // TODO: Implement userShowPage() method.

        $this->load->view('includes/frontend/header', $header->data);

        $this->load->view($view->view, $view->data);

        $this->load->view('includes/frontend/footer', $footer->data);

    }

    public function isPost()
    {
        // TODO: Implement isPost() method.

        return !empty($this->input->post());

    }

    public function get($key)
    {
        // TODO: Implement get() method.

        return $this->input->post($key);

    }

    public function post($key)
    {
        // TODO: Implement post() method.

        return $this->input->get($key);

    }

    public function sendEmail($subject, $to, $message, $attachment)
    {
        // TODO: Implement sendEmail() method.

        $config = array('protocol' => 'sendmail', 'mailpath' => '/usr/sbin/sendmail', 'charset' => 'iso-8859-1', 'mailtype' => 'html', 'wordwrap' => true);

        $this->load->library('email', $config);

        $this->email->from(strip_tags("noreply@paykind.co"), 'Paykind');

        $this->email->to($to);

        $this->email->subject($subject);

        $this->email->message($message);

        if($attachment != null)

            $this->email->attach($attachment);

        $this->email->send();

    }

    public function standardizePhoneNumber($phoneNumber, $countryCode = "   254")
    {
        // TODO: Implement standardizePhoneNumber() method.

        $length = strlen($countryCode);

        $return = "";

        if(strlen($phoneNumber) == 13 && substr($phoneNumber, 0, 3) == "+25")

            $return .= $phoneNumber;

        else if(strlen($phoneNumber) == 12 && substr($phoneNumber, 0, 3) == "254")

            $return .= "+". $phoneNumber;

        else if(strlen($phoneNumber) == 10 && substr($phoneNumber, 0, 2) == "07")

            $return .= "+254" . substr($phoneNumber, 1);

        else if(strlen($phoneNumber) == 9 && substr($phoneNumber, 0, 1) == "7")

            $return .= "+254" . $phoneNumber;

        else

            $return .= $phoneNumber;

        return $return;
    }

    public function uploadFile($filename, $path, $maxSize, $allowed_types)
    {
        // TODO: Implement uploadFile() method.

        $config = array(

            'upload_path' => $path,

            'max_size' => $maxSize,

            'allowed_types' => $allowed_types

        );

        $this->load->library('upload', $config);

        if($this->upload->do_upload($filename))

        {

            return json_encode(array('success' => true, 'path' => $this->upload->data()['full_path'], 'message' => 'File upload was successful'));

        }

        else

        {

            return json_encode(array('success' => false, 'message' => $this->upload->display_errors()));

        }

        return $return;

    }

    public function loadModel($model)
    {
        // TODO: Implement loadModel() method.

        $this->load->model($model);

    }

    public function authorized()
    {
        // TODO: Implement authorized() method.
    }

    public function adminShowPage()
    {
        // TODO: Implement adminShowPage() method.
    }

    public function sendSMS($phone, $message)
    {
        // TODO: Implement sendSMS() method.

        $this->load->library('AfricasTalkingGateway', null, 'AT');

        $gateway = new AfricasTalkingGateway(self::AT_userName, self::AT_apiKey);

        try {

            if(self::AT_shortCode != null)

                $results = $gateway->sendMessage($phone, $message, self::AT_shortCode);

            else

                $results = $gateway->sendMessage($phone, $message);

            $return = array();

            foreach($results as $result)

            {

                $return[] = array('status' => $result->status, 'message_id' => $result->messageId, 'cost' => $result->cost, 'phone_number' => $this->standardizePhoneNumber($phone), 'message' => $message, 'datetime' => sysNow());

            }

            return json_encode(array('success' => true, 'message' => 'Aparently, the message(s)', 'logs' => $return));

        } catch ( AfricasTalkingGatewayException $e ) {

            return json_encode(array('success' => false, 'message' => $e->getMessage()));

        }
    }

}