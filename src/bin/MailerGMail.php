<?php
/**
 * Created by PhpStorm.
 * User: Awesome
 * Date: 3/3/2019
 * Time: 4:35 PM
 */

namespace JobPosts\bin;


use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class MailerGMail implements InterfaceMailer
{
    private $mailer;

    public function __construct()
    {
        $this->mailer = new PHPMailer();
        $this->mailer->isHTML(true);

        // for this solution I would configure mailer with SMTP (Gmail)
        $this->mailer->isSMTP();
        $this->mailer->SMTPAuth = true;
        $this->mailer->SMTPDebug = 2;
        $this->mailer->Port = 587;
        $this->mailer->SMTPSecure = 'tls';
        $this->mailer->SMTPAuth = true;
        $this->mailer->Host = 'smtp.gmail.com';
    }

    /**
     * @param $user
     * @param $password
     * The credentials can be read from a settings file
     */
    public function setMailCredentials($user, $password) {
        $this->mailer->Username = $user;
        $this->mailer->Password = $password;
    }

    /**
     * @param $fromEmail
     * @param string $fromName
     * To set from part of the email. This can be read from the setting file (e.g. YAML, JSON, XML)
     */
    public function setMailFrom($fromEmail, $fromName='') {
        $this->mailer->From = $fromEmail;
        $this->mailer->FromName = $fromName;
    }

    /**
     * @param $to
     * @param $subject
     * @param $body
     * @param int $job_id
     * @return boolean
     * @throws Exception
     */
    public function sendMail($to, $subject, $body, $job_id = 0) {
        $path = dirname(__DIR__) . '/../src/template/';
        ob_start();
        require_once $path.'email/email.php';
        $content = ob_get_clean();
        ob_clean();

        $this->mailer->addAddress($to);
        $this->mailer->Subject = $subject;
        $this->mailer->Body = $content;
        $this->mailer->AltBody = $body;

//        if(!$this->mailer->send()) {
//            var_dump($this->mailer->ErrorInfo); die;
//        }
        return $this->mailer->send();


    }

}