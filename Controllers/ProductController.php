<?php
include_once "./Models/Product.php";


// admin
$arrStatus = ['Còn hàng', 'Sắp có hàng', 'Ngưng bán', 'Hết hàng'];
function productsControl()
{
    include "./Views/admin/layouts/header.php";
    $products = getProducts();
    $categories = getCategoriesInProduct();
    global $arrStatus;

    if (isset($_POST['btn-top-search'])) {
        // if(isset($_POST[''])){

        // }
        $categorySearch = $_POST['categorySearch'];
        $productSearch = $_POST['productSearch'];
        // var_dump($categorySearch, $productSearch);
        $products = getProducts($categorySearch, $productSearch);
    }

    include "./Views/admin/product/index.php";
    include "./Views/admin/layouts/footer.php";
}

function createProductControl()
{
    include "./Views/admin/layouts/header.php";
    $categories = getCategoriesInProduct();
    global $arrStatus;
    if (isset($_POST['add-new']) && $_POST['add-new']) {
        // xét tồn tại các post, xét điều kiện validate, nghiên cứu làm 1 file validate riêng
        $code = $_POST['code'];
        $categoryId = (int)$_POST['categoryId'];
        $name = $_POST['name'];
        $regularPrice = (int)$_POST['regularPrice'];
        $salePrice = (int)$_POST['salePrice'];
        $shortDescription = $_POST['shortDescription'];
        $longDescription = $_POST['longDescription'];
        $status = (int)$_POST['status'];

        $targetDir = "./resources/uploads/images/product/";
        $fileName = $_FILES['imageUpload']['name'];
        $fileTmpName = $_FILES['imageUpload']['tmp_name'];

        if ($fileName != "") {
            $imageUrl = $targetDir . $fileName;
        } else {
            $imageUrl = "";
        }
        move_uploaded_file($fileTmpName, $imageUrl);

        $imageAlt = $_POST['imageAlt'];
        $importTime = $_POST['importTime'];
        // $importTime = date('Y-m-d');
        // var_dump($fileTmpName);
        // var_dump($code, $name, $regularPrice, $salePrice, $imageUrl, $imageAlt, $importTime, $shortDescription, $longDescription, $status, $categoryId);
        postProduct($code, $name, $regularPrice, $salePrice, $imageUrl, $imageAlt, $importTime, $shortDescription, $longDescription, $status, $categoryId);
        $message['success'] = "Thêm thành công!";
    }
    include "./Views/admin/product/create.php";
    include "./Views/admin/layouts/footer.php";
}

function deleteProductControl()
{
    // include "./Views/admin/layouts/header.php";
    $url = 'index?act=admin_products';
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $res = getProduct($id);
        if ($res) {
            deleteProduct($id);
            $message['success'] = "Xóa thành công!";
            echo "<script>
                    alert('Không tồn tại danh mục có id này');
                    window.location.href = '$url';
                </script>";
        } else {
            echo "<script>
                        alert('Không tồn tại danh mục có id này');
                        window.location.href = '$url';
                    </script>";
        }
    } else {
        echo "<script>
                    alert('Không tồn tại danh mục có id này');
                    window.location.href = '$url';
                </script>";
    }
    // $products = getProducts();
    // include "./Views/admin/product/index.php";
    // include "./Views/admin/layouts/footer.php";
}

function editProductControl()
{
    include "./Views/admin/layouts/header.php";
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $product = getProduct($id);
        if ($product) {
            $categories = getCategoriesInProduct();
            global $arrStatus;
            include "./Views/admin/product/edit.php";
        } else {
            echo "<script>
                        alert('Không tồn tại danh mục có id này');
                    </script>";
            $products = getProducts();
            $categories = getCategoriesInProduct();
            include "./Views/admin/category/index.php";
        }
    } else {
        echo "<script>
                alert('Không tồn tại danh mục có id này');
            </script>";
        $products = getProducts();
        $categories = getCategoriesInProduct();
        include "./Views/admin/products/index.php";
    }
    include "./Views/admin/layouts/footer.php";
}

function updateProductControl()
{
    include "./Views/admin/layouts/header.php";
    $url = 'index?act=admin_products';
    if (isset($_POST['update']) && $_POST['update']) {
        // xét tồn tại các post, xét điều kiện validate, nghiên cứu làm 1 file validate riêng
        $id = $_POST['idData'];
        // echo  $id;
        $code = $_POST['code'];
        $categoryId = (int)$_POST['categoryId'];
        $name = $_POST['name'];
        $regularPrice = (int)$_POST['regularPrice'];
        $salePrice = (int)$_POST['salePrice'];
        $shortDescription = $_POST['shortDescription'];
        $longDescription = $_POST['longDescription'];
        $status = (int)$_POST['status'];

        $targetDir = "./resources/uploads/images/product/";
        $fileName = $_FILES['imageUpload']['name'];
        $fileTmpName = $_FILES['imageUpload']['tmp_name'];

        if ($fileName != "") {
            $imageUrl = $targetDir . $fileName;
        } else {
            $imageUrl = "";
        }
        move_uploaded_file($fileTmpName, $imageUrl);

        $imageAlt = $_POST['imageAlt'];
        $importTime = $_POST['importTime'];
        // $importTime = date('Y-m-d');
        // var_dump($fileTmpName);
        // var_dump($code, $name, $regularPrice, $salePrice, $imageUrl, $imageAlt, $importTime, $shortDescription, $longDescription, $status, $categoryId);

        putProduct($code, $name, $regularPrice, $salePrice, $imageUrl, $imageAlt, $importTime, $shortDescription, $longDescription, $status, $categoryId, $id);
        $message['success'] = "Cập nhật thành công";
        echo "<script>
                    window.location.href = '$url';
                    alert('Cập nhật thành công');
                </script>";
        // include "./Views/admin/product/edit.php";
    } else {

        echo "<script>
                    alert('Thao tác sai');
                    window.location.href = '$url';
                </script>";
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
//     $categories = getCategoriesInProduct();
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

        $categories = getCategoriesInProduct();
        $products = getProductsInUser($categoryId, $productSearch);
    } else {
        // echo "<script>
        //         alert('Không tồn tại danh mục có id này');
        //     </script>";
        // $products = getProducts();
        // $categories = getCategoriesInProduct();
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
            $categories = getCategoriesInProduct();
            $categoryId = $product['category_id'];
            $top10RelatedProducts = get10RelatedProducts($categoryId,$id);


            global $arrStatus;
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
