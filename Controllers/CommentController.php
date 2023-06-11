<?php
include_once './Models/Comment.php';
// Còn ở trong code php của file comments bên user nữa.

function  commentsControl()
{
    include "./Views/admin/layouts/header.php";

    $groupByProductComments = getCommentsHaveGroupBy();

    include "./Views/admin/comment/index.php";
    include "./Views/admin/layouts/footer.php";
}


function detailCommentControl()
{
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $productComments = getCommentsWhere($id);
        if ($productComments) {
            include "./Views/admin/layouts/header.php";
            include "./Views/admin/comment/detail.php";
            include "./Views/admin/layouts/footer.php";
        } else {
            $_SESSION['notify']['error'] = "Chi tiết không tồn tại";
            header("location: " . URL_CM);
        }
    } else {
        $_SESSION['notify']['error'] = "Chi tiết không tồn tại";
        header("location: " . URL_CM);
    }
}

function deleteCommentControl()
{
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $check = getComment($id);
        if ($check) {
            $productId = $check['product_id'];
            deleteComment($id);
            $_SESSION['notify']['success'] = 'Xóa thành công!';
            header("location: " . 'index.php?act=admin_comments_detail&id=' . $productId);
        } else {
            $_SESSION['notify']['error'] = "Bình luận không tồn tại!";
            header("location: " . URL_CM);
        }
    } else {
        $_SESSION['notify']['error'] = "Bình luận không tồn tại!";
        header("location: " . URL_CM);
    }
}
