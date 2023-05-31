<?php
if (isset($product)) {
    extract($product);
    // if (isset($id) && $id) {
    //     $detail = "index.php?act=detail_category_admin&id=" . $id;
    // }
    // var_dump($product);
}
?>

<div class="container">
    <h1 class="mb-5">Cập nhật sản phẩm "<?= (isset($name) && $name) ? $name : ""; ?>"</h1>
    <div class="mb-3">
        <p class="text-success">
            <?= (isset($message['success']) && $message['success']) ? $message['success'] : ""; ?>
        </p>
        <p class="text-danger">
            <?= (isset($message['error']) && $message['error']) ? $message['error'] : ""; ?>
        </p>
    </div>

    <form action="index.php?act=admin_products_update" class="form" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleCode" class="form-label">Mã hàng</label>
                    <input value="<?= (isset($code) && $code) ? $code : ""; ?>" name="code" autofocus type="text" class="form-control" id="exampleCode">
                </div>
                <div class="">
                    <label for="exampleName" class="form-label">Tên sản phẩm <span class="text-danger">*</span></label>
                    <input value="<?= (isset($name) && $name) ? $name : ""; ?>" name="name" type="text" class="form-control" id="exampleName" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleCategoryId" class="form-label ">Loại hàng <span class="text-danger">*</span></label>
                    <select name="categoryId" class="form-select" id="exampleCategoryId" aria-label="Default select example">
                        <option value="0" style="display: none;">Mở chọn danh mục loại hàng</option>
                        <?php if (isset($categories) && $categories) : ?>
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?= isset($category['id']) && $category['id'] ? $category['id'] : "" ?>" <?= isset($category['id']) && $category['id'] && isset($category_id) && $category_id &&  $category['id'] == $category_id ? "selected" : "" ?>><?= isset($category['name']) && $category['name'] ? $category['name'] : "" ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="">
                                <label for="exampleRegularPrice" class="form-label">Giá thường <span class="text-danger">*</span></label>
                                <input value="<?= (isset($regular_price) && $regular_price) ? $regular_price : ""; ?>" name="regularPrice" type="number" class="form-control" id="exampleRegularPrice" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <label for="exampleSalePrice" class="form-label">Giá sale</label>
                                <input value="<?= (isset($sale_price) && $sale_price) ? $sale_price : ""; ?>" name="salePrice" type="number" class="form-control" id="exampleSalePrice" aria-describedby="emailHelp">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleShortDescription" class="form-label">Mô tả ngắn</label>
                    <textarea name="shortDescription" id="exampleShortDescription" cols="30" rows="1" class="form-control"><?= (isset($short_description) && $short_description) ? $short_description : ""; ?></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleImageUpload" class="form-label">Hình ảnh</label>
                    <input type="file" name="imageUpload" class="form-control" id="exampleImageUpload">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="mb-3">
                                <label for="exampleLongDescription" class="form-label">Mô tả chi tiết</label>
                                <textarea name="longDescription" id="exampleLongDescription" cols="30" rows="5" class="form-control"><?= (isset($long_description) && $long_description) ? $long_description : ""; ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="exampleImageAlt" class="form-label">Mô tả dự phòng cho hình ảnh</label>
                                <textarea name="imageAlt" id="exampleImageAlt" cols="30" rows="5" class="form-control"><?= (isset($image_alt) && $image_alt) ? $image_alt : ""; ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleStatus" class="form-label">Trạng thái</label>
                        <select name="status" class="form-select" id="exampleStatus" aria-label="Default select example">
                            <option value="0" selected style="display: none;">Mở chọn trạng thái hàng hóa</option>
                            <?php if (isset($arrStatus) && $arrStatus) : ?>
                                <?php foreach ($arrStatus as $key => $item) : ?>
                                    <option value="<?= $key + 1 ?>" <?= isset($status) && $status && $key + 1 == $status ? "selected" : "" ?>><?= isset($item) ? $item : "" ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleImportTime" class="form-label">Thời gian nhập hàng</label>
                        <input value="<?= (isset($import_time) && $import_time) ? $import_time : ""; ?>" type="date" name="importTime" id="exampleImportTime" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="example" class="form-label">Để khoảng chèn cho thương hiệu</label>
                        <input name="imageAlt" id="example" class="form-control" disabled></input>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <?php if (isset($image_url) && $image_url) : ?>
                            <img src="<?= $image_url ?>" alt="<?= (isset($image_alt) && $image_alt) ? $image_alt : ""; ?>" class=" mt-4" style="width: 100%; max-height: 100%;">
                        <?php else : ?>
                            <p class="mt-4 text-warning">Sản phẩm chưa có hình ảnh!</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <input type="hidden" name="idData" class="form-control" value="<?= (isset($id) && $id) ? $id : ""; ?>">
            <input type="submit" name="update" value="Cập nhật" class="btn btn-primary"></input>
            <!-- onclick="return confirm('Bạn có muốn cập nhật không')"  -->
            <input type="reset" class="btn btn-outline-danger" value="Nhập lại"></input>
            <!-- <a href="<?= $detail ?>" class="btn btn-outline-dark">Xem lại chi tiết</a> -->
            <a href="index.php?act=admin_products" class="btn btn-outline-success">Danh sách</a>
        </div>
    </form>
</div>