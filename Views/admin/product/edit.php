<div class="container">
    <?php
    extract($product);
    $detail = "index.php?act=admin_products_detail&id=" . $id;
    ?>
    <h1 class="mb-5">Cập nhật sản phẩm: "<?= isset($name) ? $name : "" ?>"</h1>
    <form action="index.php?act=admin_products_update" class="form" method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleModule" class="form-label">Mã sản phẩm: </label>
                    <input value="<?= isset($module) ? $module : "" ?>" name="module" autofocus type="text" class="form-control" id="exampleModule">
                </div>
                <div class="mb-3">
                    <label for="exampleName" class="form-label">Tên sản phẩm: <span class="text-danger fw-bold">*</span></label>
                    <input value="<?= isset($name) ? $name : "" ?>" name="name" type="text" class="form-control" id="exampleName">
                </div>
                <div class="mb-3">
                    <label for="exampleQuantity" class="form-label">Số lượng: </label>
                    <input value="<?= isset($quantity) ? $quantity : "" ?>" name="quantity" type="number" class="form-control" id="exampleQuantity">
                </div>
                <div class="mb-3">
                    <label for="exampleSize" class="form-label">Kích thước: (Inch)</label>
                    <input value="<?= isset($size) ? $size : "" ?>" name="size" type="number" class="form-control" id="exampleSize">
                </div>
                <div class="mb-3">
                    <label for="exampleStatus" class="form-label">Trạng thái:</label>
                    <select name="status" class="form-select" id="exampleStatus" aria-label="Default select example">
                        <option value="" selected style="display: none;">Mở chọn trạng thái hàng hóa</option>
                        <?php if (defined('AR_STATUS') && is_array(AR_STATUS) && AR_STATUS) : ?>
                            <?php foreach (AR_STATUS as $key => $item) : ?>
                                <option value="<?= $key + 1 ?>" <?= isset($status) && $key + 1 == $status ? "selected" : "" ?>><?= $item ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleShortDescription" class="form-label">Mô tả ngắn:</label>
                    <textarea name="shortDescription" id="exampleShortDescription" cols="30" rows="1" class="form-control"><?= isset($short_description)  ? $short_description : "" ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleLongDescription" class="form-label">Mô tả chi tiết:</label>
                    <textarea name="longDescription" id="exampleLongDescription" cols="30" rows="5" class="form-control"><?= isset($long_description) ? $long_description : "" ?></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleProductCategoryId" class="form-label ">Loại hàng: <span class="text-danger fw-bold">*</span></label>
                    <select name="productCategoryId" class="form-select" id="exampleProductCategoryId" aria-label="Default select example">
                        <option value="" style="display: none;">Mở chọn danh mục loại hàng</option>
                        <?php if (isset($productCategories) && $productCategories) : ?>
                            <?php foreach ($productCategories as $productCategory) : ?>
                                <option value="<?= isset($productCategory['id']) ? $productCategory['id'] : "" ?>" <?= isset($productCategory['id']) && isset($product_category_id)  &&  $productCategory['id'] == $product_category_id ? "selected" : "" ?>>
                                    <?= isset($productCategory['name']) ? $productCategory['name'] : "" ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="exampleRegularPrice" class="form-label">Giá thường: <span class="text-danger fw-bold">*</span></label>
                        <input value="<?= isset($regular_price) ? $regular_price : "" ?>" name="regularPrice" type="number" class="form-control" id="exampleRegularPrice">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="exampleSalePrice" class="form-label">Giá sale: </label>
                        <input value="<?= isset($sale_price) ? $sale_price : "" ?>" name="salePrice" type="number" class="form-control" id="exampleSalePrice">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleColor" class="form-label">Màu sắc:</label>
                    <input value="<?= isset($color) ? $color : "" ?>" name="color" type="text" class="form-control" id="exampleColor">
                </div>
                <div class="mb-3">
                    <label for="exampleImportTime" class="form-label">Thời gian nhập hàng:</label>
                    <input value="<?= isset($created_at) ? $created_at : "" ?>" type="date" name="importTime" id="exampleImportTime" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleImageUpload" class="form-label">Hình ảnh:</label>
                    <input type="file" name="imageUpload" class="form-control" id="exampleImageUpload">
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
            <input type="hidden" name="idData" class="form-control" value="<?= isset($id) ? $id : "" ?>">
            <input type="submit" name="update" value="Cập nhật" onclick="return confirm('Bạn có muốn cập nhật không')" class="btn btn-primary"></input>
            <input type="reset" class="btn btn-outline-danger" value="Nhập lại"></input>
            <a href="<?= isset($detail) ? $detail : "" ?>" class="btn btn-outline-dark">Chi tiết</a>
            <a href="index.php?act=admin_products" class="btn btn-outline-success">Danh sách</a>
        </div>
    </form>
</div>