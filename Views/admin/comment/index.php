<div class="container">
    <div class="mb-5 row flex align-items-center">
        <div class="col-lg-5">
            <h1 class="">Tổng hợp bình luận</h1>
        </div>
    </div>
    <div class="mt-3 notify">
        <?php if (isset($_SESSION['notify']['success'])) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $_SESSION['notify']['success'] ?>
                <button type="button" class="btn-close bg-danger" style="padding: 13px 40px;" data-bs-dismiss="alert" aria-label="Close"></button>
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
                    <th class="ps-3">Tên sản phẩm</th>
                    <th class="ps-3">Số lượng bình luận</th>
                    <th class="ps-3">Bình luận mới nhất</th>
                    <th class="ps-3">Bình luận cũ nhất</th>
                    <th class="ps-3">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($groupByProductComments) && !empty($groupByProductComments)) : ?>
                    <?php foreach ($groupByProductComments as $key => $groupByProductComment) :
                        extract($groupByProductComment);
                        if (isset($id)) {
                            $detail = "index.php?act=admin_comments_detail&id=" . $id;
                        }
                    ?>
                        <tr>
                            <td class="ps-3"><?= isset($name) ? $name : "" ?></td>
                            <td class="ps-3"><?= isset($comment_quantity) ? $comment_quantity : ""; ?></td>
                            <td class="ps-3"><?= isset($max_time) ? $max_time : "" ?></td>
                            <td class="ps-3"><?= isset($min_time) ? $min_time : "" ?></td>
                            <td class="ps-3">
                                <a href="<?= isset($detail) ? $detail : "" ?>" class="btn btn-primary btn-sm">Chi tiết</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="12" class="text-danger text-center fw-bold fs-2">Chưa có bình luận nào!</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>