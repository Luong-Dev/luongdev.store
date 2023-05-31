<?php
include_once "./Models/Db.php";

function getCategories()
{
    $sql = "SELECT CG.id, CG.name , CG.description, CG.image_url,CG.image_alt, COUNT(PD.category_id) AS 'quantity_product' FROM `categories` AS CG
    LEFT JOIN products AS PD ON CG.id = PD.category_id
    GROUP BY CG.id
    ORDER BY id DESC";

    return pdo_query($sql);
}

function getCategory($id)
{
    $sql = "SELECT * FROM `categories` WHERE id = " . $id;

    return pdo_query_one($sql);
}

function postCategory($name, $description, $imageUrl, $imageAlt)
{
    $sql = "INSERT INTO `categories`(`name`, `description`, `image_url`, `image_alt`) 
    VALUES ('$name', '$description','$imageUrl','$imageAlt')";

    return  pdo_execute($sql);
}

function putCategory($name, $description, $imageUrl, $imageAlt, $id)
{
    $sql = "UPDATE `categories` SET `name`='$name',`description`='$description',`image_url`='$imageUrl',`image_alt`='$imageAlt' WHERE id =" . $id;
    pdo_execute($sql);
}

function deleteCategory($id)
{
    $sql = "DELETE FROM `categories` WHERE id = " . $id;
    pdo_execute($sql);
}