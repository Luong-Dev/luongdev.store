<?php
include_once "./Models/Account.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// echo "<pre>";
// print_r($account);
// echo "</pre>";
// user
function registerAccountControl()
{
    include "./Views/user/layouts/header.php";
    if (isset($_POST['add-new']) && $_POST['add-new']) {
        // xét tồn tại các post, xét điều kiện validate, nghiên cứu làm 1 file validate riêng
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phone'];
        $password = $_POST['password'];
        // $password = md5($password);
        $password = password_hash($password, PASSWORD_BCRYPT, ['web_of_luong']);

        // $confirmPassword = $_POST['confirmPassword'];

        postUser($name, $email, $phoneNumber, $password);
        echo "<script>
                alert('Đăng ký tài khoản thành công')
                window.location.href = 'index.php';
            </script>";
        // $message['success'] = "Thêm thành công!";

        $_SESSION['user'] = checkAuthUser($email);
    }
    include "./Views/user/account/register.php";
    include "./Views/user/layouts/footer.php";
}

function loginAccountControl()
{
    include "./Views/user/layouts/header.php";
    if (isset($_POST['login']) && $_POST['login']) {
        // xét tồn tại các post, xét điều kiện validate, nghiên cứu làm 1 file validate riêng
        $email = $_POST['email'];
        $account = checkAuthUser($email);
        if (!empty($account)) {
            $password = $_POST['password'];
            if (password_verify($password, $account['password'])) {
                $_SESSION['user'] = $account;
                echo "<script>
                window.location.href = 'index.php';
                    alert('Đăng nhập thành công')
                </script>";
            } else {
                $message['error'] = "Email hoặc mật khẩu sai";
            }
        } else {
            $message['error'] = "Email hoặc mật khẩu sai";
        }
    }
    include "./Views/user/account/login.php";
    include "./Views/user/layouts/footer.php";
}

function logoutAccountControl()
{
    session_unset();
    echo "<script>
            window.location.href = 'index.php';
            alert('Đăng xuất thành công')
        </script>";
}

function checkUserUsed()
{
    if (isset($_SESSION['user']['email']) && !empty($_SESSION['user']['email']) && isset($_SESSION['user']['password']) && !empty($_SESSION['user']['password'])) {
        $account = checkAuthUser($_SESSION['user']['email']);
        // var_dump($account['password']);
        if (!empty($account)) {
            // var_dump($_SESSION['user']['password']);
            if ($_SESSION['user']['password'] == $account['password']) {
                $_SESSION['user'] = $account;
            } else {
                session_unset();
            }
        }
    } else {
        session_unset();
    }
}


function forgotPassword()
{
    require './resources/PHPMailer/src/Exception.php';
    require './resources/PHPMailer/src/PHPMailer.php';
    require './resources/PHPMailer/src/SMTP.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    include "./Views/user/layouts/header.php";

    if (isset($_POST['forgot'])) {
        $email = $_POST['email'];
        $account = checkAuthUser($email);
        if (!empty($account)) {

            try {
                //Server settings
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'maohiemgia3@gmail.com';                     //SMTP username
                $mail->Password   = 'chudkttaylmelhkg';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('maohiemgia3@gmail.com', 'Luong');
                $mail->addAddress($email);     //Add a recipient
                // $mail->addAddress('ellen@example.com');               //Name is optional
                $mail->addReplyTo('maohiemgia3@gmail.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('../123.jpg', 'new.jpg');    //Optional name

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Mật khẩu đăng nhập của bạn là';
                // $mail->Body    = $password;
                $mail->Body    = 'ABCDEF';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                // echo 'Đã gửi password, vui lòng kiểm tra Email và đăng nhập lại';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

            echo "<script>
                    window.location.href = 'index.php?act=confirmCode';
                </script>";
        } else {
            $message['error'] = "Email không đúng hoặc không có trong hệ thống";
        }
    }

    include "./Views/user/account/forgotPassword.php";
    include "./Views/user/layouts/footer.php";
}
