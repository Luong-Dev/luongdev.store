<?php

function homeUserControl()
{
    include "./Views/user/layouts/header.php";

    $categories = getProductCategories();
    $top16NewProducts = getProductsCustom(sort: "created_at", limit: '16', sortDirect: 'ASC');
    $top8SellingProducts = getProductsCustom(sort: "sold_number", limit: '8');
    $top8ViewProducts = getProductsCustom(sort: "view_number", limit: '8');

    include "./Views/user/home.php";
    include "./Views/user/layouts/footer.php";
}

function homeAdminControl()
{
    include "./Views/admin/layouts/header.php";
    include "./Views/admin/home.php";
    include "./Views/admin/layouts/footer.php";
}
