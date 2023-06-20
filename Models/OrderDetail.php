<?php
include_once "./Models/Db.php";

function getOrderDetails($orderCode)
{
    $sql = "SELECT P.id, P.name, P.image, P.size, P.color, O.quantity, O.regular_price, O.sale_price, O.price_total 
    FROM `order_details` AS O
    JOIN products AS P ON P.id = O.product_id
    WHERE O.order_code = ?";

    return pdo_query($sql, $orderCode);
}
