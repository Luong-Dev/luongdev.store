<?php
include_once "./Models/Product.php";

// Admin
const URL_P = 'index?act=admin_products';

function productsControl()
{
    include "./Views/admin/layouts/header.php";

    $products = getProducts();
    $productCategories = getProductCategories();
    if (isset($_POST['btn-top-search'])) {
        $productCategorySearch = $_POST['productCategorySearch'];
        $productSearch = $_POST['productSearch'];
        $products = getProducts($productCategorySearch, $productSearch);
    }

    include "./Views/admin/product/index.php";
    include "./Views/admin/layouts/footer.php";
}

function createProductControl()
{
    include "./Views/admin/layouts/header.php";

    $productCategories = getProductCategories();
    if (isset($_POST['add-new']) && $_POST['add-new']) {
        // xét tồn tại các post
        $module = $_POST['module'];
        $name = $_POST['name'];
        $regularPrice = (int)$_POST['regularPrice'];
        $salePrice = (int)$_POST['salePrice'];
        $size = (int)$_POST['size'];
        $color = $_POST['color'];
        $shortDescription = $_POST['shortDescription'];
        $longDescription = $_POST['longDescription'];
        $quantity = (int)$_POST['quantity'];
        $importTime = $_POST['importTime'];
        // $importTime = date('Y-m-d');
        // echo $importTime;
        $status = (int)$_POST['status'];
        $productCategoryId = (int)$_POST['productCategoryId'];
        // file
        $targetDir = "./resources/uploads/images/product/";
        $fileName = $_FILES['imageUpload']['name'];
        $fileTmpName = $_FILES['imageUpload']['tmp_name'];
        $image = "";
        if ($fileName != "") {
            $image = $targetDir . $fileName;
        }
        move_uploaded_file($fileTmpName, $image);
        postProduct($module, $name, $image, $shortDescription, $longDescription, $regularPrice, $salePrice, $size, $color, $quantity, $importTime, $status, $productCategoryId);
        $_SESSION['notify']['success'] = "Thêm mới thành công sản phẩm: $name";
        header("location: " . URL_P);
    }

    include "./Views/admin/product/create.php";
    include "./Views/admin/layouts/footer.php";
}

function deleteProductControl()
{
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $check = getProduct($id);
        if ($check) {
            deleteProduct($id);
            $_SESSION['notify']['success'] = 'Xóa thành công sản phẩm: ' . $check['name'];
            header("location: " . URL_P);
        } else {
            $_SESSION['notify']['error'] = "Sản phẩm không tồn tại";
            header("location: " . URL_P);
        }
    } else {
        $_SESSION['notify']['error'] = "Sản phẩm không tồn tại";
        header("location: " . URL_P);
    }
}

function editProductControl()
{
    include "./Views/admin/layouts/header.php";

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $product = getProduct($id);
        if ($product) {
            $productCategories = getProductCategories();
            include "./Views/admin/product/edit.php";
        } else {
            $_SESSION['notify']['error'] = "Sản phẩm không tồn tại";
            header("location: " . URL_P);
        }
    } else {
        $_SESSION['notify']['error'] = "Sản phẩm không tồn tại";
        header("location: " . URL_P);
    }

    include "./Views/admin/layouts/footer.php";
}

function updateProductControl()
{
    if (isset($_POST['update']) && $_POST['update']) {
        // xét tồn tại các post, xét điều kiện validate, nghiên cứu làm 1 file validate riêng
        $id = $_POST['idData'];
        // echo  $id;
        $module = $_POST['module'];
        $name = $_POST['name'];
        $regularPrice = (int)$_POST['regularPrice'];
        $salePrice = (int)$_POST['salePrice'];
        $size = (int)$_POST['size'];
        $color = $_POST['color'];
        $shortDescription = $_POST['shortDescription'];
        $longDescription = $_POST['longDescription'];
        $quantity = (int)$_POST['quantity'];
        $importTime = $_POST['importTime'];
        // $importTime = date('Y-m-d');
        // echo $importTime;
        $status = (int)$_POST['status'];
        $productCategoryId = (int)$_POST['productCategoryId'];
        // file
        $targetDir = "./resources/uploads/images/product/";
        var_dump($_FILES['imageUpload']);
        if ($size > 0) {
        }
        $fileName = $_FILES['imageUpload']['name'];
        $fileTmpName = $_FILES['imageUpload']['tmp_name'];
        $image = "";
        if ($fileName != "") {
            $image = $targetDir . $fileName;
            move_uploaded_file($fileTmpName, $image);
        }

        putProduct($module, $name, $image, $shortDescription, $longDescription, $regularPrice, $salePrice, $size, $color, $quantity,  $status, $importTime, $productCategoryId, $id);
        $_SESSION['notify']['success'] = 'Cập nhật thành công sản phẩm: ' . $name;
        header("location: " . URL_P);
    }
}

function detailProductControl()
{
    include "./Views/admin/layouts/header.php";

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $product = getProduct($id);
        if ($product) {
            $productCategories = getProductCategories();
            include "./Views/admin/product/detail.php";
        } else {
            $_SESSION['notify']['error'] = "Sản phẩm không tồn tại";
            header("location: " . URL_P);
        }
    } else {
        $_SESSION['notify']['error'] = "Sản phẩm không tồn tại";
        header("location: " . URL_P);
    }

    include "./Views/admin/layouts/footer.php";
}

// function detailCategoryControl()
// {
//     include "./Views/admin/layouts/header.php";
//     if (isset($_GET['id'])) {
//         $id = $_GET['id'];
//         $id = (int)$id;
//         if ($id) {
//             $res = getCategory($id);
//             if ($res) {
//                 // deleteCategory($id);
//                 // $message['success'] = "Xóa thành công!";
//             } else {
//                 echo "<script>
//                         alert('Không tồn tại danh mục có id này');
//                     </script>";
//             }
//         } else {
//             echo "<script>
//                     alert('Không tồn tại danh mục có id này');
//                 </script>";
//         }
//     }
//     $productCategories = getProductCategories();
//     include "./Views/admin/category/detail.php";
//     include "./Views/admin/layouts/footer.php";
// }

// user
function productUserControl()
{
    include "./Views/user/layouts/header.php";
    if (isset($_GET['category']) && is_numeric($_GET['category'])) {
        $categoryId = $_GET['category'];
        $productSearch = "";

        $productCategories = getProductCategories();
        $products = getProductsInUser($categoryId, $productSearch);
    } else {
        // echo "<script>
        //         alert('Không tồn tại danh mục có id này');
        //     </script>";
        // $products = getProducts();
        // $productCategories = getProductCategories();
        // include "./Views/admin/products/index.php";
    }
    include "./Views/user/product/index.php";
    include "./Views/user/layouts/footer.php";
}

function productDetailUserControl()
{
    include "./Views/user/layouts/header.php";
    $url = 'index?act=products';
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $product = getProduct($id);
        if ($product) {
            $productCategories = getProductCategories();
            $categoryId = $product['category_id'];
            $top10RelatedProducts = get10RelatedProducts($categoryId, $id);



            include "./Views/user/product/productDetail.php";
        } else {
            echo "<script>
                    alert('Không tồn tại sản phẩm này');
                    window.location.href = '$url';
                </script>";
        }
    } else {
        echo "<script>
            alert('Không tồn tại sản phẩm này');
            window.location.href = '$url';
        </script>";
    }
    include "./Views/user/layouts/footer.php";
}
