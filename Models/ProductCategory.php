<?php
include_once "./Models/Db.php";

function getProductCategories()
{
    $sql = "SELECT CG.id, CG.name, COUNT(PD.product_category_id) AS 'quantity_product' FROM `product_categories` AS CG
    LEFT JOIN products AS PD ON CG.id = PD.product_category_id
    GROUP BY CG.id
    ORDER BY COUNT(PD.product_category_id) DESC";

    return pdo_query($sql);
}

function getProductCategory($id)
{
    $sql = "SELECT * FROM `product_categories` WHERE id = ?";

    return pdo_query_one($sql, $id);
}

// có sản phẩm rồi thì quay lại sửa hàm get và chỉnh ràng buộc xóa categories
// function getProductCategory($id)
// {
//     $sql = "SELECT * FROM `product_categories` WHERE id = ?";
//     $sql = "SELECT CG.id, CG.name, COUNT(PD.product_category_id) AS 'quantity_product' FROM `product_categories` AS CG
//     LEFT JOIN products AS PD ON CG.id = PD.product_category_id
//     GROUP BY CG.id
//     ORDER BY CG.id DESC";

//     return pdo_query_one($sql, $id);
// }

function getProductCategoryWhereName($name)
{
    $sql = "SELECT * FROM `product_categories` WHERE name = ?";

    return pdo_query_one($sql, $name);
}

function postProductCategory($name)
{
    $sql = "INSERT INTO `product_categories`(`name`) 
    VALUES (?)";

    return  pdo_execute($sql, $name);
}

function checkPut($name, $id)
{
    $sql = "SELECT * FROM `product_categories` WHERE name = ? and id <> $id";

    return pdo_query_one($sql, $name);
}

function putProductCategory($name, $id)
{
    $sql = "UPDATE `product_categories` SET `name`= ? WHERE id = ?";
    pdo_execute($sql, $name, $id);
}

function deleteProductCategory($id)
{
    $sql = "DELETE FROM `product_categories` WHERE id = ?";
    pdo_execute($sql, $id);
}
