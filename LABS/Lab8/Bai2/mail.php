<?php
require "PHPMailer-master/src/PHPMailer.php";
require "PHPMailer-master/src/SMTP.php";
require "PHPMailer-master/src/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $to = $_POST['email'];
    $subject = $_POST['tieude'];
    $content = $_POST['content'];

    $mail = new PHPMailer(true);

    try {
        // Cấu hình Gmail SMTP
        $mail->isSMTP();
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'konoma124@gmail.com';
        $mail->Password = 'ngky vysa kona jhuu';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Người gửi & nhận
        $mail->setFrom('konoma124@gmail.com', 'Ky Vy');
        $mail->addAddress($to, 'Khách hàng');

        // Nội dung
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = '<div style="font-family:Arial,sans-serif;">' . $content . '</div>';

        // File đính kèm
        if (!empty($_FILES['file']['name'])) {
            $uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES['file']['name']));
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $mail->addAttachment($uploadfile, $_FILES['file']['name']);
            }
        }

        // Bỏ qua SSL verify nếu cần
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
        echo "<script>alert('Lỗi khi gửi mail: {$mail->ErrorInfo}'); window.location='index.php';</script>";
    }
}
?>
