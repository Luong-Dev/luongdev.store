<div class="container">
    <?php
    extract($account);
    ?>
    <h1 class="mb-5">Cập nhật tài khoản khách hàng: "<?= isset($name) ? $name : "" ?>"</h1>
    <form action="index.php?act=admin_accounts_update" class="form" method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleEmail" class="form-label">Email: <span class="text-danger fw-bold">*</span></label>
                        <input value="<?= isset($email) ? $email : "" ?>" name="email" type="email" class="form-control" id="exampleEmail">
                    </div>
                    <div class="mb-3">
                        <label for="examplePhoneNumber" class="form-label">Số điện thoại: </label>
                        <input value="<?= isset($phone_number) ? $phone_number : "" ?>" name="phoneNumber" type="text" class="form-control" id="examplePhoneNumber">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleRole" class="form-label">Vai trò:</label>
                        <select name="role" class="form-select" id="exampleRole" aria-label="Default select example">
                            <option value="" selected style="display: none;">Mở chọn vai trò tài khoản</option>
                            <?php if (defined('AR_ROLE') && is_array(AR_ROLE) && AR_ROLE) : ?>
                                <?php foreach (AR_ROLE as $key => $item) : ?>
                                    <option value="<?= $key ?>" <?= isset($role) && $key == $role ? "selected" : "" ?>><?= $item ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleStatus" class="form-label">Trạng thái tài khoản:</label>
                        <select name="status" class="form-select" id="exampleStatus" aria-label="Default select example">
                            <option value="" selected style="display: none;">Mở chọn trạng thái tài khoản</option>
                            <option value="1" <?= isset($status) && $status == 1 ? "selected" : "" ?>>Mở tài khoản</option>
                            <option value="2" <?= isset($status) && $status == 2 ? "selected" : "" ?>>Khóa tài khoản</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <input type="hidden" name="idData" class="form-control" value="<?= isset($id) ? $id : "" ?>">
                <input type="submit" name="update" value="Cập nhật" onclick="return confirm('Bạn có muốn cập nhật không')" class="btn btn-primary"></input>
                <input type="reset" class="btn btn-outline-danger" value="Nhập lại"></input>
                <a href="index.php?act=admin_accounts" class="btn btn-outline-success">Danh sách</a>
            </div>
        </div>
    </form>
</div>