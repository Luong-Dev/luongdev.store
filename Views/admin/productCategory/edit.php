<?php
extract($productCategory);
?>
<div class="container">
    <h1 class="mt-5">Cập nhật danh mục sản phẩm: "<?= isset($name) ? $name : "" ?>"</h1>
    <div class="mb-3 notify">
        <p class="text-success">
            <?= isset($message['success']) ? $message['success'] : "" ?>
        </p>
        <p class="text-danger">
            <?= isset($message['error']) ? $message['error'] : "" ?>
        </p>
    </div>
    <form action="index.php?act=admin_product_categories_update" class="form" method="POST">
        <div class="mb-3">
            <label for="exampleName" class="form-label">Tên danh mục<span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" id="exampleName" value="<?= isset($name) ? $name : "" ?>">
        </div>
        <div class="mb-3">
            <input type="hidden" name="idData" class="form-control" value="<?= isset($id) ? $id : "" ?>">
            <input type="submit" onclick="return confirm('Bạn có muốn cập nhật không')" name="update" value="Cập nhật" class="btn btn-primary"></input>
            <input type="reset" class="btn btn-outline-danger" value="Nhập lại"></input>
            <a href="index.php?act=admin_product_categories" class="btn btn-outline-success">Danh sách</a>
        </div>
    </form>
</div>