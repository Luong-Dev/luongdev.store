<main>
    <div class="breadcrumb-css__background">
        <div class="container">
            <nav aria-label="breadcrumb-css breadcrumb ">
                <ol class=" breadcrumb-css__wrap breadcrumb">
                    <li class="breadcrumb-css__item breadcrumb-item"><a href="index.php?act=" class="breadcrumb-css__item-link">Trang
                            chủ</a></li>
                    <li class="breadcrumb-css__item breadcrumb-css__item--active breadcrumb-item active" aria-current="page">Xác nhận mã code</li>
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
        <h1 class="register__title">Xác nhận mã code</h1>
        <form action="index.php?act=verification_code" method="post" class="register__form mt-4">
            <div class="mb-4">
                <input name="code" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nhập mã code đã được gửi qua Email của bạn" required>
            </div>
            <div class="register__event">
                <input name="confirm" type="submit" class="register__btn btn" value="Xác nhận"></input>
            </div>
        </form>
        <div class="login__direct mt-4">
            <a href="index?act=login" class="login__direct-link" for="forgotPassword">Đăng nhập</a>
            <a href="index?act=register" class="login__direct-link">Đăng ký tại đây!</a>
        </div>
    </div>
</main>