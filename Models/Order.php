<?php
include_once "./Models/Db.php";

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
