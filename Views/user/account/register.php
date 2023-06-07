<main>
    <div class="breadcrumb-css__background">
        <div class="container">
            <nav aria-label="breadcrumb-css breadcrumb ">
                <ol class=" breadcrumb-css__wrap breadcrumb">
                    <li class="breadcrumb-css__item breadcrumb-item"><a href="index.php?act=" class="breadcrumb-css__item-link">Trang
                            chủ</a></li>
                    <li class="breadcrumb-css__item breadcrumb-css__item--active breadcrumb-item active" aria-current="page">Đăng ký tài khoản</li>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="register mt-5 mb-5 container">
        <h1 class="register__title">Đăng ký</h1>
        <p class="register__login">
            Đã có tài khoản, đăng nhập <a href="index.php?act=login" class="register__login-link">tại đây</a>
        </p>
        <form action="index.php?act=register" method="post" class="register__form mt-4">
            <div class="mb-4">
                <input name="name" type="text" class="form-control" placeholder="Họ và tên" required>
            </div>
            <div class="mb-4">
                <input name="email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Email" required>
            </div>
            <div class="mb-4">
                <input name="phoneNumber" type="tel" class="form-control" placeholder="Số điện thoại">
            </div>
            <div class="mb-4">
                <input name="password" type="password" class="form-control" placeholder="Mật khẩu" required>
            </div>
            <div class="mb-4">
                <input name="confirmPassword" type="password" class="form-control" placeholder="Nhập lại mật khẩu" required>
            </div>
            <div class="register__event">
                <input name="add-new" type="submit" class="register__btn btn" value="Đăng ký"></input>
            </div>
        </form>
    </div>
</main>