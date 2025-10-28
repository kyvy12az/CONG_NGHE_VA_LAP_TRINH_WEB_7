<?php
require "PHPMailer-master/src/PHPMailer.php";
require "PHPMailer-master/src/SMTP.php";
require "PHPMailer-master/src/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $to = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        // Thiết lập cấu hình Gmail SMTP
        $mail->isSMTP();
        $mail->CharSet = "UTF-8";
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'konoma124@gmail.com';
        $mail->Password = 'ngky vysa kona jhuu'; //
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Người gửi & người nhận
        $mail->setFrom('konoma124@gmail.com', 'Ky Vy');
        $mail->addAddress($to);

        // Nội dung email
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = "
          <div style='font-family: Arial, sans-serif;'>
            <h3 style='color:#0066cc;'>Xin chào!</h3>
            <p>$message</p>
            <hr>
            <small>Email này được gửi từ hệ thống PHP Mailer.</small>
          </div>";

        // Kết nối SMTP an toàn
        $mail->smtpConnect([
            "ssl" => [
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            ]
        ]);

        $mail->send();
        echo "<script>alert('Gửi mail thành công đến $to!'); window.location='index.php';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Gửi mail thất bại: {$mail->ErrorInfo}'); window.location='index.php';</script>";
    }
}
?>
