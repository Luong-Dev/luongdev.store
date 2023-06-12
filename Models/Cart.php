<?php
include_once "./Models/Db.php";

function getCart($id)
{
    $sql = "SELECT * FROM `carts` WHERE id = ?";

    return pdo_query_one($sql, $id);
}

function getCartWithOther($productId, $userId)
{
    $sql = "SELECT * FROM `carts` WHERE product_id = ? AND user_id = ?";

    return pdo_query_one($sql, $productId, $userId);
}

function getCartsOneUser($userId)
{
    $sql = "SELECT PR.id AS product_id, PR.name, PR.image, PR.regular_price, PR.sale_price, PR.color,
     PR.size, PR.quantity AS product_quantity, PR.status, C.id AS cart_id, C.quantity AS cart_quantity
    FROM `carts` C
    JOIN products PR ON PR.id = C.product_id
    WHERE C.user_id =?";

    return pdo_query($sql, $userId);
}

function deleteCart($id)
{
    $sql = "DELETE FROM `carts` WHERE id= ?";
    pdo_execute($sql, $id);
}

function deleteFullCartOneUser($id)
{
    $sql = "DELETE FROM `carts` WHERE user_id= ?";
    pdo_execute($sql, $id);
}

function postCart($quantity, $productId, $userId)
{
    $sql = "INSERT INTO `carts`(`quantity`, `product_id`, `user_id`) VALUES (?,?,?)";

    return  pdo_execute($sql, $quantity, $productId, $userId);
}

function putQuantityCartHaveSum($quantity, $id)
{
    $sql = "UPDATE `carts` SET `quantity` = `quantity` + ? WHERE id = ?";

    pdo_execute($sql, $quantity, $id);
}

function putQuantityCartNoSum($quantity, $id)
{
    $sql = "UPDATE `carts` SET `quantity` = ? WHERE id = ?";

    pdo_execute($sql, $quantity, $id);
}
