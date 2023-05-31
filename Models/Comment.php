<?php
function postComment($id_user, $id_product, $content)
{
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $cmt_time = date('Y-m-d H:i:s');

    $sql = "INSERT INTO `comments`( `id_user`, `id_product`,`content`, `cmt_time`)
     VALUES ('$id_user','$id_product','$content','$cmt_time')";

    return  pdo_execute($sql);
}

function getCommentsOneProduct($id_product)
{
    $sql = "SELECT * FROM `comments`
     JOIN users ON users.id = comments.id_user
     WHERE id_product=$id_product
     ORDER BY cmt_time DESC";

    return pdo_query($sql);
}
