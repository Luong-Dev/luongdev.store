<?php
include_once './Models/OrderDetail.php';

// admin
function OrderDetailsControl()
{
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $orderCode = $_GET['id'];
        $orderDetails = getOrderDetails($orderCode);
        if ($orderDetails) {
            $order = getOrderWhereCode($orderCode);
            include "./Views/admin/layouts/header.php";
            include "./Views/admin/orderDetail/index.php";
            include "./Views/admin/layouts/footer.php";
        } else {
            $_SESSION['notify']['error'] = "Đơn hàng không tồn tại!";
            header("location: " . URL_ORDER_A);
        }
    } else {
        $_SESSION['notify']['error'] = "Đơn hàng không tồn tại!";
        header("location: " . URL_ORDER_A);
    }
}

// user
function OrderDetailsUserControl()
{
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $orderCode = $_GET['id'];
        $orderDetails = getOrderDetails($orderCode);
        if ($orderDetails) {
            $order = getOrderWhereCode($orderCode);
            include "./Views/user/layouts/header.php";
            include "./Views/user/orderDetail/index.php";
            include "./Views/user/layouts/footer.php";
        } else {
            $_SESSION['notify']['error'] = "Đơn hàng không tồn tại!";
            header("location: " . URL_ORDER_U);
        }
    } else {
        $_SESSION['notify']['error'] = "Đơn hàng không tồn tại!";
        header("location: " . URL_ORDER_U);
    }
}
