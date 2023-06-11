<?php
include_once './Models/Statistical.php';

function statisticalControl()
{
    include "./Views/admin/layouts/header.php";

    $chartWithProductCategories = getStatisticalWithPC();

    include "./Views/admin/statistical/index.php";
    include "./Views/admin/layouts/footer.php";
}
