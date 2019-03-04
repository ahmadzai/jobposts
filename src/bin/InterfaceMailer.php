<?php
/**
 * Created by PhpStorm.
 * User: Awesome
 * Date: 3/3/2019
 * Time: 9:42 PM
 */
namespace JobPosts\bin;

interface InterfaceMailer {
    public function setMailCredentials($user, $password);
    public function setMailFrom($fromEmail, $fromName);
    public function sendMail($to, $subject, $body, $job_id);
}