<?php
// url WEB
const URL_WEB = 'http://localhost:3000/';

// url home page
const URL_HOME = URL_WEB . 'index.php';

// url login
const URL_LOGIN = URL_WEB . 'index.php?act=login';

// url admin product category
const URL_P_C = URL_WEB . 'index.php?act=admin_product_categories';

// url admin product
const URL_PR = URL_WEB . 'index.php?act=admin_products';

// url user product
const URL_PR_US = URL_WEB . 'index.php?act=products';

// url admin account
const URL_AC = URL_WEB . 'index.php?act=admin_accounts';

// url profile
const URL_PROFILE = URL_WEB . 'index.php?act=profile';

// url edit password
const URL_ED_PW = URL_WEB . 'index.php?act=edit_password';

// arr product status
const AR_STATUS = ['Còn hàng', 'Sắp có hàng', 'Ngưng bán', 'Hết hàng'];
// define('AR_STATUS', array('Còn hàng', 'Sắp có hàng', 'Ngưng bán', 'Hết hàng'));

// arr role user
const AR_ROLE = [
    '5' => 'Supper Admin',
    '4' => 'Admin',
    '1' => 'Khách hàng'
];


// định nghĩa hàm cha để tự động nạp header, footer tương ứng với vai trò
// tạo sau khi làm tính năng đăng nhập sau
// cần tách sang file maincontroller để đặt hàm call chung ko sẽ lỗi, và include các file control vào đó.
// xong thì include file maincontroller vào index.php

function View($hamCall)
{
    include "./Views/admin/layouts/header.php";

    $hamCall;
    // bên ngoài sẽ chạy View cùng callback;
    // bên dưới xóa các include ko cần thiết

    include "./Views/admin/layouts/footer.php";
}
