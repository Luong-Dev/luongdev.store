<?php

function homeUserControl()
{
    include "./Views/user/layouts/header.php";

    $categories = getProductCategories();
    // $products = getProductsCustom();
    // $topNewProducts = getProductsCustom(0, "", "import_time", 10);
    // $top4ViewProducts = getProductsCustom(0, "", "view_number", 4);
    // // $top4ViewProducts = getProductsCustom(0,"","view_number",4);
    // $top4SellingProducts = getProductsCustom(0, "", "number_sold", 4);
    // $topSellingProducts = getProductsCustom(0, "", "number_sold", 4);

    include "./Views/user/home.php";
    include "./Views/user/layouts/footer.php";
}

function homeAdminControl()
{
    include "./Views/admin/layouts/header.php";
    include "./Views/admin/home.php";
    include "./Views/admin/layouts/footer.php";
}
