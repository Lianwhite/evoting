<?php

class sendmail
{
    private $email;

    private $conf;

    public function __construct($email, $conf)
    {
        $this->email = $email;

        $this->conf = $conf;
    }

    public function send()
    {
        $to = $this->email;

        // Subject
        $subject = 'Confirm Email eVoTiNg';

        // Message
        $message = '
        <html>
        <head>
        <title>eVoTiNg Confirmation email</title>
        </head>
        <body style="text-align: center;">
        <p style="font-size: 20px; font-weight: bold; color: rgb(79, 41, 114);">Thank you for registering with us.!</p>
        <p>Please <b><a href="localhost/Second_project/evoting_mvc/controller/confirmemail.php?code='.$this->email."-".$this->conf.'">CLICK HERE</a></b> to confirm your email.</p>
        <p><i>You recieved this email because you recently signed up at <a href="www.evoting.ng">www.evoting.ng</a>. If you do not know about this action, kindly ignore this email.</i></p>
        </body>
        </html>
        ';


        $headers = "MIME-Version: 1.0" . "\r\n";

        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: eVoTiNg <admin@evoting.com>' . "\r\n";

        // Mail it

        if (!mail($to, $subject, $message, $headers)) {

            print_r(error_get_last());

        }else{

            return true;
        }
        }
}