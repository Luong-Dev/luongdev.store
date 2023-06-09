<div class="container">
    <h1 class="">Danh sách danh mục</h1>
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
    </div>

    <div class="table mt-3">
        <table class="table table-striped table-hover">
            <thead class="table-primary">
                <tr>
                    <th><input class="form-check-input" type="checkbox"></th>
                    <!-- <th>Mã loại</th> -->
                    <th>Tên loại</th>
                    <th>Số lượng SP</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($productCategories) && !empty($productCategories)) : ?>
                    <?php foreach ($productCategories as $key => $productCategory) :
                        extract($productCategory);
                        if (isset($id)) {
                            $update = "index.php?act=admin_product_categories_edit&id=" . $id;
                            $delete = "index.php?act=admin_product_categories_delete&id=" . $id;
                        }
                    ?>
                        <tr>
                            <td><input class="form-check-input" type="checkbox"></td>
                            <!-- <td><?= isset($id) ? $id : "" ?></td> -->
                            <td><?= isset($name) ? $name : "" ?></td>
                            <td><?= isset($quantity_product) ? $quantity_product : "" ?></td>
                            <td>
                                <a href="<?= isset($update) ? $update : "" ?>" class="btn btn-success btn-sm">Sửa</a>
                                <a href="<?= isset($delete) ? $delete : "" ?>" onclick="return confirm('Bạn có muốn xóa không')" class="btn btn-outline-danger btn-sm">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="12" class="text-danger text-center fw-bold fs-2">Chưa có danh mục nào!</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="mb-3">
        <a href="index.php?act=admin_product_categories_create" name="add-new" class="btn btn-primary">Thêm mới</a>
        <input type="submit" value="Chọn tất cả" class="btn btn-outline-dark">
        <input type="submit" value="Bỏ chọn tất cả" class="btn btn-outline-dark">
        <input type="submit" value="Xóa mục đã chọn" class="btn btn-outline-danger">
    </div>
</div>