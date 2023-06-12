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
        date_default_timezone_set('Asia/Ho_Chi_Minh');
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
        date_default_timezone_set('Asia/Ho_Chi_Minh');
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
    include "./Views/user/account/login.php";
    include "./Views/user/layouts/footer.php";
}

function loginSubmitAccountControl()
{
    if (isset($_POST['login']) && $_POST['login']) {
        $email = $_POST['email'];
        $account = getUserWithEmail($email);
        if (!empty($account) && isset($account['password']) && isset($account['status'])) {
            $password = $_POST['password'];
            if (password_verify($password, $account['password'])) {
                if ($account['status'] == 1) {
                    $_SESSION['user'] = $account;
                    $_SESSION['notify']['success'] = 'Đăng nhập thành công!';
                    header("location: " . URL_HOME);
                } else {
                    $_SESSION['notify']['error'] = 'Tài khoản này đã bị khóa, vui lòng liên hệ: 1900 1 tông 1 dép!';
                    header("location: " . URL_LOGIN);
                }
            } else {
                $_SESSION['notify']['error'] = 'Email hoặc mật khẩu sai!';
                header("location: " . URL_LOGIN);
            }
        } else {
            $_SESSION['notify']['error'] = 'Email hoặc mật khẩu sai!';
            header("location: " . URL_LOGIN);
        }
    } else {
        $_SESSION['notify']['error'] = 'Bạn phải vào chức năng đăng nhập!';
        header("location: " . URL_LOGIN);
    }
}

function logoutAccountControl()
{
    session_unset();
    $_SESSION['notify']['success'] = 'Đăng xuất thành công!';
    header("location: " . URL_LOGIN);
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
        $_SESSION['notify']['error'] = "Tài khoản của bạn không có quyền truy cập vào link này. Mời đăng nhập tài khoản!";
        exit(header("location: " . URL_LOGIN));
    }
}

function checkUseLogged()
{
    // hàm check nếu tài khoản đã đăng nhập không cho đi vào link này và điều hướng về trang chủ
    if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
        $_SESSION['notify']['error'] = "Link bạn truy cập không hỗ trợ trong trạng thái 'đăng nhập'!";
        exit(header("location: " . URL_HOME));
    }
}

function profileControl()
{
    include "./Views/user/layouts/header.php";

    if (isset($_SESSION['user']['id']) && is_numeric($_SESSION['user']['id'])) {
        $id = $_SESSION['user']['id'];
        $account = getAccount($id);
        if ($account) {
            include "./Views/user/account/profile.php";
        } else {
            $_SESSION['notify']['error'] = "Đường dẫn hiện tại không hỗ trợ cho bạn!";
            header("location: " . URL_HOME);
        }
    } else {
        $_SESSION['notify']['error'] = "Đường dẫn hiện tại không hỗ trợ cho bạn!";
        header("location: " . URL_HOME);
    }

    include "./Views/user/layouts/footer.php";
}

function updateProfileControl()
{
    if (isset($_SESSION['user']['id']) && is_numeric($_SESSION['user']['id'])) {
        $id = $_SESSION['user']['id'];
        if (isset($_POST['update']) && $_POST['update']) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phoneNumber = $_POST['phoneNumber'];
            $address = $_POST['address'];
            // file
            $targetDir = "./resources/uploads/images/avatar/";
            $fileName = $_FILES['avatar']['name'];
            $fileTmpName = $_FILES['avatar']['tmp_name'];
            $avatar = "";
            if ($fileName != "") {
                $avatar = $targetDir . $fileName;
                move_uploaded_file($fileTmpName, $avatar);
            }
            putUser($name, $avatar, $phoneNumber, $email, $address, $id);
            $_SESSION['notify']['success'] = 'Cập nhật thông tin tài khoản thành công!';
            header("location: " . URL_PROFILE);
        }
    } else {
        $_SESSION['notify']['error'] = "Đường dẫn hiện tại không hỗ trợ cho bạn!";
        header("location: " . URL_HOME);
    }
}

