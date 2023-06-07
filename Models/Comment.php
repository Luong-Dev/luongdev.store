<?php
function postComment($user_id, $productId, $content)
{
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $created_at = date('Y-m-d H:i:s');

    $sql = "INSERT INTO `comments`( `user_id`, `product_id`,`content`, `created_at`)
     VALUES (?,?,?,'$created_at' )";

    return  pdo_execute($sql, $user_id, $productId, $content);
}

function getCommentsInProduct($productId)
{
    $sql = "SELECT C.content, C.created_at, U.name, U.avatar, U.role, U.status 
    FROM `comments` C
    JOIN users U ON U.id = C.user_id
    WHERE C.product_id = ?
    ORDER BY C.created_at DESC";

    return pdo_query($sql, $productId);
}
