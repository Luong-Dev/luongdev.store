<?php
include_once "./Models/Account.php";

// admin
function accountsControl()
{
    include "./Views/admin/layouts/header.php";

    $accounts = getAccounts();

    include "./Views/admin/account/index.php";
    include "./Views/admin/layouts/footer.php";
}

function createAccountControl()
{
    include "./Views/admin/layouts/header.php";

    if (isset($_POST['add-new']) && $_POST['add-new']) {
        // xét tồn tại các post
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNumber'];
        $role = (int)$_POST['role'];
        $status = (int)$_POST['status'];
        $password = $_POST['password'];
        // $password = md5($password);
        $password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
        $confirmPassword = $_POST['confirmPassword'];
        $createdAt = date('Y-m-d');
        postAccount($name, "", $phoneNumber, $email, $password, $role, $status, $createdAt);
        $_SESSION['notify']['success'] = "Thêm mới thành công tài khoản: $name";
        header("location: " . URL_AC);
    }

    include "./Views/admin/account/create.php";
    include "./Views/admin/layouts/footer.php";
}

function deleteAccountControl()
{
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $check = getAccount($id);
        if ($check) {
            deleteAccount($id);
            $_SESSION['notify']['success'] = 'Xóa thành công tài khoản: ' . $check['name'];
            header("location: " . URL_AC);
        } else {
            $_SESSION['notify']['error'] = "Tài khoản không tồn tại";
            header("location: " . URL_AC);
        }
    } else {
        $_SESSION['notify']['error'] = "Tài khoản không tồn tại";
        header("location: " . URL_AC);
    }
}

function editAccountControl()
{
    include "./Views/admin/layouts/header.php";

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $account = getAccount($id);
        if ($account) {
            include "./Views/admin/account/edit.php";
        } else {
            $_SESSION['notify']['error'] = "Tài khoản không tồn tại";
            header("location: " . URL_AC);
        }
    } else {
        $_SESSION['notify']['error'] = "Tài khoản không tồn tại";
        header("location: " . URL_AC);
    }

    include "./Views/admin/layouts/footer.php";
}

function updateAccountControl()
{
    if (isset($_POST['update']) && $_POST['update']) {
        $id = $_POST['idData'];
        $account = getAccount($id);
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNumber'];
        $role = (int)$_POST['role'];
        $status = (int)$_POST['status'];
        putAccount($phoneNumber, $email, $role, $status, $id);
        $_SESSION['notify']['success'] = 'Cập nhật thành công tài khoản khách hàng: ' . $account['name'];
        header("location: " . URL_AC);
    }
}

function checkRoleAdmin()
{
    if (!(isset($_SESSION['user']['status']) && $_SESSION['user']['status'] == 1 && isset($_SESSION['user']['role']) && ($_SESSION['user']['role'] == 4 || $_SESSION['user']['role'] == 5))) {
        $_SESSION['notify']['error'] = "Tài khoản của bạn không có quyền truy cập vào link này. Mời đăng nhập tài khoản Admin";
        exit(header("location: " . URL_LOGIN));
    }
}

// xử lý xong phần role thì update lại: super admin chỉ có 1 tài khoản, tạo được các admin. còn các admin chỉ tạo được các account.
// xử lý create sau, đọc lại code đã








use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// echo "<pre>";
// print_r($account);
// echo "</pre>";
// user


// sửa tử đây, sửa cả mã hóa mật khẩu
function registerAccountControl()
{
    include "./Views/user/layouts/header.php";

    if (isset($_POST['add-new']) && $_POST['add-new']) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNumber'];
        $password = $_POST['password'];
        // $password = md5($password);
        $password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
        $confirmPassword = $_POST['confirmPassword'];
        $createdAt = date('Y-m-d');
        postAccount($name, "", $phoneNumber, $email, $password, 1, 1, $createdAt);
        $_SESSION['user'] = getUserWithEmail($email);
        echo "<script>
                alert('Đăng ký tài khoản thành công')
                window.location.href = 'index.php';
            </script>";
    }

    include "./Views/user/account/register.php";
    include "./Views/user/layouts/footer.php";
}

function loginAccountControl()
{
    include "./Views/user/layouts/header.php";

    // trong hàm này có bug liên quan tới $_SESSION['notify']['success'] không thể khai báo được. đã fix đổi tên notify thành messenger ở trong này không sao nhưng đổi cho toàn bộ web thì lại bug như ban đầu
    //    kiểm tra xung đột code ở đâu
    if (isset($_POST['login']) && $_POST['login']) {
        $email = $_POST['email'];
        $account = getUserWithEmail($email);
        if (!empty($account) && isset($account['password']) && isset($account['status'])) {
            $password = $_POST['password'];
            if (password_verify($password, $account['password'])) {
                if ($account['status'] == 1) {
                    $_SESSION['user'] = $account;
                    $_SESSION['notify']['success'] = 'không khai báo được';
                    // echo "<script>
                    // window.location.href = 'index.php';
                    //     alert('Đăng nhập thành công')
                    // </script>";
                    echo "<script>
                    window.location.href = 'index.php';
                    </script>";
                } else {
                    $message['error'] = "Tài khoản này đã bị khóa, vui lòng liên hệ: 1900000!";
                }
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
    // $_SESSION['notify']['success'] = 'không khai báo được';
    // header("location: " . URL_HOME);
    echo "<script>
            window.location.href = 'index.php';
            alert('Đăng xuất thành công!')
        </script>";
}

function confirmAuthUser()
{
    if (isset($_SESSION['user']['email']) && !empty($_SESSION['user']['email']) && isset($_SESSION['user']['password']) && !empty($_SESSION['user']['password'])) {
        $account = getUserWithEmailPassword($_SESSION['user']['email'], $_SESSION['user']['password']);
        if (!empty($account) && $account['status'] == 1) {
            $_SESSION['user'] = $account;
        } else {
            session_unset();
            $_SESSION['notify']['error'] = "Tài khoản của bạn đã bị thay đổi thông tin đăng nhập. Mời đăng nhập lại!";
            exit(header("location: " . URL_LOGIN));
        }
    } else {
        session_unset();
        $_SESSION['notify']['error'] = "Tài khoản của bạn đã bị thay đổi thông tin đăng nhập. Mời đăng nhập lại!";
        exit(header("location: " . URL_LOGIN));
    }
}

function checkRoleFull()
{
    // hàm check các tài khoản đã đăng nhập (role 1-4-5) đều được chạy tiếp
    if (!(isset($_SESSION['user']['status']) && $_SESSION['user']['status'] == 1 && isset($_SESSION['user']['role']) && ($_SESSION['user']['role'] == 1 || $_SESSION['user']['role'] == 4 || $_SESSION['user']['role'] == 5))) {
        $_SESSION['notify']['error'] = "Tài khoản của bạn không có quyền truy cập vào link này. Mời đăng nhập tài khoản Admin";
        exit(header("location: " . URL_LOGIN));
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
        $account = getUserWithEmail($email);
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


// làm hàm cập nhật thông tin tài khoản gồm hình ảnh tài khoản thì cần kiểm trang link phía comment sản phẩm xem có hiển thị đầy đủ hay không.
// nên chỉ lưu 1 phần link trong db thôi