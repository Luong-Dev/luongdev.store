<div class="container">
    <div class="mb-5 row flex align-items-center">
        <div class="col-lg-5">
            <h1 class="">Danh sách sản phẩm</h1>
        </div>
        <div class="col-lg-7">
            <form class="d-flex row" action="index.php?act=admin_products" method="post">
                <div class="col-md-3">
                    <select name="productCategorySearch" class="form-select" aria-label="Default select example">
                        <option value="" selected style="display: none;">Danh mục</option>
                        <?php if (isset($productCategories) && $productCategories) : ?>
                            <?php foreach ($productCategories as $productCategory) : ?>
                                <option value="<?= isset($productCategory['id']) ? $productCategory['id'] : "" ?>"><?= isset($productCategory['name']) ? $productCategory['name'] : "" ?></option>
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
    <div class="table">
        <table class="table table-striped table-hover">
            <thead class="table-primary">
                <tr>
                    <th><input class="form-check-input" type="checkbox"></th>
                    <!-- <th>ID</th> -->
                    <th>Tên sản phẩm</th>
                    <th>Loại sản phẩm</th>
                    <th>Giá thường</th>
                    <th>Giá sale</th>
                    <th>Trạng thái</th>
                    <th>Lượt xem</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($products) && !empty($products)) : ?>
                    <?php foreach ($products as $key => $product) :
                        extract($product);
                        if (isset($id)) {
                            $update = "index.php?act=admin_products_edit&id=" . $id;
                            $delete = "index.php?act=admin_products_delete&id=" . $id;
                            $detail = "index.php?act=admin_products_detail&id=" . $id;
                        }
                    ?>
                        <tr>
                            <td><input class="form-check-input" type="checkbox"></td>
                            <!-- <td><?= isset($id)  ? $id : "" ?></td> -->
                            <td><?= isset($name) ? $name : "" ?></td>
                            <td>
                                <?php if (isset($productCategories) && $productCategories) : ?>
                                    <?php foreach ($productCategories as $productCategory) : ?>
                                        <?= isset($product_category_id) && $product_category_id == $productCategory['id'] ? $productCategory['name'] : "" ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>
                            <td><?= isset($regular_price) ? $regular_price : ""; ?></td>
                            <td><?= isset($sale_price) ? $sale_price : "" ?></td>
                            <td>
                                <?php if (defined('AR_STATUS') && is_array(AR_STATUS) && AR_STATUS) : ?>
                                    <?php foreach (AR_STATUS as $key => $item) : ?>
                                        <?= isset($status) && $status == $key + 1 ? $item : "" ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>
                            <td><?= isset($view_number) ? $view_number : "" ?></td>
                            <td>
                                <a href="<?= isset($detail) ? $detail : "" ?>" class="btn btn-primary btn-sm">Chi tiết</a>
                                <a href="<?= isset($update) ? $update : "" ?>" class="btn btn-outline-success btn-sm">Sửa</a>
                                <a href="<?= isset($delete) ? $delete : "" ?>" onclick="return confirm('Bạn có muốn xóa không')" class="btn btn-outline-danger btn-sm">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="12" class="text-danger text-center fw-bold fs-2">Chưa có sản phẩm nào!</td>
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