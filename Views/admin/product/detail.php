<div class="container">
    <?php
    extract($product);
    $update = "index.php?act=admin_products_edit&id=" . $id;
    $delete = "index.php?act=admin_products_delete&id=" . $id;
    ?>
    <h1 class="mb-5">Chi tiết sản phẩm: "<?= isset($name) && $name != '' ? $name : "Thông tin trống!" ?>"</h1>
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="exampleModule" class="form-label">Mã sản phẩm: </label>
                <p class="form-control"><?= isset($module) && $module != '' ? $module : "Thông tin trống!" ?></p>
            </div>
            <div class="mb-3">
                <label for="exampleName" class="form-label">Tên sản phẩm: </label>
                <p class="form-control"><?= isset($name) && $name != '' ? $name : "Thông tin trống!" ?></p>
            </div>
            <div class="mb-3">
                <label for="exampleQuantity" class="form-label">Số lượng: </label>
                <p class="form-control"><?= isset($quantity) ? $quantity : "" ?></p>
            </div>
            <div class="mb-3">
                <label for="exampleSize" class="form-label">Kích thước: (Inch)</label>
                <p class="form-control"><?= isset($size) ? $size : "" ?></p>
            </div>
            <div class="mb-3">
                <label for="exampleStatus" class="form-label">Trạng thái:</label>
                <p class="form-control">
                    <?php
                    if (defined('AR_STATUS') && is_array(AR_STATUS) && AR_STATUS) {
                        foreach (AR_STATUS as $key => $item) {
                            if (isset($status) && $key + 1 == $status) {
                                echo $item;
                                break;
                            }
                        }
                    }
                    ?>
                </p>
            </div>
            <div class="mb-3">
                <label for="exampleShortDescription" class="form-label">Mô tả ngắn:</label>
                <p class="form-control"><?= isset($short_description) && $short_description != ''  ? $short_description : "Thông tin trống!" ?></p>
            </div>
            <div class="mb-3">
                <label for="exampleLongDescription" class="form-label">Mô tả chi tiết:</label>
                <p class="form-control"><?= isset($long_description)  && $long_description != '' ? $long_description : "Thông tin trống!" ?></p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="exampleProductCategoryId" class="form-label ">Loại hàng: </label>
                <p class="form-control">
                    <?php
                    if (isset($productCategories) && $productCategories) {
                        foreach ($productCategories as $productCategory) {
                            if (isset($productCategory['id']) && isset($product_category_id)  &&  $productCategory['id'] == $product_category_id) {
                                echo $productCategory['name'];
                                break;
                            }
                        }
                    }
                    ?>
                </p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="exampleRegularPrice" class="form-label">Giá thường:</label>
                    <p class="form-control"><?= isset($regular_price) ? $regular_price : "" ?></p>
                </div>
                <div class="col-md-6">
                    <label for="exampleSalePrice" class="form-label">Giá sale: </label>
                    <p class="form-control"><?= isset($sale_price) ? $sale_price : "" ?></p>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleColor" class="form-label">Màu sắc:</label>
                <p class="form-control"><?= isset($color) && $color != '' ? $color : "Thông tin trống!" ?></p>
            </div>
            <div class="mb-3">
                <label for="exampleImportTime" class="form-label">Thời gian nhập hàng:</label>
                <p class="form-control"><?= isset($created_at) && $created_at != '' ? $created_at : "Thông tin trống!" ?></p>
            </div>
            <div class="text-center">
                <?php if (isset($image)) : ?>
                    <p class="mt-2 text-success">Hình ảnh hiện tại: </p>
                    <img src="<?= $image ?>" alt="Hình ảnh sản phẩm" style="width: 50%;">
                <?php else : ?>
                    <p class="mt-2 text-warning">Sản phẩm chưa có hình ảnh!</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <a href="index.php?act=admin_products" class="btn btn-primary">Danh sách</a>
        <a href="<?= isset($update) ? $update : "" ?>" class="btn btn-outline-success">Sửa thông tin</a>
        <a href="<?= isset($delete) ? $delete : "" ?>" onclick="return confirm('Bạn có muốn xóa không')" class="btn btn-outline-danger">Xóa</a>
    </div>
</div>