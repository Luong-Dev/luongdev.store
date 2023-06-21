<main>
    <div class="breadcrumb-css__background">
        <div class="container">
            <nav aria-label="breadcrumb-css breadcrumb ">
                <ol class=" breadcrumb-css__wrap breadcrumb">
                    <li class="breadcrumb-css__item breadcrumb-item"><a href="index.php?act=" class="breadcrumb-css__item-link">Trang
                            chủ</a></li>
                    <li class="breadcrumb-css__item breadcrumb-css__item--active breadcrumb-item active" aria-current="page">Đăng nhập</li>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container mt-3 notify">
        <?php if (isset($_SESSION['notify']['success'])) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $_SESSION['notify']['success'] ?>
                <button type="button" class="btn-close bg-danger" style="padding: 13px 40px;" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['notify']['success']) ?>
        <?php endif; ?>
        <?php if (isset($_SESSION['notify']['error'])) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $_SESSION['notify']['error'] ?>
                <button type="button" class="btn-close bg-danger" style="padding: 13px 40px;" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['notify']['error']) ?>
        <?php endif; ?>
    </div>
    <div class="register mt-5 mb-5 container">
        <h1 class="register__title">Đăng nhập</h1>
        <div class="notify-login">
            <p class="text-success">
                <?= (isset($message['success']) && $message['success']) ? $message['success'] : ""; ?>
            </p>
            <p class="text-danger">
                <?= (isset($message['error']) && $message['error']) ? $message['error'] : ""; ?>
            </p>
        </div>
        <form id="myForm" action="index.php?act=login_submit" method="post" class="register__form mt-4">
            <div class="mb-4">
                <input name="email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Email">
            </div>
            <div class="mb-4">
                <input name="password" type="password" class="form-control" placeholder="Mật khẩu">
            </div>
            <div class="register__event">
                <input name="login" type="submit" class="register__btn btn" value="Đăng nhập"></input>
            </div>
        </form>
        <div class="login__direct mt-4">
            <label class="login__direct-link" for="forgotPassword">Quên mật khẩu?</label>
            <a href="index.php?act=register" class="login__direct-link">Đăng ký tại đây!</a>
        </div>
        <div class="forgot-password__wrap mt-5">
            <input id="forgotPassword" type="checkbox" class="event-form-forgot-password" hidden>
            <form action="index.php?act=confirm_email" method="post" class="forgot-password__form register__form">
                <div class="mb-4">
                    <input name="email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Nhập Email để lấy lại mật khẩu">
                </div>
                <div class="register__event">
                    <input name="forgot" type="submit" class="register__btn btn" value="Lấy lại mật khẩu"></input>
                </div>
            </form>
        </div>
    </div>
</main>