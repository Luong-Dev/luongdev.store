<?php
include_once "./Models/Db.php";

// user
function postUser($name, $email, $phoneNumber, $password, $role = 3)
{
    $sql = "INSERT INTO `users`(`name`,`email`, `phone_number`, `password`, `role`)
     VALUES ('$name','$email','$phoneNumber','$password',$role)";

    return  pdo_execute($sql);
}

function checkAuthUser($email)
{
    $sql = "SELECT * FROM `users` WHERE email = '$email'";
    return  pdo_query_one($sql);
}
// admin
// function getCategoriesInProduct()
// {
//     $sql = "SELECT `id` , `name` FROM `categories` ORDER BY id DESC";

//     return pdo_query($sql);
// }

// function getProducts($categoryId = 0, $productSearch = "")
// {
//     $sql = "SELECT * FROM `products` WHERE 1 ";

//     if ($productSearch != "") {
//         $sql .= "AND `name` LIKE '%$productSearch%'";
//     }
//     if ($categoryId != 0) {
//         $sql .= "AND `category_id` = $categoryId";
//     }
//     $sql .= " ORDER BY id DESC";

//     return pdo_query($sql);
// }

// function getProduct($id)
// {
//     $sql = "SELECT * FROM `products` WHERE id = " . $id;

//     return pdo_query_one($sql);
// }

// function postProduct($code, $name, $regularPrice, $salePrice, $imageUrl, $imageAlt, $importTime, $shortDescription, $longDescription, $status, $categoryId)
// {
//     $sql = "INSERT INTO `products`(`code`, `name`, `regular_price`, `sale_price`, `image_url`, `image_alt`, `import_time`, `short_description`, `long_description`, `status`, `category_id`)
//      VALUES ('$code','$name',$regularPrice,$salePrice,'$imageUrl','$imageAlt','$importTime','$shortDescription','$longDescription',$status,$categoryId)";

//     return  pdo_execute($sql);
// }

// function putProduct($code, $name, $regularPrice, $salePrice, $imageUrl, $imageAlt, $importTime, $shortDescription, $longDescription, $status, $categoryId, $id)
// {
//     $sql = "UPDATE `products` SET `code`='$code',`name`='$name',`regular_price`=$regularPrice,`sale_price`=$salePrice,`image_url`='$imageUrl',`image_alt`='$imageAlt'
//     ,`import_time`='$importTime',`short_description`='$shortDescription',`long_description`='$longDescription',`status`= $status,`category_id`= $categoryId WHERE id = " . $id;

//     pdo_execute($sql);
// }

// function deleteProduct($id)
// {
//     $sql = "DELETE FROM `products` WHERE id = " . $id;
//     pdo_execute($sql);
// }

// // user
// function getCategoriesInProduct()
// {
//     $sql = "SELECT CG.id, CG.name , CG.description, CG.image_url,CG.image_alt, COUNT(PD.category_id) AS 'quantity_product' FROM `categories` AS CG
//     LEFT JOIN products AS PD ON CG.id = PD.category_id
//     GROUP BY CG.id
//     ORDER BY id DESC";

//     return pdo_query($sql);
// }

// function getProductsInUser($categoryId = 0, $productSearch = "", $sort = "id", $limit = 12)
// {
//     $sql = "SELECT * FROM `products` WHERE 1 ";
//     if ($categoryId != 0) {
//         $sql .= "AND `category_id` = $categoryId";
//     }
//     if ($productSearch != "") {
//         $sql .= "AND `name` LIKE '%$productSearch%'";
//     }

//     $sql .= " ORDER BY $sort DESC LIMIT $limit";

//     return pdo_query($sql);
// }

// function get10RelatedProducts($categoryId, $productId)
// {
//     $sql = "SELECT * FROM `products` WHERE 
//     category_id = $categoryId AND id <> $productId
//     ORDER BY id DESC LIMIT 10";

//     return pdo_query($sql);
// }