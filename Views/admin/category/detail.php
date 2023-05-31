<?php
if (isset($res)) {
    extract($res);
    $update = "index.php?act=update_category&id=" . $id;
    $delete = "index.php?act=delete_category&id=" . $id;
}
?>

<div class="container">
    <h1 class="mb-5">Chi tiết danh mục "<?= (isset($name) && $name) ? $name : ""; ?>"</h1>
    <div class="mb-3">
        <p class="text-success">
            <?= (isset($message['success']) && $message['success']) ? $message['success'] : ""; ?>
        </p>
        <p class="text-danger">
            <?= (isset($message['error']) && $message['error']) ? $message['error'] : ""; ?>
        </p>
    </div>

    <div class="wrap mt-5">

    </div>

    <form action="index.php?act=put_category" class="form" method="POST">
        <div class="mb-3">
            <label for="exampleId" class="form-label">Mã loại</label>
            <input type="text" name="id" class="form-control" id="exampleId" disabled value="<?= (isset($id) && $id) ? $id : ""; ?>">
        </div>
        <div class="mb-3">
            <label for="exampleName" class="form-label">Tên danh mục</label>
            <input type="text" name="name" class="form-control" id="exampleName" value="<?= (isset($name) && $name) ? $name : ""; ?>">
        </div>
        <div class="mb-3">
            <label for="exampleDescription" class="form-label">Mô tả</label>
            <input type="text" name="description" class="form-control" id="exampleDescription" value="<?= (isset($description) && $description) ? $description : ""; ?>">
        </div>
        <div class="mb-3">
            <label for="exampleImageUrl" class="form-label">Hình ảnh</label>
            <input type="file" name="image_url" class="form-control" id="exampleImageUrl">
            <img src="<?= (isset($image_url) && $image_url) ? $image_url : ""; ?>" alt="<?= (isset($image_alt) && $image_alt) ? $image_alt : ""; ?>">
        </div>
        <div class="mb-3">
            <label for="exampleImageAlt" class="form-label">Mô tả dự phòng cho hình ảnh</label>
            <input type="text" name="image_alt" value="<?= (isset($image_alt) && $image_alt) ? $image_alt : ""; ?>" class="form-control" id="exampleImageAlt">
        </div>
        <div class="mb-3">
            <a href="index.php?act=list_category" class="btn btn-outline-success">Danh sách</a>
            <a href="<?= $update ?>" class="btn btn-success">Sửa</a>
            <a href="<?= $delete ?>" onclick="return confirm('Bạn có muốn xóa không')" class="btn btn-outline-danger">Xóa</a>
        </div>
    </form>
</div>