function editPassword()
{
    include "./Views/user/layouts/header.php";

    if (isset($_SESSION['user']['id']) && is_numeric($_SESSION['user']['id'])) {
        $id = $_SESSION['user']['id'];
        $account = getAccount($id);
        if ($account) {
            include "./Views/user/account/changePassword.php";
        } else {
            $_SESSION['notify']['error'] = "Đường dẫn hiện tại không hỗ trợ cho bạn!";
            header("location: " . URL_HOME);
        }
    } else {
        $_SESSION['notify']['error'] = "Đường dẫn hiện tại không hỗ trợ cho bạn!";
        header("location: " . URL_HOME);
    }

    include "./Views/user/layouts/footer.php";
}

function updatePassword()
{
    if (isset($_SESSION['user']['id']) && is_numeric($_SESSION['user']['id'])) {
        $id = $_SESSION['user']['id'];
        $account = getAccount($id);
        if ($account) {
            if (isset($_POST['update']) && $_POST['update']) {
                $password = $_POST['password'];
                $passwordNew = $_POST['passwordNew'];
                $confirmPassword = $_POST['confirmPassword'];

                if (password_verify($password, $account['password'])) {
                    if ($passwordNew == $confirmPassword) {
                        putPasswordUser(password_hash($passwordNew, PASSWORD_BCRYPT, ['cost' => 12]), $id);
                        $_SESSION['notify']['success'] = 'Cập nhật thông tin tài khoản thành công!';
                        header("location: " . "index.php?act=edit_password");
                    } else {
                        $_SESSION['notify']['error'] = "Xác nhận mật khẩu mới không trùng nhau, mời nhập lại!";
                        header("location: " . URL_ED_PW);
                    }
                } else {
                    $_SESSION['notify']['error'] = "Mật khẩu hiện tại không đúng!";
                    header("location: " . URL_ED_PW);
                }
            }
        } else {
            $_SESSION['notify']['error'] = "Đường dẫn hiện tại không hỗ trợ cho bạn!";
            header("location: " . URL_HOME);
        }
    } else {
        $_SESSION['notify']['error'] = "Đường dẫn hiện tại không hỗ trợ cho bạn!";
        header("location: " . URL_HOME);
    }
}

function forgotPassword()
{
    include "./Views/user/layouts/header.php";
    include "./Views/user/account/forgotPassword.php";
    include "./Views/user/layouts/footer.php";
}

