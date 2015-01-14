<?php
/**
 * Created by PhpStorm.
 * User: alexandrenguyen
 * Date: 14/01/15
 * Time: 09:05
 */

namespace PhpDeploy;

use PHPMailer;

class AlertMailer {

    private $mail;
    private $webmaster_email_address;
    private $header_message;

    function __construct() {
        $this->mail = new PHPMailer();
        $this->readWebmasterEmailAddress();
    }

    function readWebmasterEmailAddress() {
        $config = new Config();
        $this->webmaster_email_address = $config->getWebmasterEmail();
        $this->header_message = $config->getHeaderMessage();
    }
    
    function alertCmd($message) {
        
        $this->mail->isSMTP();
        $this->mail->Host = 'localhost';
        $this->mail->Port = 25;
        $this->mail->From = 'noreply@phpgitdeploy.com';
        $this->mail->FromName = 'PHP GIT DEPLOY';
        $this->mail->addAddress($this->webmaster_email_address, 'PHP GIT DEPLOY');
        $this->mail->isHTML(true);
        $this->mail->Subject = 'Deployment notification';
        $this->mail->Body = $this->header_message . '<br>' . $message;

        if(!$this->mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $this->mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
        
    }
}