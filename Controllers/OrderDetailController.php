<?php
include_once './Controllers/OrderDetailController.php';

function OrderDetailControl()
{
    // $orders = getOrdersOneUser($_SESSION['user']['id']);
    // var_dump($orders);
    include "./Views/user/layouts/header.php";
    include "./Views/user/orderDetail/index.php";
    include "./Views/user/layouts/footer.php";
}