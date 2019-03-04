<?php
/**
 * Created by PhpStorm.
 * User: Awesome
 * Date: 3/3/2019
 * Time: 9:30 PM
 */

namespace JobPosts\service;


use JobPosts\bin\MailerGMail;
use JobPosts\bin\InterfaceMailer;

class EmailService
{
    /**
     * @var InterfaceMailer
     */
    private $serviceProvider;

    public function __construct($provider)
    {
        switch ($provider) {
            case "gmail":
                $this->serviceProvider = new MailerGMail();
                break;
                // more cases if new provider were added
        }

        /**
         * For Testing, please provide a valid GMail account and password
         * in below functions, as well as mail from
         */
        $this->serviceProvider->setMailCredentials("valid.gmail.acc@gmail.com", "password");
        $this->serviceProvider->setMailFrom("whatever.email@domain.com", "Name");
    }

    public function send($to, $subject, $body, $job_id = 0)
    {
        return $this->serviceProvider->sendMail($to, $subject, $body, $job_id);
    }

}