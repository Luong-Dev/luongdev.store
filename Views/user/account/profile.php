<main>
    <div class="breadcrumb-css__background">
        <div class="container">
            <nav aria-label="breadcrumb-css breadcrumb ">
                <ol class=" breadcrumb-css__wrap breadcrumb">
                    <li class="breadcrumb-css__item breadcrumb-item"><a href="index.php?act=" class="breadcrumb-css__item-link">Trang
                            chủ</a></li>
                    <li class="breadcrumb-css__item breadcrumb-css__item--active breadcrumb-item active" aria-current="page">Thông tin tài khoản</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="mt-3 notify">
            <?php if (isset($_SESSION['notify']['success'])) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $_SESSION['notify']['success'] ?>
                    <button type="button" class="btn-close bg-success" style="padding: 13px 40px;" data-bs-dismiss="alert" aria-label="Close"></button>
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
            <?php if (isset($notify['success'])) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $notify['success'] ?>
                    <button type="button" class="btn-close bg-success" style="padding: 13px 40px;" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <?php if (isset($notify['error'])) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $notify['error'] ?>
                    <button type="button" class="btn-close bg-danger" style="padding: 13px 40px;" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
        </div>
        <?php
        extract($account);
        ?>
        <h1 class="mb-5 text-center mt-5">Thông tin khách hàng: <span class="text-success fs-1 fw-bold"><?= isset($name) ? $name : "" ?></span></h1>
        <form action="index.php?act=profile" class="form" method="POST" enctype="multipart/form-data">
            <div class="row mb-3">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <div class="mt-5">
                            <img style="width: 300px; height: 300px; border-radius: 50%;" src="<?= isset($avatar) && $avatar ? $avatar : ($_SESSION['user']['role'] != 1 ? './resources/uploads/images/avatar/default/admin.jpg' : './resources/uploads/images/avatar/default/user.png') ?>" alt="Ảnh đại diện">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleName" class="form-label">Họ và tên: <span class="text-danger fw-bold">*</span></label>
                            <input value="<?= isset($name) ? $name : "" ?>" name="name" type="text" class="form-control" id="exampleName" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleEmail" class="form-label">Email: <span class="text-danger fw-bold">*</span></label>
                            <input value="<?= isset($email) ? $email : "" ?>" name="email" type="email" class="form-control" id="exampleEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="examplePhoneNumber" class="form-label">Số điện thoại: <span class="text-warning">Cung cấp sẽ thuận tiện cho việc mua hàng!</span></label>
                            <input value="<?= isset($phone_number) ? $phone_number : "" ?>" name="phoneNumber" type="text" class="form-control" id="examplePhoneNumber">
                        </div>
                        <div class="mb-3">
                            <label for="exampleAddress" class="form-label">Địa chỉ: <span class="text-warning">Cung cấp sẽ thuận tiện cho việc mua hàng!</span></label>
                            <input value="<?= isset($address) ? $address : "" ?>" name="address" type="text" class="form-control" id="exampleAddress">
                        </div>
                        <div class="mb-3">
                            <label for="exampleAvatar" class="form-label">Hình đại diện:</label>
                            <input name="avatar" type="file" class="form-control" id="exampleAvatar">
                        </div>
                    </div>
                </div>
                <div class="mb-3 mt-3 text-center">
                    <a href="index.php" class="btn btn-success">Trang chủ</a>
                    <input type="hidden" name="idData" class="form-control" value="<?= isset($id) ? $id : "" ?>">
                    <input type="submit" name="update" value="Cập nhật" onclick="return confirm('Bạn có muốn cập nhật không')" class="btn btn-primary"></input>
                    <input type="reset" class="btn btn-danger" value="Nhập lại"></input>
                </div>
            </div>
        </form>
    </div>
</main>