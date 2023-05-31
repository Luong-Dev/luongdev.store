<?php
include_once "./Models/Db.php";

function getProductCategories()
{
    $sql = "SELECT CG.id, CG.name, COUNT(PD.product_category_id) AS 'quantity_product' FROM `product_categories` AS CG
    LEFT JOIN products AS PD ON CG.id = PD.product_category_id
    GROUP BY CG.id
    ORDER BY CG.id DESC";

    return pdo_query($sql);
}

function getProductCategory($id)
{
    $sql = "SELECT * FROM `product_categories` WHERE id = " . $id;

    return pdo_query_one($sql);
}

function postProductCategory($name)
{
    $sql = "INSERT INTO `product_categories`(`name`) 
    VALUES ('$name')";

    return  pdo_execute($sql);
}

function putProductCategory($name, $id)
{
    $sql = "UPDATE `product_categories` SET `name`='$name' WHERE id =" . $id;
    pdo_execute($sql);
}

function deleteProductCategory($id)
{
    $sql = "DELETE FROM `product_categories` WHERE id = " . $id;
    pdo_execute($sql);
}
