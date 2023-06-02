<div class="container">
    <h1 class="mb-5">Thêm mới sản phẩm</h1>
    <form action="index.php?act=admin_products_create" class="form" method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleModule" class="form-label">Mã sản phẩm</label>
                    <input name="module" autofocus type="text" class="form-control" id="exampleModule">
                </div>
                <div class="">
                    <label for="exampleName" class="form-label">Tên sản phẩm <span class="text-danger">*</span></label>
                    <input name="name" type="text" class="form-control" id="exampleName">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleProductCategoryId" class="form-label ">Loại hàng <span class="text-danger">*</span></label>
                    <select name="productCategoryId" class="form-select" id="exampleProductCategoryId" aria-label="Default select example">
                        <option value="0" style="display: none;">Mở chọn danh mục loại hàng</option>
                        <?php if (isset($productCategories) && $productCategories) : ?>
                            <?php foreach ($productCategories as $productCategory) : ?>
                                <option value="<?= isset($productCategory['id']) && $productCategory['id'] ? $productCategory['id'] : "" ?>"><?= isset($productCategory['name']) && $productCategory['name'] ? $productCategory['name'] : "" ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="exampleRegularPrice" class="form-label">Giá thường <span class="text-danger">*</span></label>
                        <input name="regularPrice" type="number" class="form-control" id="exampleRegularPrice">
                    </div>
                    <div class="col-md-6">
                        <label for="exampleSalePrice" class="form-label">Giá sale</label>
                        <input name="salePrice" type="number" class="form-control" id="exampleSalePrice">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-4">
                <label for="exampleSize" class="form-label">Kích thước (Inch)</label>
                <input name="size" type="number" class="form-control" id="exampleSize">
            </div>
            <div class="col-lg-4">
                <label for="exampleColor" class="form-label">Màu sắc</label>
                <input name="color" type="text" class="form-control" id="exampleColor">
            </div>
            <div class="col-lg-4">
                <label for="exampleTrademark" class="form-label">Thương hiệu</label>
                <input name="trademark" type="text" class="form-control" id="exampleTrademark">
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleShortDescription" class="form-label">Mô tả ngắn</label>
            <textarea name="shortDescription" id="exampleShortDescription" cols="30" rows="1" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleLongDescription" class="form-label">Mô tả chi tiết</label>
            <textarea name="longDescription" id="exampleLongDescription" cols="30" rows="5" class="form-control"></textarea>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="exampleStatus" class="form-label">Trạng thái</label>
                <select name="status" class="form-select" id="exampleStatus" aria-label="Default select example">
                    <option value="0" selected style="display: none;">Mở chọn trạng thái hàng hóa</option>
                    <?php if (defined('AR_STATUS') && is_array(AR_STATUS) && AR_STATUS) : ?>
                        <?php foreach (AR_STATUS as $key => $status) : ?>
                            <option value="<?= isset($key) ? ($key + 1) : "" ?>"><?= isset($status) && $status ? $status : "" ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="exampleImportTime" class="form-label">Thời gian nhập hàng</label>
                <input type="date" name="importTime" id="exampleImportTime" class="form-control">
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleImageUpload" class="form-label">Hình ảnh</label>
            <input type="file" name="imageUpload" class="form-control" id="exampleImageUpload">
        </div>
        <div class="mb-3">
            <input type="submit" name="add-new" value="Thêm mới" class="btn btn-primary"></input>
            <input type="reset" class="btn btn-outline-danger" value="Nhập lại"></input>
            <a href="index.php?act=admin_products" class="btn btn-outline-success">Danh sách</a>
        </div>
    </form>
</div>
<!-- <script>
    let form = document.querySelector(".form");
    form.addEventListener("click", function(e) {
        e.preventDefault();
        var test = < echo json_encode($a); viết php? vào phía trước ?>;
        console.log(test);
    })
</script> -->