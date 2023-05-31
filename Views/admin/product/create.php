<div class="container">
    <h1 class="mb-5">Thêm mới sản phẩm</h1>
    <div class="mb-3">
        <p class="text-success">
            <?= (isset($message['success']) && $message['success']) ? $message['success'] : ""; ?>
        </p>
        <p class="text-danger">
            <?= (isset($message['error']) && $message['error']) ? $message['error'] : ""; ?>
        </p>
    </div>
    <form action="index.php?act=admin_products_create" class="form" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleCode" class="form-label">Mã hàng</label>
                    <input name="code" autofocus type="text" class="form-control" id="exampleCode">
                </div>
                <div class="">
                    <label for="exampleName" class="form-label">Tên sản phẩm <span class="text-danger">*</span></label>
                    <input name="name" type="text" class="form-control" id="exampleName" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleCategoryId" class="form-label ">Loại hàng <span class="text-danger">*</span></label>
                    <select name="categoryId" class="form-select" id="exampleCategoryId" aria-label="Default select example">
                        <option value="0" style="display: none;">Mở chọn danh mục loại hàng</option>
                        <?php if (isset($categories) && $categories) : ?>
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?= isset($category['id']) && $category['id'] ? $category['id'] : "" ?>"><?= isset($category['name']) && $category['name'] ? $category['name'] : "" ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="">
                                <label for="exampleRegularPrice" class="form-label">Giá thường <span class="text-danger">*</span></label>
                                <input name="regularPrice" type="number" class="form-control" id="exampleRegularPrice" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <label for="exampleSalePrice" class="form-label">Giá sale</label>
                                <input name="salePrice" type="number" class="form-control" id="exampleSalePrice" aria-describedby="emailHelp">
                            </div>
                        </div>
                    </div>
                </div>
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
        <div class="row ">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleStatus" class="form-label">Trạng thái</label>
                    <select name="status" class="form-select" id="exampleStatus" aria-label="Default select example">
                        <option value="0" selected style="display: none;">Mở chọn trạng thái hàng hóa</option>
                        <?php if (isset($arrStatus) && $arrStatus) : ?>
                            <?php foreach ($arrStatus as $key => $status) : ?>
                                <option value="<?= isset($key) ? ($key + 1) : "" ?>"><?= isset($status) && $status ? $status : "" ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleImportTime" class="form-label">Thời gian nhập hàng</label>
                    <input type="date" name="importTime" id="exampleImportTime" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleImageUpload" class="form-label">Hình ảnh</label>
                    <input type="file" name="imageUpload" class="form-control" id="exampleImageUpload">
                </div>
                <div class="mb-3">
                    <label for="exampleImageAlt" class="form-label">Mô tả dự phòng cho hình ảnh</label>
                    <textarea name="imageAlt" id="exampleImageAlt" cols="30" rows="1" class="form-control"></textarea>
                </div>
            </div>
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