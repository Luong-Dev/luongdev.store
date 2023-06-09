<div class="container">
    <div class="col-lg-5 mb-5 ">
        <h1 class="">Danh sách tài khoản</h1>
    </div>
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
    <div class="table">
        <table class="table table-striped table-hover">
            <thead class="table-primary">
                <tr>
                    <th><input class="form-check-input" type="checkbox"></th>
                    <th>Tên khách hàng</th>
                    <th>Ảnh đại diện</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Vai trò</th>
                    <th>Trạng thái</th>
                    <th>Ngày kích hoạt</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($accounts) && !empty($accounts)) : ?>
                    <?php foreach ($accounts as $key => $account) :
                        extract($account);
                        if (isset($id)) {
                            $update = "index.php?act=admin_accounts_edit&id=" . $id;
                            $delete = "index.php?act=admin_accounts_delete&id=" . $id;
                        }
                    ?>
                        <tr>
                            <td><input class="form-check-input" type="checkbox"></td>
                            <td><?= isset($name) ? $name : "" ?></td>
                            <td>
                                <img src="<?= isset($avatar) ? $avatar : "" ?>" alt="Hình đại diện" style="height: 60px;">
                            </td>
                            <td><?= isset($phone_number) ? $phone_number : ""; ?></td>
                            <td><?= isset($email) ? $email : "" ?></td>
                            <td>
                                <?php if (defined('AR_ROLE') && is_array(AR_ROLE) && AR_ROLE) : ?>
                                    <?php foreach (AR_ROLE as $key => $item) : ?>
                                        <?= isset($role) && $role == $key ? $item : "" ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>
                            <td><?= isset($status) && $status == 1 ? "Đang hoạt động" : (isset($status) && $status == 2 ? "Bị khóa" : "") ?></td>
                            <td><?= isset($created_at) ? $created_at : "" ?></td>
                            <td>
                                <a href="<?= isset($update) ? $update : "" ?>" class="btn btn-outline-success btn-sm">Sửa</a>
                                <a href="<?= isset($delete) ? $delete : "" ?>" onclick="return confirm('Bạn có muốn xóa không')" class="btn btn-outline-danger btn-sm">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="12" class="text-danger text-center fw-bold fs-2">Chưa có tài khoản nào!</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="mb-3">
        <a href="index.php?act=admin_accounts_create" name="add-new" class="btn btn-primary">Thêm mới</a>
        <input type="submit" value="Chọn tất cả" class="btn btn-outline-dark">
        <input type="submit" value="Bỏ chọn tất cả" class="btn btn-outline-dark">
        <input type="submit" value="Xóa mục đã chọn" class="btn btn-outline-danger">
    </div>
</div>