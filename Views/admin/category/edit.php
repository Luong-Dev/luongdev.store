<?php
if (isset($res)) {
    extract($res);
    if (isset($id) && $id) {
        $detail = "index.php?act=detail_category_admin&id=" . $id;
    }
}
?>

<div class="container">
    <h1 class="mb-5">Cập nhật danh mục sản phẩm "<?= (isset($name) && $name) ? $name : ""; ?>"</h1>
    <div class="mb-3">
        <p class="text-success">
            <?= (isset($message['success']) && $message['success']) ? $message['success'] : ""; ?>
        </p>
        <p class="text-danger">
            <?= (isset($message['error']) && $message['error']) ? $message['error'] : ""; ?>
        </p>
    </div>

    <form action="index.php?act=admin_categories_update" class="form" method="POST">
        <div class="row">
            <div class="col-md-6">
                <!-- <div class="mb-3">
                    <label for="exampleId" class="form-label">Mã loại</label>
                    <input type="text" name="id" class="form-control" id="exampleId" disabled value="<?= (isset($id) && $id) ? $id : ""; ?>">
                </div> -->
                <div class="mb-3">
                    <label for="exampleName" class="form-label">Tên danh mục<span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" id="exampleName" value="<?= (isset($name) && $name) ? $name : ""; ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleDescription" class="form-label">Mô tả</label>
                    <textarea name="description" id="exampleDescription" cols="30" rows="5" class="form-control"><?= (isset($description) && $description) ? $description : ""; ?></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleImageUrl" class="form-label">Hình ảnh</label>
                            <input type="file" name="imageUrl" class="form-control" id="exampleImageUrl">
                        </div>
                        <div class="mb-3">
                            <label for="exampleImageAlt" class="form-label">Mô tả dự phòng cho hình ảnh</label>
                            <textarea name="imageAlt" id="exampleImageAlt" cols="30" rows="5" class="form-control"><?= (isset($image_alt) && $image_alt) ? $image_alt : ""; ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img class="mt-5" src="<?= (isset($image_url) && $image_url) ? $image_url : ""; ?>" alt="<?= (isset($image_alt) && $image_alt) ? $image_alt : ""; ?>">
                    </div>
                </div>
            </div>
        </div>



        <div class="mb-3">
            <input type="hidden" name="idData" class="form-control" value="<?= (isset($id) && $id) ? $id : ""; ?>">
            <input type="submit" onclick="return confirm('Bạn có muốn cập nhật không')" name="update" value="Cập nhật" class="btn btn-primary"></input>
            <input type="reset" class="btn btn-outline-danger" value="Nhập lại"></input>
            <!-- <a href="<?= $detail ?>" class="btn btn-outline-dark">Xem lại chi tiết</a> -->
            <a href="index.php?act=admin_categories" class="btn btn-outline-success">Danh sách</a>
        </div>
    </form>
</div>