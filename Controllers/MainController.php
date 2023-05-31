<?php
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


function homeUserControl(){
    include "./Views/user/layouts/header.php";
    $categories = getCategoriesInProduct();
    $products = getProductsInUser();
    $topNewProducts = getProductsInUser(0,"","import_time",10);
    $top4ViewProducts = getProductsInUser(0,"","view_number",4);
    // $top4ViewProducts = getProductsInUser(0,"","view_number",4);
    $top4SellingProducts = getProductsInUser(0,"","number_sold",4);
    // $topSellingProducts = getProductsInUser(0,"","number_sold",4);
    include "./Views/user/home.php";
    include "./Views/user/layouts/footer.php";
}

function homeAdminControl(){
    include "./Views/admin/layouts/header.php";
    include "./Views/admin/home.php";
    include "./Views/admin/layouts/footer.php";
}