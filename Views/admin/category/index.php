<!-- <?php
var_dump($categories)
?> -->
<div class="container">
    <h1 class="mb-5">Danh sách danh mục</h1>
    <div class="mb-3">
        <p class="text-success">
            <?= (isset($message['success']) && $message['success']) ? $message['success'] : ""; ?>
        </p>
        <p class="text-danger">
            <?= (isset($message['error']) && $message['error']) ? $message['error'] : ""; ?>
        </p>
    </div>
    <div class="table">
        <table class="table table-striped table-hover">
            <thead class="table-primary">
                <tr>
                    <th><input class="form-check-input" type="checkbox"></th>
                    <th>Mã loại</th>
                    <th>Tên loại</th>
                    <th>Hình ảnh</th>
                    <th>Mô tả</th>
                    <th>Số lượng SP</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($categories) && !empty($categories)) : ?>
                    <?php foreach ($categories as $key => $category) :
                        extract($category);
                        if (isset($id) && $id) {
                            // $detail = "index.php?act=admin_categories_detail&id=" . $id;
                            $update = "index.php?act=admin_categories_edit&id=" . $id;
                            $delete = "index.php?act=admin_categories_delete&id=" . $id;
                        }
                    ?>
                        <tr>
                            <td><input class="form-check-input" type="checkbox"></td>
                            <td><?= (isset($id) && $id) ? $id : ""; ?></td>
                            <td><?= (isset($name) && $name) ? $name : ""; ?></td>
                            <td>
                                <img src="<?= (isset($image_url) && $image_url) ? $image_url : ""; ?>" alt="<?= (isset($image_alt) && $image_alt) ? $image_alt : ""; ?>" style="width: 30px; height: 25px;">
                            </td>
                            <td><?= (isset($description) && $description != "") ? $description : "Không có mô tả!" ?></td>
                            <td><?= (isset($quantity_product) && $quantity_product != "") ? $quantity_product : "" ?></td>
                            <td>
                                <!-- <a href="<?= $detail ?>" class="btn btn-outline-primary btn-sm">Chi tiết</a> -->
                                <a href="<?= (isset($update) && $update) ? $update : ""; ?>" class="btn btn-success btn-sm">Sửa</a>
                                <a href="<?= (isset($delete) && $delete) ? $delete : ""; ?>" onclick="return confirm('Bạn có muốn xóa không')" class="btn btn-outline-danger btn-sm">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="12" class="text-danger">Chưa có danh mục nào!</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="mb-3">
        <a href="index.php?act=admin_categories_create" name="add-new" class="btn btn-primary">Thêm mới</a>
        <input type="submit" value="Chọn tất cả" class="btn btn-outline-dark">
        <input type="submit" value="Bỏ chọn tất cả" class="btn btn-outline-dark">
        <input type="submit" value="Xóa mục đã chọn" class="btn btn-outline-danger">
    </div>
</div>