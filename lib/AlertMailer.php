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
    private $config;

    function __construct() {
        $this->config = new Config();
        $this->mail = new PHPMailer();
     }
    
    function alertCmd($message) {

        $finalMessage = $this->config->getHeaderMessage() . '<br>' . $message;
        $finalMessage = nl2br($finalMessage);

        $this->mail->isSMTP();
        $this->mail->SMTPAuth = true;
        $this->mail->Host = $this->config->getSmtpHost();
        $this->mail->Port = $this->config->getSmtpPort();
        $this->mail->Username = $this->config->getSmtpUsername();
        $this->mail->Password = $this->config->getSmtpPassword();
        $this->mail->SMTPSecure = $this->config->getSmtpSecure();
        $this->mail->From = $this->config->getSmtpFromEmail();
        $this->mail->FromName = 'PHP GIT DEPLOY';
        $this->mail->addAddress($this->config->getWebmasterEmail(), 'PHP GIT DEPLOY');
        $this->mail->isHTML(true);
        $this->mail->Subject = 'Deployment notification';
        $this->mail->Body = $finalMessage;

        if(!$this->mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $this->mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
        
    }
}