<?php
include_once "./Models/Product.php";

// Admin
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

    // xử lý thay đổi type giá khi người dùng không nhập thì phải lấy giá trị null chú ko phải 0 khi dùng type number
    $productCategories = getProductCategories();
    if (isset($_POST['add-new']) && $_POST['add-new']) {
        // xét tồn tại các post
        $module = $_POST['module'];
        $name = $_POST['name'];
        $regularPrice = $_POST['regularPrice'];
        $salePrice = $_POST['salePrice'];
        if ($salePrice == '') {
            $salePrice = null;
            // tránh lưu giá trị mặc định là 0 trong db
        }
        $size = $_POST['size'];
        if ($size == '') {
            $size = null;
        }
        $color = $_POST['color'];
        $shortDescription = $_POST['shortDescription'];
        $longDescription = $_POST['longDescription'];
        $quantity = $_POST['quantity'];
        if ($quantity == '') {
            $quantity = null;
        }
        // $importTime = $_POST['importTime'];
        $importTime = date('Y-m-d');
        // echo $importTime;
        $status = $_POST['status'];
        $productCategoryId = $_POST['productCategoryId'];
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
        header("location: " . URL_PR);
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
            header("location: " . URL_PR);
        } else {
            $_SESSION['notify']['error'] = "Sản phẩm không tồn tại";
            header("location: " . URL_PR);
        }
    } else {
        $_SESSION['notify']['error'] = "Sản phẩm không tồn tại";
        header("location: " . URL_PR);
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
            header("location: " . URL_PR);
        }
    } else {
        $_SESSION['notify']['error'] = "Sản phẩm không tồn tại";
        header("location: " . URL_PR);
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
        $regularPrice = $_POST['regularPrice'];
        $salePrice = $_POST['salePrice'];
        if ($salePrice == '') {
            $salePrice = null;
            // tránh lưu giá trị mặc định là 0 trong db
        }
        $size = $_POST['size'];
        if ($size == '') {
            $size = null;
        }
        $color = $_POST['color'];
        $shortDescription = $_POST['shortDescription'];
        $longDescription = $_POST['longDescription'];
        $quantity = $_POST['quantity'];
        if ($quantity == '') {
            $quantity = null;
        }
        // $importTime = $_POST['importTime'];
        $importTime = date('Y-m-d');
        // echo $importTime;
        $status = $_POST['status'];
        $productCategoryId = $_POST['productCategoryId'];
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
        header("location: " . URL_PR);
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
            header("location: " . URL_PR);
        }
    } else {
        $_SESSION['notify']['error'] = "Sản phẩm không tồn tại";
        header("location: " . URL_PR);
    }

    include "./Views/admin/layouts/footer.php";
}

// user
function productUserControl()
{
    include "./Views/user/layouts/header.php";

    $products = getProducts();

    // làm details xong quay lại xử lý trang chủ, rồi về đây xử lý

    // var_dump($products);

    // if (isset($_GET['category']) && is_numeric($_GET['category'])) {
    //     $categoryId = $_GET['category'];
    //     $productSearch = "";

    //     $productCategories = getProductCategories();
    //     $products = getProductsInUser($categoryId, $productSearch);
    // } else {
    //     // echo "<script>
    //     //         alert('Không tồn tại danh mục có id này');
    //     //     </script>";
    //     // $products = getProducts();
    //     // $productCategories = getProductCategories();
    //     // include "./Views/admin/products/index.php";
    // }

    include "./Views/user/product/index.php";
    include "./Views/user/layouts/footer.php";
}

function productDetailUserControl()
{
    include "./Views/user/layouts/header.php";

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $product = getProduct($id);
        if ($product) {
            $productCategories = getProductCategories();
            $productCategoryId = $product['product_category_id'];
            $top10RelatedProducts = get10RelatedProducts($productCategoryId, $id);



            include "./Views/user/product/productDetail.php";
        } else {
            echo "<script>
                    alert('Không tồn tại sản phẩm này');
                    window.location.href = URL_PR_US;
                </script>";
        }
    } else {
        echo "<script>
            alert('Không tồn tại sản phẩm này');
            window.location.href = URL_PR_US;
        </script>";
    }
    include "./Views/user/layouts/footer.php";
}
