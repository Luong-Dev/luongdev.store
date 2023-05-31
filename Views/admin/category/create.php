<div class="container">
    <h1 class="mb-5">Thêm mới danh mục sản phẩm</h1>
    <div class="mb-3">
        <p class="text-success">
            <?= (isset($message['success']) && $message['success']) ? $message['success'] : ""; ?>
        </p>
        <p class="text-danger">
            <?= (isset($message['error']) && $message['error']) ? $message['error'] : ""; ?>
        </p>
    </div>
    <form action="index.php?act=admin_categories_create" class="form" method="POST">
        <!-- <div class="mb-3">
            <label for="exampleId" class="form-label">Mã loại</label>
            <input type="text" name="id" class="form-control" id="exampleId" disabled>
        </div> -->
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleName" class="form-label">Tên danh mục <span class="text-danger">*</span></label>
                    <input autofocus type="text" name="name" class="form-control" id="exampleName" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleImageUrl" class="form-label">Hình ảnh</label>
                    <input type="file" name="imageUrl" class="form-control" id="exampleImageUrl">
                </div>
                <div class="mb-3">
                    <label for="exampleImageAlt" class="form-label">Mô tả dự phòng cho hình ảnh</label>
                    <textarea name="imageAlt" id="exampleImageAlt" cols="30" rows="1" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleDescription" class="form-label">Mô tả</label>
                    <textarea name="description" id="exampleDescription" cols="30" rows="9" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <input type="submit" name="add-new" value="Thêm mới" class="btn btn-primary"></input>
            <input type="reset" class="btn btn-outline-danger" value="Nhập lại"></input>
            <a href="index.php?act=admin_categories" class="btn btn-outline-success">Danh sách</a>
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