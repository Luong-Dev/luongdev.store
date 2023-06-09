<main>
    <div class="breadcrumb-css__background">
        <div class="container">
            <nav aria-label="breadcrumb-css breadcrumb ">
                <ol class=" breadcrumb-css__wrap breadcrumb">
                    <li class="breadcrumb-css__item breadcrumb-item"><a href="index.php?act=" class="breadcrumb-css__item-link">Trang
                            chủ</a></li>
                    <li class="breadcrumb-css__item breadcrumb-css__item--active breadcrumb-item active" aria-current="page">Cập nhật mật khẩu</li>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="register mt-5 mb-5 container">
        <h1 class="register__title">Cập nhật mật khẩu</h1>
        <div class="mt-3 notify">
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
        <form action="index.php?act=update_password" method="post" class="register__form mt-4">
            <div class="mb-4">
                <input name="password" type="password" class="form-control" placeholder="Mật khẩu hiện tại" required>
            </div>
            <div class="mb-4">
                <input name="passwordNew" type="password" class="form-control" placeholder="Mật khẩu mới" required>
            </div>
            <div class="mb-4">
                <input name="confirmPassword" type="password" class="form-control" placeholder="Nhập lại mật khẩu" required>
            </div>
            <div class="register__event">
                <input name="update" type="submit" class="register__btn btn" value="Cập nhật"></input>
            </div>
        </form>
    </div>
</main>