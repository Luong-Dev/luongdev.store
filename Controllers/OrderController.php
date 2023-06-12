<?php
include_once './Models/Order.php';
include_once './Models/Cart.php';

function createOrderControl()
{
    // lấy thông tin từ người dùng
    // lấy danh sách sản phẩm
    // Xử lý data và thêm dữ liệu vào Order
    //  Nếu nhiều sp thì cho vòng lặp chạy thêm vào Details
    // xóa giỏ hàng
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
