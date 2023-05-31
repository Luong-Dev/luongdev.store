<?php
include_once '../../../Models/Db.php';
include_once '../../../Models/Comment.php';
// include_once '../../../Controllers/CommentController.php';
session_start();

if (isset($_REQUEST['productId']) && $_REQUEST['productId']) {
    $productId = $_REQUEST['productId'];
}
if (isset($_POST['id']) && $_POST['id']) {
    $productId = $_POST['id'];
}
if (isset($_POST['comment']) && $_POST['comment']) {
    $content = $_POST['content'];
    postComment($_SESSION['user']['id'], $productId, $content);
}
$comments = getCommentsOneProduct($productId);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../resources/icons/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../../../resources/css/user/base.css">
    <link rel="stylesheet" href="../../../resources/css/user/product-detail.css">
    <style>
        .product-comment__list {}

        .form__fixed {
            /* position: fixed; */
            background-color: antiquewhite;
        }
    </style>
</head>

<body>

    <div class="product-detail__comment-wrap">
        <div class="form__fixed">
            <h4 class="product-comment__title">Bình luận</h4>
            <?php
            if (isset($_SESSION['user']) && !empty($_SESSION['user'])) :
            ?>
                <div class="product-comment__logined">
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" class="product-comment__form-comment" method="post">
                        <label for="product-comment" class="product-comment__form-label">Nhập bình luận của bạn:</label>
                        <textarea class="product-comment__form-input form-control" name="content" id="product-comment" cols="30" rows="5"></textarea>
                        <input hidden type="text" name="id" value="<?= (isset($productId) && $productId) ? $productId : ""; ?>">
                        <input type="submit" name="comment" id="" class="product-comment__form-submit" value="Bình luận">
                    </form>
                </div>
            <?php else : ?>
                <h5 class="product-comment__not-login">
                    <!-- Bạn cần <a href="../../../index.php?act=login" class="product-comment__link">đăng nhập</a> để bình luận! -->
                    Bạn cần <a href="" class="product-comment__link">đăng nhập</a> để bình luận!
                </h5>
            <?php endif; ?>
        </div>

        <div class="product-comment__list">
            <?php
            foreach ($comments as $comment) :
                extract($comment);
            ?>
                <div class="product-comment__item">
                    <div class="product-comment__item-image-wrap">
                        <?php if (isset($image_url) && $image_url) : ?>
                            <img src="<?= $image_url?>" alt="" class="product-comment__item-image">
                        <?php else : ?>
                            <img src="https://icons.veryicon.com/png/o/miscellaneous/administration/account-25.png" alt="avatar" class="product-comment__item-image">
                        <?php endif; ?>
                        <p class="product-comment__item-user-name"><?= (isset($name) && $name) ? $name : ""; ?></p>
                    </div>
                    <div class="product-comment__item-content-wrap">
                        <p class="product-comment__content-comment">
                            <?= (isset($content) && $content) ? $content : ""; ?>
                        </p>
                        <span class="product-comment__time-comment"><?= (isset($cmt_time) && $cmt_time) ? $cmt_time : ""; ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>