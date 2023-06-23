<?php
include_once './Models/Statistical.php';

function statisticalProductsForCategoryControl()
{
    $chartWithProductCategories = getStatisticalWithPC();

    include "./Views/admin/layouts/header.php";
    include "./Views/admin/statistical/productForCategory.php";
    include "./Views/admin/layouts/footer.php";
}

function statisticalNumberOrderSoldControl()
{
    $soldOrders = getStatisticalWithOrderQuantity();
    $data = [];
    // var_dump($soldOrders);
    for ($i = 1; $i <= 12; $i++) {
        $check = 0;
        foreach ($soldOrders as $soldOrder) {
            if ($soldOrder['sold_month'] == $i) {
                $data[] = $soldOrder['total_orders'];
                break;
            } else {
                $check += 1;
            }
            if ($check == count($soldOrders)) {
                $data[] = 0;
            }
        }
    }
    $json_data = json_encode($data);
    // var_dump($json_data);

    // vòng lặp 12 lần chạy kiểm tra tương ứng 12 tháng
    // bản chất là sẽ duyệt hết mảng soldOrders, mảng soldOrders ko biết có số lượng bao nhiêu phần tử. nếu không trùng cái nào thì biến đếm sẽ bằng tổng số phần tử của mảng

    include "./Views/admin/layouts/header.php";
    include "./Views/admin/statistical/numberOrderSold.php";
    include "./Views/admin/layouts/footer.php";
}