function confirmEmail()
{
    if (isset($_POST['forgot'])) {
        $email = $_POST['email'];
        $account = getUserWithEmail($email);
        if (!empty($account)) {
            require './resources/PHPMailer/src/Exception.php';
            require './resources/PHPMailer/src/PHPMailer.php';
            require './resources/PHPMailer/src/SMTP.php';

            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);
            $verificationCode = mt_rand(100000, 999999);
            $_SESSION['verification_code'] = $verificationCode;
            $_SESSION['verification_id'] = $account['id'];
            $_SESSION['expires_at'] = time() + 60; // Thời gian hết hạn sau 1 phút
            try {
                //Server settings
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'ducluongwebdeveloper@gmail.com';                     //SMTP username
                $mail->Password   = 'vvvdfemepzpzkupl';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('ducluongwebdeveloper@gmail.com', 'Luong');
                // $mail->addAddress($email);     //Add a recipient
                $mail->addAddress($email);               //Name is optional
                $mail->addReplyTo('ducluongwebdeveloper@gmail.com', 'Support');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('../123.jpg', 'new.jpg');    //Optional name

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Mã xác thực của bạn';
                // $mail->Body    = $password;
                $mail->Body    = "$verificationCode";
                $mail->AltBody = 'Sử dụng mã này để nhập vào xác thực đây là email của bạn.';

                if ($mail->send()) {
                    $_SESSION['notify']['success'] = "Đã gửi mã xác thực email, vui lòng kiểm tra Email!";
                    header("location: index.php?act=confirm_verification_code");
                }
                // $_SESSION['notify']['success'] = "Đã gửi mã xác thực email, vui lòng kiểm tra Email!";
                // header("location: index.php?act=confirm_verification_code");
            } catch (Exception $e) {
                $message['error'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            $_SESSION['notify']['error'] = "Email không đúng hoặc không có trong hệ thống!";
            header("location: index.php?act=forgot_password");
        }
    }
}

function confirmVerificationCode()
{
    if (isset($_SESSION['verification_code']) && isset($_SESSION['expires_at']) && $_SESSION['expires_at'] > time()) {
        include "./Views/user/layouts/header.php";
        include "./Views/user/account/confirmverificationCode.php";
        include "./Views/user/layouts/footer.php";
    } else {
        $_SESSION['notify']['error'] = "Đường dẫn hiện tại không hỗ trợ cho bạn!";
        header("location: index.php?act=forgot_password");
    }
}

function verificationCode()
{
    if (isset($_POST['confirm'])) {
        $code = $_POST['code'];
        if (isset($_SESSION['verification_code']) && isset($_SESSION['verification_id']) && isset($_SESSION['expires_at']) && $_SESSION['expires_at'] > time()) {
            if ($code == $_SESSION['verification_code']) {
                unset($_SESSION['verification_code']);
                $_SESSION['expires_at'] = time() + 300;
                // thêm 5 phút thay đổi mật khẩu;
                $_SESSION['notify']['success'] = "Hãy thay đổi mật khẩu để sử dụng!";
                header("location: index.php?act=edit_password_forgot");
            } else {
                $_SESSION['notify']['error'] = "Mã bạn nhập không chính xác! Mã chỉ có thời hạn trong 1 phút! Vui lòng nhập lại!";
                header("location: index.php?act=confirm_verification_code");
            }
        } else {
            unset($_SESSION['verification_code']);
            unset($_SESSION['verification_id']);
            unset($_SESSION['expires_at']);
            $_SESSION['notify']['error'] = "Không có mã xác thực, vui lòng thao tác theo trình tự!";
            header("location: index.php?act=confirm_verification_code");
        }
    }
}

function editPasswordForgot()
{
    if (isset($_SESSION['verification_id']) && isset($_SESSION['expires_at']) && $_SESSION['expires_at'] > time()) {
        include "./Views/user/layouts/header.php";
        include "./Views/user/account/editPasswordForgot.php";
        include "./Views/user/layouts/footer.php";
    } else {
        $_SESSION['notify']['error'] = "Đường dẫn hiện tại không hỗ trợ cho bạn!";
        header("location: index.php?act=forgot_password");
    }
}

function updatePasswordForgot()
{
    if (isset($_SESSION['verification_id']) && isset($_SESSION['expires_at']) && $_SESSION['expires_at'] > time()) {
        if (isset($_POST['update']) && $_POST['update']) {
            $id =  $_SESSION['verification_id'];
            $passwordNew = $_POST['passwordNew'];
            $confirmPassword = $_POST['confirmPassword'];
            if ($passwordNew == $confirmPassword) {
                putPasswordUser(password_hash($passwordNew, PASSWORD_BCRYPT, ['cost' => 12]), $id);
                $account = getAccount($id);
                if (!empty($account)) {
                    $_SESSION['user'] = $account;
                }
                $_SESSION['notify']['success'] = 'Cập nhật mật khẩu và đăng nhập thành công!';
                unset($_SESSION['verification_id']);
                unset($_SESSION['expires_at']);
                header("location: " . "index.php");
                // header("location: " . "index.php?act=login");
            } else {
                $_SESSION['notify']['error'] = "Xác nhận mật khẩu mới không trùng nhau, mời nhập lại!";
                header("location: index.php?act=edit_password_forgot");
            }
        }
    } else {
        unset($_SESSION['verification_id']);
        unset($_SESSION['expires_at']);
        $_SESSION['notify']['error'] = "Trang bạn thao tác không phù hợp hoặc hết thời hạn thao tác!";
        header("location: index.php");
    }
}

// làm hàm cập nhật thông tin tài khoản gồm hình ảnh tài khoản thì cần kiểm trang link phía comment sản phẩm xem có hiển thị đầy đủ hay không.
// nên chỉ lưu 1 phần link trong db thôi