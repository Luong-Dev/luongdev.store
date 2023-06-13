<?php
include_once "./Models/Db.php";

function getOrdersOneUser($userId)
{
    $sql = "SELECT O.order_code, COUNT(OD.product_id) AS quantity_product, O.price_total, O.ship, O.payment_price, O.status FROM `orders` O
    JOIN `order_details` OD ON O.order_code = OD.order_code
    WHERE O.user_id = ?
    GROUP BY O.order_code
    ORDER BY O.created_at";

    return pdo_query($sql, $userId);
}

function getOrderWhereCode($orderCode)
{
    $sql = "SELECT * FROM `orders` WHERE order_code = ?";

    return pdo_query_one($sql, $orderCode);
}

function postOrder($orderCode, $name, $phoneNumber, $address, $priceTotal, $ship = 0, $paymentTotal, $note, $status = 1, $createAt, $userId)
{
    $sql = "INSERT INTO `orders`(`order_code`,`name`, `phone_number`, `address`, `price_total`, `ship`, `payment_price`, `note`, `status`, `created_at`, `user_id`) 
    VALUES (?,?,?,?,?,?,?,?,?,?,?)";

    return  pdo_execute($sql, $orderCode, $name, $phoneNumber, $address, $priceTotal, $ship, $paymentTotal, $note, $status, $createAt, $userId);
}

function postOrderDetail($productId, $orderCode, $quantity, $salePrice, $regularPrice, $priceTotal)
{
    $sql = "INSERT INTO `order_details`(`product_id`, `order_code`, `quantity`, `sale_price`, `regular_price`, `price_total`) 
    VALUES (?,?,?,?,?,?)";

    return  pdo_execute($sql, $productId, $orderCode, $quantity, $salePrice, $regularPrice, $priceTotal);
}

function putOder()
{
}
