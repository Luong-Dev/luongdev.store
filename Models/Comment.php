<?php
// admin
function getCommentsHaveGroupBy()
{
    $sql = "SELECT PR.id, PR.name, COUNT(*) AS comment_quantity, MAX(CM.created_at) AS max_time, MIN(CM.created_at) AS min_time FROM `comments` CM
    LEFT JOIN products PR ON CM.product_id = PR.id
    GROUP BY CM.product_id
    ORDER BY PR.name ASC";

    return pdo_query($sql);
}

function getCommentsWhere($productId)
{
    $sql = "SELECT CM.id , CM.content, US.name, CM.created_at 
    FROM `comments`CM
    LEFT JOIN users US ON CM.user_id = US.id
    WHERE product_id = ?
    ORDER BY CM.created_at DESC";

    return pdo_query($sql, $productId);
}

function getComment($id)
{
    $sql = "SELECT * FROM `comments` WHERE id = ?";

    return pdo_query_one($sql, $id);
}

function deleteComment($id)
{
    $sql = "DELETE FROM `comments` WHERE id = ?";
    pdo_execute($sql, $id);
}

// user
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
