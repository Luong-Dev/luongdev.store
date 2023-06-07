<?php

session_start();
// Chú ý: mở comment này thì header location sẽ bị lỗi không điều hướng được
// if (isset($_SESSION['user']))
//     var_dump($_SESSION['user']);
// if (isset($_SESSION['notify']))
//     echo "có";
// if (isset($_SESSION['notify']['success']))
//     echo $_SESSION['notify']['success'];
// else
//     echo "không có success";

include_once "./Controllers/Controller.php";
include_once "./Controllers/HomeController.php";
include_once "./Controllers/ProductCategoryController.php";
include_once "./Controllers/ProductController.php";
include_once "./Controllers/CartController.php";
include_once "./Controllers/AccountController.php";

// mỗi lần về index đều phải check tài khoản và quyền của session
if (isset($_SESSION['user'])) {
    confirmAuthUser();
}

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    // Pages Admin
    switch ($act) {
        case 'admin':
            checkRoleAdmin();
            homeAdminControl();
            break;

            // product_category
        case 'admin_product_categories':
            checkRoleAdmin();
            productCategoriesControl();
            break;

        case 'admin_product_categories_create':
            checkRoleAdmin();
            createProductCategoryControl();
            break;

            // case 'admin_product_categories_store':
            //     storeProductCategoryControl();
            //     break;

        case 'admin_product_categories_delete':
            checkRoleAdmin();
            deleteProductCategoryControl();
            break;

        case 'admin_product_categories_edit':
            checkRoleAdmin();
            editProductCategoryControl();
            break;

        case 'admin_product_categories_update':
            checkRoleAdmin();
            updateProductCategoryControl();
            break;

            // product
        case 'admin_products':
            checkRoleAdmin();
            productsControl();
            break;

        case 'admin_products_create':
            checkRoleAdmin();
            createProductControl();
            break;

        case 'admin_products_delete':
            checkRoleAdmin();
            deleteProductControl();
            break;

        case 'admin_products_edit':
            checkRoleAdmin();
            editProductControl();
            break;

        case 'admin_products_update':
            checkRoleAdmin();
            updateProductControl();
            break;

        case 'admin_products_detail':
            checkRoleAdmin();
            detailProductControl();
            break;

            // Account
        case 'admin_accounts':
            checkRoleAdmin();
            accountsControl();
            break;

        case 'admin_accounts_create':
            checkRoleAdmin();
            createAccountControl();
            break;

        case 'admin_accounts_delete':
            checkRoleAdmin();
            deleteAccountControl();
            break;

        case 'admin_accounts_edit':
            checkRoleAdmin();
            editAccountControl();
            break;

        case 'admin_accounts_update':
            checkRoleAdmin();
            updateAccountControl();
            break;






            // Pages User
            // nào làm tới phần user cần phân biệt giữa đăng nhập và chưa đăng nhập thì phân
        case '':
            homeUserControl();
            break;

        case 'products':
            productUserControl();
            break;

        case 'product_detail':
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
    homeUserControl();
}
