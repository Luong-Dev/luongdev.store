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

function putQuantityProduct($quantity, $id)
{
    $sql = "UPDATE `products` SET `quantity` = `quantity` - ? WHERE id = ?";

    pdo_execute($sql, $quantity, $id);
}


function putViewProduct($id)
{
    $sql = "UPDATE `products` SET `view_number` = `view_number` + 1 WHERE id = ?";

    pdo_execute($sql, $id);
}

function deleteProduct($id)
{
    $sql = "DELETE FROM `products` WHERE id = ?";
    pdo_execute($sql, $id);
}

// user
// khi sắp xếp sản phẩm theo giá thì sẽ so sánh sản phẩm theo giá sale nếu có, còn không sẽ lấy giá gốc
// tham khảo: SELECT *, IFNULL(sale_price, regular_price) AS sorted_price FROM products ORDER BY sorted_price ASC;

// function getProductsCustom($productCategoryId = 0, $productSearch = "", $sort = "name", $limit = 12, $sortDirect = "DESC")
// {
//     if ($sort != 'price') {
//         $sql = "SELECT * FROM `products` WHERE 1 ";
//         if ($productCategoryId != 0) {
//             $sql .= "AND `product_category_id` = $productCategoryId";
//         }
//         if ($productSearch != "") {
//             $sql .= "AND `name` LIKE '%$productSearch%'";
//         }
//         $sql .= " ORDER BY $sort $sortDirect LIMIT $limit";

//         return pdo_query($sql);
//     } else {
//         $sql = "SELECT *, IFNULL(sale_price, regular_price) AS $sort FROM `products` WHERE 1 ";
//         if ($productCategoryId != 0) {
//             $sql .= "AND `product_category_id` = $productCategoryId";
//         }
//         if ($productSearch != "") {
//             $sql .= "AND `name` LIKE '%$productSearch%'";
//         }
//         $sql .= " ORDER BY $sort $sortDirect LIMIT $limit";

//         return pdo_query($sql);
//     }
// }

function getProductsCustom($productCategoryId = 0, $productSearch = "", $sort = "name", $limit = 12, $sortDirect = "DESC")
{
    if ($sort != 'price') {
        $sql = "SELECT P.id, P.module,P.name,P.image,P.short_description,P.long_description,P.regular_price,P.sale_price,P.size,P.color,
        P.quantity,P.view_number,P.status,P.created_at,P.product_category_id,SUM(O.quantity) AS sold_number 
        FROM `products` P
        LEFT JOIN order_details O ON P.id = O.product_id WHERE P.status <> 3 ";
        if ($productCategoryId != 0) {
            $sql .= " AND `product_category_id` = $productCategoryId";
        }
        if ($productSearch != "") {
            $sql .= " AND `name` LIKE '%$productSearch%'";
        }
        $sql .= " GROUP BY P.id ORDER BY $sort $sortDirect LIMIT $limit";
    } else {
        $sql = "SELECT *, IFNULL(sale_price, regular_price) AS $sort FROM `products` WHERE status <> 3 ";
        if ($productCategoryId != 0) {
            $sql .= "AND `product_category_id` = $productCategoryId";
        }
        if ($productSearch != "") {
            $sql .= "AND `name` LIKE '%$productSearch%'";
        }
        $sql .= " ORDER BY $sort $sortDirect LIMIT $limit";
    }

    return pdo_query($sql);
}

function get10RelatedProducts($productCategoryId, $productId)
{
    $sql = "SELECT * FROM `products` WHERE 
    product_category_id = ? AND id <> ? AND status <> 3
    ORDER BY id DESC LIMIT 10";

    return pdo_query($sql, $productCategoryId, $productId);
}
