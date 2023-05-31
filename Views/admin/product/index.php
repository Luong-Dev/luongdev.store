<div class="container">
    <div class="mb-5 row flex align-items-center">
        <div class="col-md-5">
            <h1 class="">Danh sách sản phẩm</h1>
        </div>
        <div class="col-md-7">
            <form class="d-flex row" action="index.php?act=admin_products" method="post">
                <div class="col-md-3">
                    <select name="categorySearch" class="form-select" aria-label="Default select example">
                        <option value="0" selected style="display: none;">Danh mục</option>
                        <?php if (isset($categories) && $categories) : ?>
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?= isset($category['id']) && $category['id'] ? $category['id'] : "" ?>"><?= isset($category['name']) && $category['name'] ? $category['name'] : "" ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="col-md-9 d-flex">
                    <input name="productSearch" class="form-control me-2" type="search" placeholder="Nhập tên sản phẩm" aria-label="Search">
                    <button class="btn btn-outline-success" name="btn-top-search" type="submit"><i class="ti-search fs-6"></i></button>
                </div>
            </form>
        </div>
    </div>
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
                    <th>Mã SP</th>
                    <th>Tên sản phẩm</th>
                    <th>Loại sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Mô tả ngắn</th>
                    <!-- còn mô tả dài khi hover vào sẽ ra -->
                    <th>Giá thường</th>
                    <th>Giá sale</th>
                    <th>Ngày nhập</th>
                    <th>Trạng thái</th>
                    <th>Lượt xem</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($products) && !empty($products)) : ?>
                    <?php foreach ($products as $key => $product) :
                        extract($product);
                        if (isset($id) && $id) {
                            $update = "index.php?act=admin_products_edit&id=" . $id;
                            $delete = "index.php?act=admin_products_delete&id=" . $id;
                        }
                    ?>
                        <tr>
                            <td><input class="form-check-input" type="checkbox"></td>
                            <td><?= (isset($id) && $id) ? $id : ""; ?></td>
                            <td><?= (isset($name) && $name) ? $name : ""; ?></td>
                            <td>
                                <?php if (isset($categories) && $categories) : ?>
                                    <?php foreach ($categories as $category) : ?>
                                        <?= (isset($category_id) && $category_id && $category_id == $category['id']) ? $category['name'] : ""; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <img src="<?= (isset($image_url) && $image_url) ? $image_url : ""; ?>" alt="<?= (isset($image_alt) && $image_alt) ? $image_alt : ""; ?>" style="width: 30px; height: 25px;">
                            </td>
                            <!-- <?= (isset($name) && $name) ? $name : ""; ?> -->
                            <!-- <?= (isset($long_description) && $long_description != "") ? $long_description : "Không có mô tả!" ?> -->
                            <td><?= (isset($short_description) && $short_description != "") ? $short_description : "Không có mô tả!" ?></td>
                            <td><?= (isset($regular_price) && $regular_price) ? $regular_price : ""; ?></td>
                            <td><?= (isset($sale_price) && $sale_price) ? $sale_price : ""; ?></td>
                            <td><?= (isset($import_time) && $import_time) ? $import_time : ""; ?></td>
                            <td>
                                <?php if (isset($arrStatus) && $arrStatus) : ?>
                                    <?php foreach ($arrStatus as $key => $item) : ?>
                                        <?= (isset($status) && $status && $status == $key + 1) ? $item : ""; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>
                            <!-- <p class="text-danger">check lại toàn bộ biến isset 0;</p> -->
                            <td><?= (isset($view_number)) ? $view_number : ""; ?></td>
                            <td>
                                <a href="<?= (isset($update) && $update) ? $update : ""; ?>" class="btn btn-success btn-sm">Chi tiết, Sửa</a>
                                <a href="<?= (isset($delete) && $delete) ? $delete : ""; ?>" onclick="return confirm('Bạn có muốn xóa không')" class="btn btn-outline-danger btn-sm">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="12" class="text-danger">Chưa có sản phẩm nào!</td>
                    </tr>
                <?php endif; ?>


            </tbody>
        </table>
    </div>
    <div class="mb-3">
        <a href="index.php?act=admin_products_create" name="add-new" class="btn btn-primary">Thêm mới</a>
        <input type="submit" value="Chọn tất cả" class="btn btn-outline-dark">
        <input type="submit" value="Bỏ chọn tất cả" class="btn btn-outline-dark">
        <input type="submit" value="Xóa mục đã chọn" class="btn btn-outline-danger">
    </div>
</div>