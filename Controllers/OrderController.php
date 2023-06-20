<?php
include_once './Models/Order.php';

// admin
function ordersControl()
{
    $orders = getOrders();

    include "./Views/admin/layouts/header.php";
    include "./Views/admin/order/index.php";
    include "./Views/admin/layouts/footer.php";
}

function editOrdersControl()
{
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $orderCode = $_GET['id'];
        $order = getOrderWhereCode($orderCode);
        if ($order) {
            include "./Views/admin/layouts/header.php";
            include "./Views/admin/order/edit.php";
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

function updateOrdersControl()
{
    if (isset($_POST['update']) && $_POST['update']) {
        $code = $_POST['code'];
        $status = $_POST['status'];
        $deliveryTime = $_POST['deliveryTime'];
        // if (isset($_POST['deliveryTime']) && $_POST['delivery_time']) {
        //     $deliveryTime = $_POST['deliveryTime'];
        // }
        putOrder($status, $deliveryTime, $code);
        $_SESSION['notify']['success'] = 'Cập nhật thành công trạng thái đơn hàng: ' . $code;
        header("location: " . URL_ORDER_A);
    }
}


// user

function orderControl()
{
    $orders = getOrdersOneUser($_SESSION['user']['id']);
    include "./Views/user/layouts/header.php";
    include "./Views/user/order/index.php";
    include "./Views/user/layouts/footer.php";
}

function createOrderControl()
{
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phoneNumber = $_POST['phoneNumber'];
    $note = $_POST['note'];
    $carts = getCartsOneUser($_SESSION['user']['id']);
    if (isset($carts) && $carts) {
        do {
            $randCode = str_pad(rand(0, 9999999999), 10, '0', STR_PAD_LEFT);
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $orderCode = date('ymdH') . $randCode;
            $checkCodeOrder = getOrderWhereCode($orderCode);
            // sử dụng khung thời gian + mã random để có mã không trùng lặp kể cả thêm vào cùng 1 thời điểm.
            // sử dụng hàm date() lấy 2 số cuối của năm, bỏ đơn vị m và s để ổn định độ dài và tránh độ trễ khi thêm vào db làm cho lệch mã order; tránh trường hợp trong < 60p không thể insert hết order vào db.
        } while (isset($checkCodeOrder) && $checkCodeOrder);
        $priceTotal = 0;
        $ship = 30000;
        $createAt = date('Y-m-d H:i:s');
        $_SESSION['user']['role'] == 1 ? $status = 1 : $status = 2;
        foreach ($carts as $cart) {
            // var_dump($cart);
            if (isset($cart['sale_price'])) {
                $priceTotal += $cart['sale_price'] * $cart['cart_quantity'];
            } else {
                $priceTotal += $cart['regular_price'] * $cart['cart_quantity'];
            }
        }
        $cart['sale_price'] = Null;
        $paymentTotal = $priceTotal + $ship;
        postOrder($orderCode, $name, $phoneNumber, $address, $priceTotal, $ship, $paymentTotal, $note, $status, $createAt, $_SESSION['user']['id']);
        foreach ($carts as $cart) {
            if (isset($cart['sale_price'])) {
                $priceOneTotal = $cart['sale_price'] * $cart['cart_quantity'];
            } else {
                $priceOneTotal = $cart['regular_price'] * $cart['cart_quantity'];
            }
            postOrderDetail($cart['product_id'], $orderCode, $cart['cart_quantity'], $cart['sale_price'], $cart['regular_price'], $priceOneTotal);
            putQuantityProduct($cart['cart_quantity'], $cart['product_id']);
        }
        deleteFullCartOneUser($_SESSION['user']['id']);
        $_SESSION['notify']['success'] = "Đặt hàng thành công. Quý khách vui lòng không BOM hàng ạ!";
        header("location: " . URL_HOME);
    } else {
        $_SESSION['notify']['error'] = "Giỏ hàng trống. Mời thêm sản phẩm để mua hàng!";
        header("location: " . URL_PR_US);
    }
}

function changeOrderControl()
{
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $orderCode = $_GET['id'];
        $order = getOrderWhereCode($orderCode);
        if ($order) {
            if ($order['status'] == 1) {
                putOrderUser(6, $orderCode);
                $_SESSION['notify']['success'] = "Đơn hàng đã được HỦY!";
                header("location: " . URL_ORDER_U);
            } else {
                $_SESSION['notify']['error'] = "Đơn hàng ĐÃ ĐƯỢC XỬ LÝ, KHÔNG THỂ HỦY!";
                header("location: " . URL_ORDER_U);
            }
        } else {
            $_SESSION['notify']['error'] = "Đơn hàng không tồn tại!";
            header("location: " . URL_ORDER_U);
        }
    } else {
        $_SESSION['notify']['error'] = "Đơn hàng không tồn tại!";
        header("location: " . URL_ORDER_U);
    }
}
