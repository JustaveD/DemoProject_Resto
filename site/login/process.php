<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require "../../content/phpmailer/Exception.php";
require "../../content/phpmailer/PHPMailer.php";
require "../../content/phpmailer/SMTP.php";


if (isset($_GET['btn_process'])) {
    $action = $_GET['btn_process'];
    switch ($action) {
        case 'login': {
                extract($_POST);

                $accounts = account_get_all();
                $message = 'Sign up succsessfully!';
                $status = true;

                foreach ($accounts as $acc) {

                    if (($username === $acc['username']) && (sha1($password) === $acc['password'])) {
                        if ($acc['cus_ban']) {
                            $status = false;
                            $message = 'Your account is banned!';
                            $status = false;
                            $_SESSION['login'] = false;
                        } else {

                            $status = true;
                            $message = 'Login successfully!';
                            $_SESSION['login'] = true;
                            $_SESSION['login_id'] = $acc['cus_id'];
                        }
                        break;
                    } else {
                        $status = false;
                        $_SESSION['login'] = false;
                        $message = "Wrong username or password!";
                    }
                }
                if (!$status) {
                    header("location:index.php?message=$message&status=$status");
                } else {
                    header("location:../home?message=$message&status=true");
                }
                break;
            }
        case 'sendmail': {
                extract($_POST);
                //check mail
                $customers = customer_get_all();
                $check = false;
                foreach ($customers as $cus) {
                    if ($cus['cus_email'] === $cus_email) {
                        $check = true;
                        break;
                    }
                }
                if ($check) {

                    $encode_mail = sha1($cus_email);
                    $mail = new PHPMailer();
                    $mail->isSMTP();
                    $mail->Host = "smtp.gmail.com";
                    $mail->SMTPAuth = "true";
                    $mail->SMTPSecure = "tls";
                    $mail->Port = "587";
                    $mail->Username = "duydhps15446@fpt.edu.vn";
                    $mail->Password = "010102MT@hd";
                    $mail->Subject = "Reset password";
                    $mail->setFrom("duydhps15446@fpt.edu.vn");
                    $mail->isHTML(true);

                    $mail->Body = "<a href='https://localhost/resto/site/login/?btn_inputrest&token=$encode_mail'>Nhấp vào đây để đổi mật khẩu</a>";
                    $mail->addAddress($cus_email);

                    if ($mail->Send()) {
                        $message = "Check mail to reset password";
                        $status = true;
                        header("location:index.php?message=$message&status=$status");
                    } else {
                        $message =  "Error, please try again";
                        $status = false;
                        header("location:index.php?message=$message&status=$status");
                    };
                    $mail->smtpClose();
                } else {
                    $message =  "Your email is nonexist!";
                    $status = false;
                    header("location:index.php?message=$message&status=$status");
                }
                break;
            }
        case 'reset': {
                extract($_GET);
                extract($_POST);

               
                
                $check = false;
                $customers = customer_get_all();
                foreach ($customers as $cus) {
                    if (sha1($cus['cus_email']) === $token) {
                        $email = $cus['cus_email'];
                        if (customer_change_password($cus_password, $email)) {
                            $message =  "Your password is reseted!";
                            $status = true;
                            header("location:index.php?message=$message&status=$status");
                            break;
                        }
                    } else {
                        $message =  "Wrong token!";
                        $status = false;
                        header("location:index.php?message=$message&status=$status");
                    }
                }


                break;
            }
    }
} else {
    header("location:index.php");
}
