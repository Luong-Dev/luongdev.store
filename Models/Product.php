<?php
include_once "./Models/Db.php";

// admin
function getProducts($productCategoryId = "", $productSearch = "")
{
    $sql = "SELECT * FROM `products` WHERE 1 ";

    if ($productSearch != "") {
        $sql .= "AND `name` LIKE '%$productSearch%'";
    }
    if ($productCategoryId != "") {
        $sql .= "AND `product_category_id` = $productCategoryId";
    }
    $sql .= " ORDER BY name";

    return pdo_query($sql);
}

function getProduct($id)
{
    $sql = "SELECT * FROM `products` WHERE id = ?";

    return pdo_query_one($sql, $id);
}

function postProduct($module, $name, $image, $shortDescription, $longDescription, $regularPrice, $salePrice, $size, $color, $quantity, $importTime, $status, $productCategoryId)
{
    $sql = "INSERT INTO `products`(`module`, `name`, `image`, `short_description`, `long_description`, `regular_price`, `sale_price`, `size`, `color`, `quantity` ,`created_at`, `status`, `product_category_id`) 
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";

    return  pdo_execute($sql, $module, $name, $image, $shortDescription, $longDescription, $regularPrice, $salePrice, $size, $color, $quantity, $importTime, $status, $productCategoryId);
}

function putProduct($module, $name, $image = "", $shortDescription, $longDescription, $regularPrice, $salePrice, $size, $color, $quantity,  $status, $importTime, $productCategoryId, $id)
{
    if ($image == "") {
        $sql = "UPDATE `products` SET `module`=?, `name`=?, `short_description`=?, `long_description`=?, `regular_price`=?, 
        `sale_price`=?, `size`=?, `color`=?, `quantity`=?, `status`=?, `created_at`=?, `product_category_id`=? WHERE id = ?";

        pdo_execute($sql, $module, $name,  $shortDescription, $longDescription, $regularPrice, $salePrice, $size, $color, $quantity,  $status, $importTime, $productCategoryId, $id);
    } else {
        $sql = "UPDATE `products` SET `module`=?, `name`=?, `image`=?, `short_description`=?, `long_description`=?, `regular_price`=?, 
        `sale_price`=?, `size`=?, `color`=?, `quantity`=?, `status`=?, `created_at`=?, `product_category_id`=? WHERE id = ?";

        pdo_execute($sql, $module, $name, $image, $shortDescription, $longDescription, $regularPrice, $salePrice, $size, $color, $quantity,  $status, $importTime, $productCategoryId, $id);
    }
}

function deleteProduct($id)
{
    $sql = "DELETE FROM `products` WHERE id = ?";
    pdo_execute($sql, $id);
}

// user
function getProductsInUser($categoryId = 0, $productSearch = "", $sort = "id", $limit = 12)
{
    $sql = "SELECT * FROM `products` WHERE 1 ";
    if ($categoryId != 0) {
        $sql .= "AND `category_id` = $categoryId";
    }
    if ($productSearch != "") {
        $sql .= "AND `name` LIKE '%$productSearch%'";
    }

    $sql .= " ORDER BY $sort DESC LIMIT $limit";

    return pdo_query($sql);
}

function get10RelatedProducts($categoryId, $productId)
{
    $sql = "SELECT * FROM `products` WHERE 
    category_id = $categoryId AND id <> $productId
    ORDER BY id DESC LIMIT 10";

    return pdo_query($sql);
}
