<?php

session_start();
// var_dump($_SESSION['user']);

include_once "./Controllers/MainController.php";
include_once "./Controllers/CategoryProductController.php";
include_once "./Controllers/ProductController.php";
include_once "./Controllers/CartController.php";
include_once "./Controllers/AccountController.php";

// mỗi lần về index đều phải check account và quyền của session
if (isset($_SESSION['user'])) {
    checkUserUsed();
}

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    if (isset($_SESSION['user']) && ($_SESSION['user']['role'] == 1 || $_SESSION['user']['role'] == 2)) {
        switch ($act) {
            case 'admin':
                homeAdminControl();
                break;

            case 'admin_categories':
                categoriesControl();
                break;

            case 'admin_categories_create':
                createCategoryControl();
                break;

            case 'admin_categories_delete':
                deleteCategoryControl();
                break;

            case 'admin_categories_edit':
                editCategoryControl();
                break;

            case 'admin_categories_update':
                updateCategoryControl();
                break;

            case 'admin_products':
                productsControl();
                break;

            case 'admin_products_create':
                createProductControl();
                break;

            case 'admin_products_delete':
                deleteProductControl();
                break;

            case 'admin_products_edit':
                editProductControl();
                break;

            case 'admin_products_update':
                updateProductControl();
                break;

            case '':
                homeUserControl();
                break;

            case 'products':
                productUserControl();
                break;

            case 'products_detail':
                productDetailUserControl();
                break;

            case 'cart':
                cartControl();
                break;

            case 'news':
                break;

            case 'contacts':
                break;

            case 'sales':
                break;

            case 'statistical':
                break;

            case 'register':
                registerAccountControl();
                break;

            case 'login':
                loginAccountControl();
                break;

            case 'forgot_password':
                forgotPassword();
                break;

            case 'confirm_code':
                include "./Views/user/layouts/header.php";
                include "./Views/user/account/confirmCode.php";
                include "./Views/user/layouts/footer.php";
                break;

            case 'change_password':
                include "./Views/user/layouts/header.php";
                include "./Views/user/account/changePassword.php";
                include "./Views/user/layouts/footer.php";
                break;

            case 'account_change_password':
                include "./Views/user/layouts/header.php";
                include "./Views/user/account/changePasswordUsed.php";
                include "./Views/user/layouts/footer.php";
                break;

            case 'account_logout':
                logoutAccountControl();
                break;

            default:
                include "./Views/errors/error404.php";
                break;
        }
    } else {
        switch ($act) {
            case '':
                homeUserControl();
                break;

            case 'products':
                productUserControl();
                break;

            case 'products_detail':
                productDetailUserControl();
                break;

            case 'cart':
                cartControl();
                break;

            case 'news':
                break;

            case 'contacts':
                break;

            case 'sales':
                break;

            case 'statistical':
                break;

            case 'register':
                registerAccountControl();
                break;

            case 'login':
                loginAccountControl();
                break;

            case 'forgot_password':
                forgotPassword();
                break;

            case 'confirm_code':
                include "./Views/user/layouts/header.php";
                include "./Views/user/account/confirmCode.php";
                include "./Views/user/layouts/footer.php";
                break;

            case 'change_password':
                include "./Views/user/layouts/header.php";
                include "./Views/user/account/changePassword.php";
                include "./Views/user/layouts/footer.php";
                break;

            case 'account_change_password':
                include "./Views/user/layouts/header.php";
                include "./Views/user/account/changePasswordUsed.php";
                include "./Views/user/layouts/footer.php";
                break;

            case 'account_logout':
                logoutAccountControl();
                break;

            default:
                include "./Views/errors/error404.php";
                break;
        }
    }
} else {
    homeUserControl();
}
