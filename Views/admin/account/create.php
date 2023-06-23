<div class="container">
    <h1 class="mb-5">Thêm mới tài khoản khách hàng: </h1>
    <form action="index.php?act=admin_accounts_create" class="form" method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleName" class="form-label">Tên khách hàng: </label>
                    <input name="name" type="text" class="form-control" id="exampleName">
                </div>
                <div class="mb-3">
                    <label for="exampleEmail" class="form-label">Email: <span class="text-danger fw-bold">*</span></label>
                    <input name="email" type="email" class="form-control" id="exampleEmail">
                </div>
                <div class="mb-3">
                    <label for="examplePassword" class="form-label">Mật khẩu: </label>
                    <input name="password" type="password" class="form-control" id="examplePassword">
                </div>
                <div class="mb-3">
                    <label for="exampleConfirmPassword" class="form-label">Xác nhận mật khẩu: </label>
                    <input name="confirmPassword" type="password" class="form-control" id="exampleConfirmPassword">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="examplePhoneNumber" class="form-label">Số điện thoại: </label>
                    <input name="phoneNumber" type="text" class="form-control" id="examplePhoneNumber">
                </div>
                <div class="mb-3">
                    <label for="exampleRole" class="form-label">Vai trò:</label>
                    <select name="role" class="form-select" id="exampleRole" aria-label="Default select example">
                        <option value="" selected style="display: none;">Mở chọn vai trò tài khoản</option>
                        <?php if ($_SESSION['user']['role'] == 5) : ?>
                            <option value="1">Khách hàng</option>
                            <option value="4">Admin</option>
                        <?php elseif ($_SESSION['user']['role'] == 4) : ?>
                            <option value="1">Khách hàng</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleStatus" class="form-label">Trạng thái tài khoản:</label>
                    <select name="status" class="form-select" id="exampleStatus" aria-label="Default select example">
                        <!-- <option value="" selected style="display: none;">Mở chọn trạng thái tài khoản</option> -->
                        <option value="1" selected>Mở tài khoản</option>
                        <option value="2">Khóa tài khoản</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <input type="hidden" name="idData" class="form-control" value="<?= isset($id) ? $id : "" ?>">
            <input type="submit" name="add-new" value="Thêm mới" class="btn btn-primary"></input>
            <input type="reset" class="btn btn-outline-danger" value="Nhập lại"></input>
            <a href="index.php?act=admin_accounts" class="btn btn-outline-success">Danh sách</a>
        </div>
    </form>
</div>