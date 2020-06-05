<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/PHPMailer.php';
require 'phpmailer/Exception.php';
require 'phpmailer/SMTP.php';


$arfl = (scandir('.'));
foreach ($arfl as $flnm){
    $flrsh = mb_strtolower(mb_substr(mb_strrchr($flnm, '.'), 1));
        if ($flrsh == 'xlsx'){
            $mail = new PHPMailer(true);
            $mail->addAttachment($flnm);
            $mail->isSMTP();
            $mail->Host   = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'vitaliykonovaloff7@gmail.com';
            $mail->Password   = '**************';
            $mail->SMTPSecure = 'tls';
            $mail->Port   = 587;
            $mail->setFrom('vitaliykonovaloff7@gmail.com', 'Иван Иванов');
            $mail->addAddress('vitaliykonovaloff@yandex.ru', 'Вася Петров');
            $mail->Subject = 'Письмо с аптечкой';
            $mail->msgHTML("Лови аптечку");
            if ($mail->send()) {
                echo 'Письмо отправлено!';
                unlink($flnm);
            }            
        }
}


