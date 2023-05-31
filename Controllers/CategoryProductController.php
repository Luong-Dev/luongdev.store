<?php
include_once "./Models/CategoryProduct.php";

// định nghĩa hàm cha để tự động nạp header, footer tương ứng với vai trò
// tạo sau khi làm tính năng đăng nhập sau
// cần tách sang file maincontroller để đặt hàm call chung ko sẽ lỗi, và include các file control vào đó.
// xong thì include file maincontroller vào index.php

// function View($hamCall)
// {
//     include "./Views/admin/layouts/header.php";

//     $hamCall;
//     // bên ngoài sẽ chạy View cùng callback;
//     // bên dưới xóa các include ko cần thiết

//     include "./Views/admin/layouts/footer.php";
// }

function categoriesControl()
{
    include "./Views/admin/layouts/header.php";
    $categories = getCategories();
    include "./Views/admin/category/index.php";
    include "./Views/admin/layouts/footer.php";
}

function createCategoryControl()
{
    include "./Views/admin/layouts/header.php";
    if (isset($_POST['add-new']) && $_POST['add-new']) {
        // xét tồn tại các post, xét điều kiện validate, nghiên cứu làm 1 file validate riêng
        $name = $_POST['name'];
        $description = $_POST['description'];
        $imageUrl = "";
        // $imageUrl = $_POST['imageUrl'];
        $imageAlt = $_POST['imageAlt'];
        postCategory($name, $description, $imageUrl, $imageAlt);
        $message['success'] = "Thêm thành công!";
    }
    include "./Views/admin/category/create.php";
    include "./Views/admin/layouts/footer.php";
}

function deleteCategoryControl()
{
    include "./Views/admin/layouts/header.php";
    $url = 'index?act=admin_categories';
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $res = getCategory($id);
        if ($res) {
            deleteCategory($id);
            $message['success'] = "Xóa thành công!";
            header("location: $url");
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
    // $categories = getCategories();
    // include "./Views/admin/category/index.php";
    // include "./Views/admin/layouts/footer.php";
}

function editCategoryControl()
{
    include "./Views/admin/layouts/header.php";
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $res = getCategory($id);
        if ($res) {
            include "./Views/admin/category/edit.php";
        } else {
            echo "<script>
                        alert('Không tồn tại danh mục có id này');
                    </script>";
            $categories = getCategories();
            include "./Views/admin/category/index.php";
        }
    } else {
        echo "<script>
                alert('Không tồn tại danh mục có id này');
            </script>";
        $categories = getCategories();
        include "./Views/admin/category/index.php";
    }
    include "./Views/admin/layouts/footer.php";
}

function updateCategoryControl()
{
    include "./Views/admin/layouts/header.php";
    if (isset($_POST['update']) && $_POST['update']) {
        $id = $_POST['idData'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $imageUrl = "";
        $imageAlt = $_POST['imageAlt'];
        putCategory($name, $description, $imageUrl, $imageAlt, $id);
        $message['success'] = "Cập nhật thành công";
        include "./Views/admin/category/edit.php";
    } else {
        echo "<script>
                alert('Thao tác sai, mời click vào thao tác sửa');
            </script>";
        $categories = getCategories();
        include "./Views/admin/category/index.php";
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
//     $categories = getCategories();
//     include "./Views/admin/category/detail.php";
//     include "./Views/admin/layouts/footer.php";
// }